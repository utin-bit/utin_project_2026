@extends('app')

@section('title', 'Dokumentasi')

@section('content')
@php
    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
@endphp

<div class="mx-auto max-w-6xl space-y-8">
    <section class="rounded-lg bg-white shadow-sm">
        <div class="grid gap-0 overflow-hidden rounded-lg lg:grid-cols-[1fr_420px]">
            <div class="bg-emerald-700 p-8 text-white lg:p-10">
                <p class="text-sm font-semibold uppercase tracking-wide text-emerald-100">Dokumentasi</p>
                <h1 class="mt-3 text-3xl font-bold leading-tight md:text-4xl">Upload gambar dan dokumen kegiatan.</h1>
                <p class="mt-4 max-w-2xl text-sm leading-6 text-emerald-50 md:text-base">
                    Gambar akan masuk ke folder <span class="font-semibold">image</span>. File PDF, Word, Excel,
                    PowerPoint, TXT, dan CSV akan masuk ke folder <span class="font-semibold">document</span>.
                </p>
            </div>

            <div class="p-6 lg:p-8">
                <h2 class="text-xl font-semibold text-gray-900">Kirim File</h2>
                <p class="mt-1 text-sm text-gray-500">Ukuran maksimal 5MB.</p>

                @if (session('success'))
                    <div class="mt-5 rounded-md border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mt-5 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                        <p class="font-semibold">File belum berhasil dikirim.</p>
                        <ul class="mt-2 list-disc space-y-1 pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('documentation.store') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-5">
                    @csrf

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Nama Dokumen/Gambar</label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            value="{{ old('title') }}"
                            class="mt-2 block w-full rounded-md border border-gray-300 px-3 py-2 text-sm text-gray-900 shadow-sm outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-100"
                            placeholder="Contoh: Laporan kegiatan"
                            required
                        >
                    </div>

                    <div>
                        <label for="attachment" class="block text-sm font-medium text-gray-700">Pilih File</label>
                        <input
                            type="file"
                            name="attachment"
                            id="attachment"
                            accept=".jpg,.jpeg,.png,.gif,.webp,.pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.csv"
                            class="mt-2 block w-full rounded-md border border-dashed border-gray-300 bg-gray-50 p-3 text-sm text-gray-600 file:mr-4 file:rounded-md file:border-0 file:bg-emerald-600 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-emerald-700"
                            required
                        >
                        <p class="mt-2 text-xs text-gray-500">Format: JPG, PNG, WEBP, PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX, TXT, CSV.</p>
                    </div>

                    <button type="submit" class="w-full rounded-md bg-emerald-600 px-4 py-3 text-sm font-semibold text-white shadow-sm hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-300">
                        Simpan Dokumentasi
                    </button>
                </form>
            </div>
        </div>
    </section>

    <section>
        <div class="mb-4">
            <h2 class="text-2xl font-semibold text-gray-900">File Tersimpan</h2>
            <p class="mt-1 text-sm text-gray-500">File terbaru tampil paling atas.</p>
        </div>

        @if ($files->isEmpty())
            <div class="rounded-lg border border-dashed border-gray-300 bg-white p-8 text-center">
                <p class="text-sm font-medium text-gray-700">Belum ada file dokumentasi.</p>
                <p class="mt-1 text-sm text-gray-500">Kirim file pertama dari form di atas.</p>
            </div>
        @else
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($files as $file)
                    @php
                        $extension = strtolower($file->file_type);
                        $isImage = in_array($extension, $imageExtensions);
                    @endphp

                    <article class="flex flex-col justify-between overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
                        
                        <div class="h-52 w-full bg-slate-100 overflow-hidden relative">
                            @if ($isImage)
                                <img
                                    src="{{ asset('storage/' . $file->file_path) }}"
                                    alt="{{ $file->title }}"
                                    class="h-full w-full object-cover transition-transform duration-200 hover:scale-105"
                                >
                            @elseif ($extension === 'pdf')
                                <embed 
                                    src="{{ asset('storage/' . $file->file_path) }}#toolbar=0&navpanes=0&scrollbar=0" 
                                    type="application/pdf" 
                                    class="w-full h-full"
                                />
                            @else
                                <div class="flex h-full items-center justify-center p-4">
                                    <div class="rounded-md border border-slate-200 bg-white px-5 py-4 text-center shadow-sm">
                                        <p class="text-3xl font-bold uppercase text-emerald-600">{{ $extension }}</p>
                                        <p class="mt-1 text-xs font-semibold uppercase tracking-wide text-slate-400">Unduh Dokumen</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="flex-1 space-y-4 p-5">
                            <div class="h-24 overflow-hidden">
                                <h3 class="text-base font-semibold text-gray-900 line-clamp-1">{{ $file->title }}</h3>
                                <p class="mt-1 text-xs text-gray-500">
                                    {{ strtoupper($extension) }} — {{ $file->created_at->format('d M Y H:i') }}
                                </p>
                                <p class="mt-2 text-xs text-gray-400 break-all line-clamp-2">
                                    Path: <span class="text-slate-600 font-mono text-[11px]">{{ $file->file_path }}</span>
                                </p>
                            </div>

                            <a
                                href="{{ asset('storage/' . $file->file_path) }}"
                                target="_blank"
                                class="inline-flex w-full items-center justify-center rounded-md border border-emerald-600 px-4 py-2 text-sm font-semibold text-emerald-700 hover:bg-emerald-50 transition-colors"
                            >
                                Buka / Download File
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </section>
</div>
@endsection