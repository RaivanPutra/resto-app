<?php

namespace App\Http\Controllers;

use Exception;
use PDOException;
use App\Models\Menu;
use App\Models\Jenis;
use App\Http\Requests\MenuRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            // Retrieve data menu with eager loading for jenis
            $data['menu'] = Menu::with('jenis')->orderBy('created_at', 'DESC')->get();
            $data['jenis'] = Jenis::get();
            // dd($data['menu']); // Jika Anda ingin memeriksa data yang diambil
            return view('menu.index', ['title' => 'Menu'])->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            // Handle the error gracefully
            return 'Error: ' . $error->getMessage() . ' Code: ' . $error->getCode();
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
    public function store(MenuRequest $request)
    {

        // dd($request);
    // mengambil file gambar dari form modal
    $image= $request->file('image');
    // buat nama file
    $filename = date('Y-m-d').$image->getClientOriginalName();
    // buat alamat folder untuk penyimpanan file
    $path = 'menu-image/'. $filename;
    // menyimpan file 'gambar' ke dalam storage
    Storage::disk('public')->put($path, file_get_contents($image));
    
    // memasukan semua file dari request form modal kedalam variable data
    $data['id_jenis'] = $request->id_jenis; 
    $data['nama_menu'] = $request->nama_menu; 
    $data['harga'] = $request->harga; 
    $data['stok'] = $request->stok; 
    $data['image'] = $filename; 
    $data['deskripsi'] = $request->deskripsi; 

    // jalankan perintah create data
    Menu::create($data);
    return redirect('menu')->with('success', 'Data menu berhasil ditambahkan.');

    }





    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        // cek apabila ada file gambar baru yang dikirimkan

        if ($request-file('image')) { 
            if($request-> old_image) {
        
                // apabila ada data gambar lama maka gambar akan dihapus dari folder storage 
                Storage::disk('public')->delete('menu-image/'.$request->old_image);
            }
            $image = $request->file('image');
            $filename = date('Y-m-d') . $image->getClientOriginalName();
            $path = 'menu-image/' . $filename;
        }

        // memasukan semua file dari request form modal kedalam variable data
    $data['id_jenis'] = $request->id_jenis; 
    $data['nama_menu'] = $request->nama_menu; 
    $data['harga'] = $request->harga; 
    $data['stok'] = $request->stok; 
    $data['deskripsi'] = $request->deskripsi; 

    // jalankan perintah create data
    Menu::update($data);
    return redirect('menu')->with('success', 'Update berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        try {
            $menu->delete();
            return redirect('menu')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Exception | PDOException  $error) {
            $this->failResponse($error->getMessage() . $error->getCode());
        }
    }
}