<?php

namespace App\Http\Controllers;

use Exception;
use PDOException;
use App\Models\Pelanggan;
use App\Http\Requests\PelangganRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Queri mengambil data pelanggan
            $data['pelanggan'] = Pelanggan::orderBy('created_at', 'DESC')->get();
            return view('pelanggan.index', ['title' => 'Pelanggan'])->with($data);
        } catch (QueryException $error) {
            return 'QueryException: Terjadi kesalahan saat menjalankan kueri database. Pesan: ' . $error->getMessage();
        } catch (Exception $error) {
            return 'Exception: Terjadi kesalahan umum. Pesan: ' . $error->getMessage();
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PelangganRequest $request)
    {
        try {

            Pelanggan::create($request->all()); //query input ke table
            return redirect('pelanggan')->with('success', 'Data Pelanggan berhasil ditambahkan!');
        } catch (QueryException | Exception | PDOException $error) {

            // $this->failResponse($error->getMessage(), $error->getCode());
            return 'haha error' . $error->getMessage() . $error->getCode();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PelangganRequest $request, Pelanggan $pelanggan)
    {
        try {
            // Validasi data yang dikirimkan
            $validatedData = $request->validated();
    
            // Update data pelanggan
            $pelanggan->update($validatedData);
    
            return redirect('pelanggan')->with('success', 'Update data berhasil!');
        } catch (\Exception $error) {
            // Tangani kesalahan jika terjadi
            return 'haha error' . $error->getMessage() . $error->getCode();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        try {
            $pelanggan->delete();
            return redirect('pelanggan')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException  $error) {
            $this->failResponse($error->getMessage() . $error->getCode());
        }
    }
    
}