
@extends('layouts.app', ['title' => 'Edit Penerbangan - Admin'])
@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8"> <div class="p-6 bg-white rounded-md shadow-md"> <h2 class="text-lg
        text-gray-700 font-semibold capitalize">EDIT Penerbangan</h2> <hr class="mt-4"> <form
        action="{{ route('admin.penerbangan.update', $penerbangan->penerbangan_id) }}" method="POST">
        @csrf @method('PUT') 
    <div> <label class="text-gray-700" for="pesawat">PESAWAT</label>
            <input class="form-input w-full mt-2 rounded-md
            bg-gray-200 focus:bg-white" type="text" name="pesawat" value="{{ old('pesawat',
            $penerbangan->pesawat) }}" placeholder="Masukkan Nama pesawat">
            @error('pesawat')
            <div class="w-full bg-red-200 shadow-sm
rounded-md overflow-hidden mt-2">
                <div class="px-4 py-2">
                    <p class=" text-gray-600 text-sm">{{
                $message }}</p>
                </div>
            </div>
            @enderror
    </div>
   <div>
            <label class="text-gray-700" for="kota_keberangkatan">KOTA KEBERANGKATAN</label>
            <input class="form-input w-full mt-2 rounded-md
bg-gray-200 focus:bg-white" type="text" name="kota_keberangkatan" value="{{ old('kota_keberangkatan' ,$penerbangan->kota_keberangkatan)}}" 
placeholder="Masukkan Nama Kota Keberangakatan">
            @error('kota_keberangkatan')
            <div class="w-full bg-red-200 shadow-sm
rounded-md overflow-hidden mt-2">
                <div class="px-4 py-2">
                    <p class="text-gray-600 text-sm">{{
                        $message }}</p>
                </div>
            </div>
            @enderror
        </div>
        <div>
            <label class="text-gray-700" for="kota_kedatangan">KOTA KEDATANGAN</label>
            <input class="form-input w-full mt-2 rounded-md
bg-gray-200 focus:bg-white" type="text" name="kota_kedatangan" value="{{ old('kota_kedatangan' ,$penerbangan->kota_kedatangan)
}}" placeholder="Masukkan Nama Kota Kedatangan">
            @error('kota_kedatangan')
            <div class="w-full bg-red-200 shadow-sm
rounded-md overflow-hidden mt-2">
                <div class="px-4 py-2">
                    <p class="text-gray-600 text-sm">{{
                        $message }}</p>
                </div>
            </div>
            @enderror
        </div>
        <div>
            <label class="text-gray-700" for="tgl_keberangkatan">WAKTU KEBERANGKATAN</label>
            <input class="form-input w-full mt-2 rounded-md
bg-gray-200 focus:bg-white" type="datetime-local" name="tgl_keberangkatan" value="{{ old('tgl_keberangkatan', $penerbangan->tgl_keberangkatan)
}}" placeholder="Masukkan Waktu Keberankatan">
            @error('tgl_keberangkatan')
            <div class="w-full bg-red-200 shadow-sm
rounded-md overflow-hidden mt-2">
                <div class="px-4 py-2">
                    <p class="text-gray-600 text-sm">{{
                        $message }}</p>
                </div>
            </div>
            @enderror
        </div>
        <div>
            <label class="text-gray-700" for="tgl_kedatangan">WAKTU KEDATANGAN</label>
            <input class="form-input w-full mt-2 rounded-md
bg-gray-200 focus:bg-white" type="datetime-local" name="tgl_kedatangan" value="{{ old('tgl_kedatangan' ,$penerbangan->tgl_kedatangan)
}}" placeholder="Masukkan Waktu Kedatangan">
            @error('tgl_kedatangan')
            <div class="w-full bg-red-200 shadow-sm
rounded-md overflow-hidden mt-2">
                <div class="px-4 py-2">
                    <p class="text-gray-600 text-sm">{{
                        $message }}</p>
                </div>
            </div>
            @enderror
        </div>
         <div>
            <label class="text-gray-700" for="tgl_kedatangan">HARGA</label>
            <input class="form-input w-full mt-2 rounded-md
bg-gray-200 focus:bg-white" type="number" name="harga" value="{{ old('harga' , $penerbangan->harga)}}" placeholder="Masukkan Harga">
            @error('harga')
            <div class="w-full bg-red-200 shadow-sm
rounded-md overflow-hidden mt-2">
                <div class="px-4 py-2">
                    <p class="text-gray-600 text-sm">{{
                        $message }}</p>
                </div>
            </div>
            @enderror
        </div>
        
    <div class="flex justify-start mt-4">
        <button type="submit" class="px-4 py-2 bg-gray-600
text-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray700">SIMPAN</button>
    </div>
    </form>
    </div>
    </div>
</main>
@endsection