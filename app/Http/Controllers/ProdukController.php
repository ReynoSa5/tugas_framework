<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    protected $produk = [
        ['id' => 1, 'nama' => 'Kopi Hitam', 'harga' => 15000],
        ['id' => 2, 'nama' => 'Teh Manis', 'harga' => 10000],
        ['id' => 3, 'nama' => 'Roti Bakar', 'harga' => 20000],
        ['id' => 4, 'nama' => 'Nasi Goreng', 'harga' => 30000],
        ['id' => 5, 'nama' => 'Ayam Geprek', 'harga' => 25000],
        ['id' => 6, 'nama' => 'Mie Ayam', 'harga' => 20000],
        ['id' => 7, 'nama' => 'Es Jeruk', 'harga' => 12000],
        ['id' => 8, 'nama' => 'Susu Coklat', 'harga' => 17000],
        ['id' => 9, 'nama' => 'Burger', 'harga' => 25000],
        ['id' => 10, 'nama' => 'Kentang Goreng', 'harga' => 15000]
    ];
    
    public function asep(){
        return $this->produk;
    }

   
    //no2
    public function no_2($id){
    foreach ($this->produk as $produk) {
        if ($produk['id'] == $id) {
            return response()->json($produk);
            }
        }
    }

    //no3
    public function no_3(Request $request){
    $produkList = session('produk', $this->produk);
    $id = count($produkList) + 1;
    $produkBaru = [
        'id' => $id,
        'nama' => $request->input('nama'),
        'harga' => $request->input('harga')
    ];
    $produkList[] = $produkBaru;
    session(['produk' => $produkList]);

        return response()->json([
        'message' => 'Produk berhasil ditambahkan!',
        'produk' => $produkBaru
        ], 201);
    }



    //no4
    public function no_4()
{
    $produkList = session('produk', $this->produk);
    return response()->json($produkList);
}


    public function edit($id){
        foreach ($this->produk as $produk) {
            if ($produk['id'] == $id) {
                return view('edit-produk', ['produk' => $produk]);
            }
        }
    }


    //no7
    public function no_7(Request $request, $id){
    foreach ($this->produk as &$produk) {
        if ($produk['id'] == $id) {
            $produk['nama'] = $request->input('nama', $produk['nama']);
            $produk['harga'] = $request->input('harga', $produk['harga']);

            return response()->json([
                "message" => "Produk dengan ID: {$id} berhasil diperbarui.",
                "produk" => $produk
            ]);
        }
    }

}

//8







    

}
