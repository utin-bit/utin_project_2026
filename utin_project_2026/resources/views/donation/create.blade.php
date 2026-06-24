@extends('app')

@section('content')

<form action="/donation" method="POST" 
      class="max-w-2xl mx-auto bg-white p-8 shadow-md rounded-lg space-y-6">
    @csrf

    <h2 class="text-xl font-bold border-b-2 border-green-500 pb-2">
        Form Donasi
    </h2>

    {{-- Pilih Campaign --}}
    <div>
        <label class="text-sm text-gray-600">Pilih Campaign</label>
        <select name="campaign_id" 
                class="border p-2 w-full rounded focus:ring-2 focus:ring-green-400" 
                required>
            <option value="">-- Pilih Campaign --</option>
            @foreach($campaigns as $campaign)
                <option value="{{ $campaign->id }}">{{ $campaign->title }}</option>
            @endforeach
        </select>
    </div>

    {{-- Nama Donatur --}}
    <div>
        <label class="text-sm text-gray-600">Nama Donatur</label>
        <input type="text" name="donor_name" 
               placeholder="Masukkan nama Anda"
               class="border p-2 w-full rounded focus:ring-2 focus:ring-green-400" 
               required>
    </div>

    {{-- Jumlah Donasi --}}
    <div>
        <label class="text-sm text-gray-600">Jumlah Donasi (Rp)</label>
        <input type="number" name="amount" 
               placeholder="Contoh: 50000"
               class="border p-2 w-full rounded focus:ring-2 focus:ring-green-400" 
               required>
    </div>

    {{-- Pesan --}}
    <div>
        <label class="text-sm text-gray-600">Pesan (Opsional)</label>
        <textarea name="message" 
                  placeholder="Tulis pesan dukungan..."
                  class="border p-2 w-full rounded h-24 focus:ring-2 focus:ring-green-400">
        </textarea>
    </div>

    <button type="submit" 
            class="bg-green-600 hover:bg-green-700 text-white font-bold px-6 py-3 rounded-lg w-full">
        💚 Kirim Donasi
    </button>

</form>

@endsection