@extends('layouts.app', ['title' => 'Tambah booking - Admin'])
@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8">
        <div class="p-6 bg-white rounded-md shadow-md">
            <h2 class="text-lg
        text-gray-700 font-semibold capitalize">TAMBAH booking</h2>
            <hr class="mt-4">
            <form action="{{ route('admin.booking.store') }}" method="POST"> @csrf <div
                    class="grid grid-cols-1 gap-6 mt-4">
                    <div>
                        <label class="text-gray-700" for="customer_id">Customer</label>
                        <select class="form-select w-full mt-2 rounded-md bg-gray-200 focus:bg-white"
                            name="customer_id">
                            <option value="" disabled selected>Pilih Customer</option>
                            @foreach($customer as $cs)
                            <option value="{{ $cs->customer_id }}">{{ $cs->nama_depan }} {{ $cs->nama_belakang}}
                            </option>
                            @endforeach
                        </select>
                        @error('customer_id')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-700" for="penerbangan_id">Penerbangan</label>
                        <select class="form-select w-full mt-2 rounded-md bg-gray-200 focus:bg-white"
                            name="penerbangan_id">
                            <option value="" disabled selected>Pilih Penerbangan</option>
                            @foreach($penerbangan as $pb)
                            <option value="{{ $pb->penerbangan_id }}">{{ $pb->pesawat}}</option>
                            @endforeach
                        </select>
                        @error('penerbangan_id')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{ $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>


                    <div>
                        <label class="text-gray-700" for="waktu">Waktu Booking</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="datetime-local" name="waktu" value="{{ old('waktu')}}" placeholder="Masukkan Waktu Booking">
                        @error('waktu')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{$message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-gray-700" for="bangku">Nomor Bangku</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text" name="bangku" value="{{ old('bangku')}}" placeholder="Masukkan Nomor Bangku">
                        @error('bangku')
                        <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                            <div class="px-4 py-2">
                                <p class="text-gray-600 text-sm">{{
                                    $message }}</p>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label class="text-gray-700" for="total_hrg">Total Harga</label>
                        <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="number" name="total_hrg" value="{{ old('total_hrg')}}" placeholder="Masukkan Total Harga">
                        @error('total_hrg')
                        <div class="w-full bg-red-200 shadow-smrounded-md overflow-hidden mt-2">
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