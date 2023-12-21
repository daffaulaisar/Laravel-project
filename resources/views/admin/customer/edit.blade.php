
@extends('layouts.app', ['title' => 'Edit Customer - Admin'])
@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300">
    <div class="container mx-auto px-6 py-8"> <div class="p-6 bg-white rounded-md shadow-md"> <h2 class="text-lg
        text-gray-700 font-semibold capitalize">EDIT customer</h2> <hr class="mt-4"> <form
        action="{{ route('admin.customer.update', $customer->customer_id) }}" method="POST">
        @csrf @method('PUT') 
    <div> <label class="text-gray-700" for="NIK">NIK</label>
            <input class="form-input w-full mt-2 rounded-md
            bg-gray-200 focus:bg-white" type="number" name="NIK" value="{{ old('NIK',
            $customer->NIK) }}" placeholder="NIk">
            @error('NIK')
            <div class="w-full bg-red-200 shadow-sm
rounded-md overflow-hidden mt-2">
                <div class="px-4 py-2">
                    <p class=" text-gray-600 text-sm">{{
                $message }}</p>
                </div>
            </div>
            @enderror
    </div>
    <div> <label class="text-gray-700" for="nama_depan">NAMA DEPAN</label>
            <input class="form-input w-full mt-2 rounded-md
            bg-gray-200 focus:bg-white" type="text" name="nama_depan" value="{{ old('nama_depan',
            $customer->nama_depan) }}" placeholder="Nama Depan">
            @error('nama_depan')
            <div class="w-full bg-red-200 shadow-sm
rounded-md overflow-hidden mt-2">
                <div class="px-4 py-2">
                    <p class=" text-gray-600 text-sm">{{
                $message }}</p>
                </div>
            </div>
            @enderror
    </div>
    <div> <label class="text-gray-700" for="nama_belakang">NAMA BELAKANG</label>
            <input class="form-input w-full mt-2 rounded-md
            bg-gray-200 focus:bg-white" type="text" name="nama_belakang" value="{{ old('nama_belakang',
            $customer->nama_belakang) }}" placeholder="Nama Belakang">
            @error('nama_belakang')
            <div class="w-full bg-red-200 shadow-sm
rounded-md overflow-hidden mt-2">
                <div class="px-4 py-2">
                    <p class=" text-gray-600 text-sm">{{
                $message }}</p>
                </div>
            </div>
            @enderror
    </div>
    <div> <label class="text-gray-700" for="jenis_kelamin">JENIS KELAMIN</label>
            <input class="form-input w-full mt-2 rounded-md
            bg-gray-200 focus:bg-white" type="text" name="jenis_kelamin" value="{{ old('jenis_kelamin',
            $customer->jenis_kelamin) }}" placeholder="Jenis Kelamin">
            @error('jenis_kelamin')
            <div class="w-full bg-red-200 shadow-sm
rounded-md overflow-hidden mt-2">
                <div class="px-4 py-2">
                    <p class=" text-gray-600 text-sm">{{
                $message }}</p>
                </div>
            </div>
            @enderror
    </div>
    <div> <label class="text-gray-700" for="no_hp">NO HP</label>
            <input class="form-input w-full mt-2 rounded-md
            bg-gray-200 focus:bg-white" type="number" name="no_hp" value="{{ old('no_hp',
            $customer->no_hp) }}" placeholder="Masukkan NO HP">
            @error('no_hp')
            <div class="w-full bg-red-200 shadow-sm
rounded-md overflow-hidden mt-2">
                <div class="px-4 py-2">
                    <p class=" text-gray-600 text-sm">{{
                $message }}</p>
                </div>
            </div>
            @enderror
    </div>
    <div class="flex justify-start mt-4">
        <button type="submit" class="px-4 py-2 bg-gray-600
text-white rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray700">UPDATE</button>
    </div>
    </form>
    </div>
    </div>
</main>
@endsection