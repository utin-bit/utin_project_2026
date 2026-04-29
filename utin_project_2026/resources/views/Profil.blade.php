@extends('app')

@section('title', 'Profil - Donasiku')

@section('content')
<div class="py-12">
    <div class="text-center mb-16">
        <h1 class="text-4xl font-bold text-green-600 mb-4">Tentang Kami</h1>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Donasiku adalah platform jembatan kebaikan yang menghubungkan para donatur dengan mereka yang membutuhkan bantuan melalui sistem yang transparan dan aman.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-5xl mx-auto">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <h2 class="text-2xl font-bold text-green-600 mb-4">Visi</h2>
            <p class="text-gray-600 leading-relaxed">
                Menjadi platform donasi digital paling terpercaya di Indonesia yang mampu memberikan dampak nyata bagi kesejahteraan sosial dan kemanusiaan.
            </p>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
            <h2 class="text-2xl font-bold text-green-600 mb-4">Misi</h2>
            <ul class="list-disc list-inside text-gray-600 space-y-2">
                <li>Menyediakan sistem donasi yang mudah dan cepat.</li>
                <li>Menjamin 100% transparansi penyaluran dana.</li>
                <li>Menginspirasi lebih banyak orang untuk berbagi setiap hari.</li>
            </ul>
        </div>
    </div>
</div>
@endsection