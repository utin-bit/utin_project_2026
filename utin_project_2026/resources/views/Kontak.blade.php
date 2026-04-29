@extends('app')

@section('title', 'Kontak - Donasiku')

@section('content')
<div class="py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-green-600 mb-4">Hubungi Kami</h1>
        <p class="text-gray-600">Ada pertanyaan? Kami siap membantu Anda kapan saja.</p>
    </div>

    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-10">
        <div class="space-y-6">
            <div class="bg-green-50 p-6 rounded-xl border border-green-100">
                <h3 class="font-bold text-green-700 text-lg mb-2">Alamat</h3>
                <p class="text-gray-600">Jl. Pendidikan No. 123, Kota Pontianak, Kalimantan Barat</p>
            </div>
            <div class="bg-green-50 p-6 rounded-xl border border-green-100">
                <h3 class="font-bold text-green-700 text-lg mb-2">Email</h3>
                <p class="text-gray-600">halo@donasiku.com</p>
            </div>
            <div class="bg-green-50 p-6 rounded-xl border border-green-100">
                <h3 class="font-bold text-green-700 text-lg mb-2">WhatsApp</h3>
                <p class="text-gray-600">+62 812-3456-7890</p>
            </div>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-md">
            <form action="#" class="space-y-4">
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Nama Lengkap</label>
                    <input type="text" class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-green-500 outline-none" placeholder="Masukkan nama...">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Email</label>
                    <input type="email" class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-green-500 outline-none" placeholder="email@contoh.com">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-1">Pesan</label>
                    <textarea class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-green-500 outline-none" rows="4" placeholder="Tulis pesan..."></textarea>
                </div>
                <button type="button" class="w-full bg-green-600 text-white font-bold py-3 rounded-lg hover:bg-green-700 transition">
                    Kirim Pesan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection