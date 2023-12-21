<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\booking;
use App\Models\pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    //
    // // // //method untuk tampilkan data pembayaran
     public function index(){
        $pembayaran = pembayaran::latest()->when (request()->q,function($pembayaran){
            $pembayaran = $pembayaran -> where ("booking_id","like","%".request()->q."%");
        })->paginate(10);
        return view("admin.pembayaran.index",compact("pembayaran"));
    }
    
    // method untuk panggil form input data
    public function create(){
         $booking = booking::all();

        return view("admin.pembayaran.create" , compact('booking'));
    }

    //method untuk kirim data dari imputan form ke tabel kategori database
    public function store(Request $request){
        //validasi imputan
        $this->validate($request,[
            'booking_id'=> 'required',
            'waktu'=> 'required',
            'metode' => 'required',
            'total'=> 'required',
          
            
        ]);
    
    
        //data input disimpan kedalam tabel
        $pembayaran = pembayaran::create([
            'booking_id' => $request->booking_id,
            'waktu' => $request->waktu,
            'metode' => $request->metode,
            'total' => $request->total,
            

            ]);
    
            //kondisi
            if($pembayaran){
                //redirect dengan tampilkan pesan
                return redirect()->route('admin.pembayaran.index')->with(['success' =>'Data anda berhasil disimpan di dalam tabel pembayaran']);
            }else{
                
                return redirect()->route('admin.pembayaran.index')->with(['error' =>'Data anda gagal disimpan tabel pembayaran']);
            }
    
        }
           //method untuk tampilkan data yang mau diubah
    public function edit(pembayaran $pembayaran){
         $booking = booking::all();
        return view('admin.pembayaran.edit',compact('pembayaran','booking'));
    }

    //buat method untuk kirimkan data yang diubah di form imputan
    public function update(Request $request,pembayaran $pembayaran){
        //validasi imputan
        $this->validate($request, [
        'booking_id'=> 'required',
        'waktu'=> 'required',
        'metode' => 'required',
        'total'=> 'required',
       
        ]);

    //update data di tabel kategori dengan data baru
    $pembayaran = pembayaran::findorfail($pembayaran->pembayaran_id);
    $pembayaran->update([
        'booking_id' => $request->booking_id,
        'waktu' => $request->waktu	,
        'metode' => $request->metode,
        'total_hrg' => $request->total_hrg,
        
    ]);


    //kondisi jika berhasil atau tidak ubah datanya
    if($pembayaran){
        //redirect dengan tampilkan pesan
    return redirect()->route('admin.pembayaran.index')->with(['success' =>'Data anda berhasil disimpan di dalam tabel pembayaran']);
}else{
    
    return redirect()->route('admin.pembayaran.index')->with(['error' =>'Data anda gagal disimpan tabel pembayaran']);
}

    }

    // method untuk hapus data
    public function destroy($id){
        $pembayaran = pembayaran::findorfail($id);
        $pembayaran->delete();

        //kondisi berhasil atau tidak hapus datanya
        if ($pembayaran){
            return response()->json(['status'=> 'success']);
        }else{
            return response()->json(['error'=> 'error']);
        }

    }

}
