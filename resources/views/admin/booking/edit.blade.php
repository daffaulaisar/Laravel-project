@extends('layouts.app', ['title' => 'Edit Booking - Admin'])
@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8">
        <div class="p-6 bg-white rounded-md shadow-md">
            <h2 class="text-lg
        text-gray-700 font-semibold capitalize">EDIT Booking</h2>
            <hr class="mt-4">
            <form action="{{ route('admin.booking.update', $booking->booking_id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="mb-4">
                    <label for="customer_id" class="block text-gray-600 text-sm font-medium mb-2">Costomer</label>
                    <select name="customer_id" id="customer_id" class="form-select w-full mt-2 rounded-md bg-gray-200 focus:bg-white">
                        @foreach($customer as $cs)
                        <option value="{{ $cs->customer_id }}" {{ $booking->customer_id == $cs->customer_id ? 'selected': '' }}>
                            {{ $cs->nama_depan }} {{ $cs->nama_belakang }}
                        </option>
                        @endforeach
                    </select>
                    @error('customer_id')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="penerbangan_id" class="block text-gray-600 text-sm font-medium mb-2">penerbangan</label>
                    <select name="penerbangan_id" id="penerbangan_id" class="form-select w-full mt-2 rounded-md bg-gray-200 focus:bg-white">
                        @foreach($penerbangan as $pb)
                        <option value="{{ $pb->penerbangan_id }}" {{ $booking->penerbangan_id == $pb->penerbangan_id ? 'selected' : '' }}>
                            {{ $pb->pesawat }}
                        </option>
                        @endforeach
                    </select>
                    @error('penerbangan_id')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700" for="waktu">Waktu Booking</label>
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="datetime-local"
                        name="waktu" value="{{ old('waktu',$booking->waktu)}}" placeholder="Masukkan Waktu Booking">
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
                    <label class="text-gray-700" for="bangku">Nomor Bangku</label>
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text"
                        name="bangku" value="{{ old('bangku',$booking->bangku)}}" placeholder="Masukkan Nomor Bangku">
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
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="number"
                        name="total_hrg" value="{{ old('total_hrg',$booking->total_hrg)}}"
                        placeholder="Masukkan Total Harga">
                    @error('total_hrg')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>

                <div class="flex justify-start mt-4">
                    <button type="submit"
                        class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray700">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection