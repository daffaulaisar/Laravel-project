@extends('layouts.app', ['title' => 'Tambah pembayaran - Admin'])
@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8">
        <div class="p-6 bg-white rounded-md shadow-md">
            <h2 class="text-lg
        text-gray-700 font-semibold capitalize">TAMBAH pembayaran</h2>
            <hr class="mt-4">
            <form action="{{ route('admin.pembayaran.store') }}" method="POST"> @csrf <div
                    class="grid grid-cols-1 gap-6 mt-4">
                    <div>
                        <label class="text-gray-700" for="booking_id">Booking</label>
                        <select class="form-select w-full mt-2 rounded-md bg-gray-200 focus:bg-white" name="booking_id">
                            <option value="" disabled selected>Pilih Waktu Booking</option>
                            @foreach($booking as $bk)
                            <option value="{{ $bk->booking_id }}">{{ $bk->waktu}}</option>
                            @endforeach
                        </select>
                        @error('booking_id')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>


                    <div>
                        <label class="text-gray-700" for="waktu">Waktu pembayaran</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="datetime-local" name="waktu" value="{{ old('waktu')}}" placeholder="Masukkan Waktu pembayaran">
                        @error('waktu')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{
                                    $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700" for="metode">Pilih Metode</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="metode" value="{{ old('metode')}}" placeholder="Masukkan Metode Pembayaran">
                        @error('metode')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{
                                    $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-700" for="total">Total Harga</label>
                        <input class="form-input w-full mt-2 rounded-mdbg-gray-200 focus:bg-white" type="number" name="total" value="{{ old('total')}}" placeholder="Masukkan Total Harga">
                        @error('total')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{
                                    $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div class="flex justify-start mt-4">
                        <button type="submit" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray700">SIMPAN</button>
                    </div>
            </form>
        </div>
    </div>
</main>
@endsection