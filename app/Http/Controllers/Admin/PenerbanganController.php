<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\penerbangan;
use Illuminate\Http\Request;

class PenerbanganController extends Controller
{
    //// // //method untuk tampilkan data penerbangan
     public function index(){
        $penerbangan = penerbangan::latest()->when (request()->q,function($penerbangan){
            $penerbangan = $penerbangan -> where ("pesawat","like","%".request()->q."%");
        })->paginate(10);
        return view("admin.penerbangan.index",compact("penerbangan"));
    }

    // method untuk panggil form input data
    public function create(){
        return view("admin.penerbangan.create");
    }

    //method untuk kirim data dari imputan form ke tabel penerbangan database
    public function store(Request $request){
        //validasi imputan
        $this->validate($request,[
            'pesawat'=> 'required',
            'kota_keberangkatan'=> 'required',
            'kota_kedatangan' => 'required',
            'tgl_keberangkatan' => 'required',
            'tgl_kedatangan'=> 'required',
            'harga'=>'required'
          
            
        ]);
    
    
        //data input disimpan kedalam tabel
        $penerbangan = penerbangan::create([
            'pesawat' => $request->pesawat,
            'kota_keberangkatan' => $request->kota_keberangkatan,
            'kota_kedatangan' => $request->kota_kedatangan,
            'tgl_keberangkatan' => $request->tgl_keberangkatan,
            'tgl_kedatangan' => $request->tgl_kedatangan,
            'harga' => $request->harga,
            

            ]);
      //kondisi jika berhasil atau tidak ubah datanya
    if($penerbangan){
        //redirect dengan tampilkan pesan
    return redirect()->route('admin.penerbangan.index')->with(['success' =>'Data anda berhasil disimpan di dalam tabel Penerbangan']);
}else{
    
    return redirect()->route('admin.penerbangan.index')->with(['error' =>'Data anda gagal disimpan tabel penerbangan']);
}
    
        }
         //method untuk tampilkan data yang mau diubah
    public function edit(penerbangan $penerbangan){
        return view('admin.penerbangan.edit',compact('penerbangan'));
    }

   //buat method untuk kirimkan data yang diubah di form imputan
    public function update(Request $request,penerbangan $penerbangan){
        //validasi imputan
        $this->validate($request, [
        'pesawat'=> 'required',
        'kota_keberangkatan'=> 'required',
        'kota_kedatangan' => 'required',
        'tgl_keberangkatan' => 'required',
        'tgl_kedatangan'=> 'required',
       	'harga'=> 'required',
        ]);

    //update data di tabel penerbangan dengan data baru
    $penerbangan = penerbangan::findorfail($penerbangan->penerbangan_id);
    $penerbangan->update([
        'pesawat' => $request->pesawat,
        'kota_keberangkatan' => $request->kota_keberangkatan,
        'kota_kedatangan' => $request->kota_kedatangan,
        'tgl_keberangkatan' => $request->tgl_keberangkatan,
        'tgl_kedatangan' => $request->tgl_kedatangan,
	'harga'=> $request->harga,
        
    ]);



    //kondisi jika berhasil atau tidak ubah datanya
    if($penerbangan){
        //redirect dengan tampilkan pesan
    return redirect()->route('admin.penerbangan.index')->with(['success' =>'Data anda berhasil disimpan di dalam tabel penerbangan']);
}else{
    
    return redirect()->route('admin.penerbangan.index')->with(['error' =>'Data anda gagal disimpan tabel penerbangan']);
}

    }

    // method untuk hapus data
    public function destroy($id){
        $penerbangan = penerbangan::findorfail($id);
        $penerbangan->delete();

        //kondisi berhasil atau tidak hapus datanya
        if ($penerbangan){
            return response()->json(['status'=> 'success']);
        }else{
            return response()->json(['error'=> 'error']);
        }

    }

}
