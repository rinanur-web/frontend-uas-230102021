<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MahasiswaController extends Controller
{
    protected $apiUrl = 'http://localhost:8000/api'; // Contoh: ganti ini dengan API URL Anda
    protected $endpoint = 'http://localhost:8080/mahasiswa';

    public function index()
    {
        $mahasiswa = []; // Initialize as an empty array
        $apiErrors = []; // Initialize for API errors

        try {
            $response = Http::get($this->endpoint);

            if ($response->successful()) {
                $mahasiswa = $response->json(); 
            } else {
                // Handle error if API does not return a successful status
                $errorMessage = $response->json()['message'] ?? 'Failed to retrieve class data from API.';
                $apiErrors['api_error'] = $errorMessage;
            }
        } catch (\Exception $e) {
                // Handle exception for connection issues
            $apiErrors['connection_error'] = 'Could not connect to the class API: ' . $e->getMessage();
        }

        
        return view('mahasiswa.index', compact('mahasiswa', 'apiErrors'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
      
        $request->validate([
        'kode_mahasiswa' => 'required|string|max:6',
        'nama_mahasiswa' => 'required|string|max:40',
        'sks' => 'required|string|max:40',

    ]);

        try {
            $response = Http::asForm()->post($this->endpoint, $request->all());

            if ($response->successful()) {
                return redirect()->route('mahasiswa.index')->with('success', 'Class data successfully added!');
            } else {
                // Perbaiki penanganan pesan error dari API CodeIgniter
                $apiResponse = $response->json();
                $errorMessage = 'Failed to add class data.';

                if (isset($apiResponse['messages'])) {
                    // Jika ada array 'messages' (misal dari fail($this->model->errors()))
                    if (is_array($apiResponse['messages'])) {
                        $errorMessage = implode(', ', array_values($apiResponse['messages']));
                    } else {
                        $errorMessage = $apiResponse['messages'];
                    }
                } elseif (isset($apiResponse['message'])) {
                    // Jika ada kunci 'message'
                    $errorMessage = $apiResponse['message'];
                }

                return redirect()->back()->withInput()->withErrors(['api_error' => $errorMessage]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['connection_error' => 'Could not connect to API: ' . $e->getMessage()]);
        }
    }

    public function show($id)
    {
        try {
            $mahasiswa = Http::get("{$this->endpoint}/{$id}")->json();
            return view('mahasiswa.show', compact('mahasiswa'));
        } catch (\Exception $e) {
            return redirect()->route('mahasiswa.index')->with('error', 'Could not connect to API: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $mahasiswa = Http::get("{$this->endpoint}/{$id}")->json();
            return view('mahasiswa.edit', compact('mahasiswa'));
        } catch (\Exception $e) {
            return redirect()->route('mahasiswa.index')->with('error', 'Could not connect to API: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mahasiswa' => 'required|string|max:40',
            'sks' => 'required|string|max:40',
        ]);

        try {
            $response = Http::put("{$this->endpoint}/{$id}", $request->except('kode_mahasiswa'));

            if ($response->successful()) {
                return redirect()->route('mahasiswa.index')->with('success', 'Class data successfully updated!');
            } else {
                $apiResponse = $response->json();
                $errorMessage = 'Failed to update class data.';

                if (isset($apiResponse['messages'])) {
                    if (is_array($apiResponse['messages'])) {
                        $errorMessage = implode(', ', array_values($apiResponse['messages']));
                    } else {
                        $errorMessage = $apiResponse['messages'];
                    }
                } elseif (isset($apiResponse['message'])) {
                    $errorMessage = $apiResponse['message'];
                }
                return redirect()->back()->withInput()->withErrors(['api_error' => $errorMessage]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['connection_error' => 'Could not connect to API: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $response = Http::delete("{$this->endpoint}/{$id}");

            if ($response->successful()) {
                return redirect()->route('mahasiswa.index')->with('success', 'Class data successfully deleted!');
            } else {
                $errorMessage = $response->json()['message'] ?? 'Failed to delete class data.';
                return redirect()->route('mahasiswa.index')->with('error', $errorMessage);
            }
        } catch (\Exception $e) {
            return redirect()->route('mahasiswa.index')->with('error', 'Could not connect to API: ' . $e->getMessage());
        }
    }
}
