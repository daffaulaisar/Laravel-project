<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // // //method untuk tampilkan data customer
     public function index(){
        $customer = customer::latest()->when (request()->q,function($customer){
            $customer = $customer -> where ("NIK","like","%".request()->q."%");
        })->paginate(10);
        return view("admin.customer.index",compact("customer"));
    }

    // method untuk panggil form input data
    public function create(){
        return view("admin.customer.create");
    }

    //method untuk kirim data dari imputan form ke tabel customer database
    public function store(Request $request){
        //validasi imputan
        $this->validate($request,[
            'NIK'=> 'required',
            'nama_depan'=> 'required',
            'nama_belakang' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp'=> 'required',
          
            
        ]);
    
    
        //data input disimpan kedalam tabel
        $customer = customer::create([
            'NIK' => $request->NIK,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            

            ]);
    
            //kondisi
            if($customer){
                //redirect dengan tampilkan pesan
                return redirect()->route('admin.customer.index')->with(['success' =>'Data anda berhasil disimpan di dalam tabel Customer']);
            }else{
                
                return redirect()->route('admin.customer.index')->with(['error' =>'Data anda gagal disimpan tabel Customer']);
            }
    
        }
         //method untuk tampilkan data yang mau diubah
    public function edit(customer $customer){
        return view('admin.customer.edit',compact('customer'));
    }

    //buat method untuk kirimkan data yang diubah di form imputan
    public function update(Request $request,customer $customer){
        //validasi imputan
        $this->validate($request, [
        'NIK'=> 'required',
        'nama_depan'=> 'required',
        'nama_belakang' => 'required',
        'jenis_kelamin' => 'required',
        'no_hp'=> 'required',
       
        ]);

    //update data di tabel customer dengan data baru
    $customer = customer::findorfail($customer->customer_id);
    $customer->update([
        'NIK' => $request->NIK,
        'nama_depan' => $request->nama_depan,
        'nama_belakang' => $request->nama_belakang,
        'jenis_kelamin' => $request->jenis_kelamin,
        'no_hp' => $request->no_hp,
        
    ]);


    //kondisi jika berhasil atau tidak ubah datanya
    if($customer){
        //redirect dengan tampilkan pesan
    return redirect()->route('admin.customer.index')->with(['success' =>'Data anda berhasil disimpan di dalam tabel customer']);
}else{
    
    return redirect()->route('admin.customer.index')->with(['error' =>'Data anda gagal disimpan tabel customer']);
}

    }

    // method untuk hapus data
    public function destroy($id){
        $customer = customer::findorfail($id);
        $customer->delete();

        //kondisi berhasil atau tidak hapus datanya
        if ($customer){
            return response()->json(['status'=> 'success']);
        }else{
            return response()->json(['error'=> 'error']);
        }

    }

}
