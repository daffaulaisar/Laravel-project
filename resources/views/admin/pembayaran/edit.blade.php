@extends('layouts.app', ['title' => 'Edit pembayaran - Admin'])
@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8">
        <div class="p-6 bg-white rounded-md shadow-md">
            <h2 class="text-lg
        text-gray-700 font-semibold capitalize">EDIT pembayaran</h2>
            <hr class="mt-4">
            <form action="{{ route('admin.pembayaran.update', $pembayaran->pembayaran_id) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-4">
                    <label for="booking_id" class="block text-gray-600 text-sm font-medium mb-2">Costomer</label>
                    <select name="booking_id" id="booking_id"
                        class="form-select w-full mt-2 rounded-md bg-gray-200 focus:bg-white">
                        @foreach($booking as $bk)
                        <option value="{{ $bk->booking_id }}" {{ $pembayaran->booking_id == $bk->booking_id ?
                            'selected': '' }}>
                            {{ $bk->waktu }}
                        </option>
                        @endforeach
                    </select>
                    @error('booking_id')
                    <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                        <div class="px-4 py-2">
                            <p class="text-gray-600 text-sm">{{$message }}</p>
                        </div>
                    </div>
                    @enderror
                </div>

                <div>
                    <label class="text-gray-700" for="waktu">Waktu pembayaran</label>
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="datetime-local"
                        name="waktu" value="{{ old('waktu' , $pembayaran->waktu)}}"
                        placeholder="Masukkan Waktu pembayaran">
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
                    <label class="text-gray-700" for="metode">Metode Pembayaran</label>
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="text"
                        name="metode" value="{{ old('metode',$pembayaran->metode)}}"
                        placeholder="Masukkan Metode Pembayaran">
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
                    <input class="form-input w-full mt-2 rounded-md bg-gray-200 focus:bg-white" type="number"
                        name="total" value="{{ old('total',$pembayaran->total)}}" placeholder="Masukkan Total Harga">
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
                    <button type="submit"
                        class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray700">UPDATE</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection