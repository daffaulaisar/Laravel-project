<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\booking;
use App\Models\customer;
use App\Models\penerbangan;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    // // // //method untuk tampilkan data booking
    public function index()
    {
        $booking = booking::latest()->when(request()->q, function ($booking) {
            $booking = $booking->where("customer_id", "like", "%" . request()->q . "%");
        })->paginate(10);
        $booking = booking::with(['customer', 'penerbangan'])->paginate(10);
        return view("admin.booking.index", compact("booking"));
    }

    // method untuk panggil form input data
    public function create()
    {
        $customer = customer::all();
        $penerbangan = penerbangan::all();
        return view("admin.booking.create", compact('customer', 'penerbangan'));
    }

    //method untuk kirim data dari imputan form ke tabel kategori database
    public function store(Request $request)
    {
        //validasi imputan
        $this->validate($request, [
            'customer_id' => 'required|exists:customers,customer_id',
            'penerbangan_id' => 'required|exists:penerbangans,penerbangan_id',
            'waktu' => 'required|:bookings',
            'bangku' => 'required|:bookings',
            'total_hrg' => 'required|:bookings',


        ]);
        //data input disimpan kedalam tabel
        $booking = booking::create([
            'customer_id' => $request->customer_id,
            'penerbangan_id' => $request->penerbangan_id,
            'waktu' => $request->waktu,
            'bangku' => $request->bangku,
            'total_hrg' => $request->total_hrg,
        ]);

        //kondisi
        if ($booking) {
            //redirect dengan tampilkan pesan
            return redirect()->route('admin.booking.index')->with(['success' => 'Data anda berhasil disimpan di dalam tabel booking']);
        } else {

            return redirect()->route('admin.booking.index')->with(['error' => 'Data anda gagal disimpan tabel booking']);
        }
    }


    //method untuk tampilkan data yang mau diubah
    public function edit(booking $booking)
    {
        $booking = booking::findorfail($booking->booking_id);
        $customer = customer::all();
        $penerbangan = penerbangan::all();
        return view('admin.booking.edit', compact('booking', 'customer', 'penerbangan'));
    }

    //buat method untuk kirimkan data yang diubah di form imputan
    public function update(Request $request, booking $booking)
    {
        //validasi imputan
        $request->validate([
            'customer_id' => 'required|exists:customers,customer_id',
            'penerbangan_id' => 'required|exists:penerbangans,penerbangan_id',
            'waktu' => 'required|:bookings,waktu',
            'bangku' => 'required|:bookings,bangku',
            'total_hrg' => 'required|:bookings,total_hrg',

        ]);

        //update data di tabel kategori dengan data baru

        $booking->update([
            'customer_id' => $request->customer_id,
            'penerbangan_id' => $request->penerbangan_id,
            'waktu' => $request->waktu,
            'bangku' => $request->bangku,
            'total_hrg' => $request->total_hrg,

        ]);


        //kondisi jika berhasil atau tidak ubah datanya
        if ($booking) {
            //redirect dengan tampilkan pesan
            return redirect()->route('admin.booking.index')->with(['success' => 'Data anda berhasil disimpan di dalam tabel Booking']);
        } else {

            return redirect()->route('admin.booking.index')->with(['error' => 'Data anda gagal disimpan tabel Booking']);
        }

    }

    // method untuk hapus data
    public function destroy($id)
    {
        $booking = booking::findorfail($id);
        $booking->delete();


        //kondisi berhasil atau tidak hapus datanya
        if ($booking) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['error' => 'error']);
        }

    }


}
