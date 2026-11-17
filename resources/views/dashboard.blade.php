@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="bg-slate-50 min-h-[calc(100vh-4rem)] py-10 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto space-y-6">
        
        <!-- Banner Sambutan Utama -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-8 sm:p-10 text-white shadow-xl">
            <div class="max-w-2xl">
                <span class="inline-block px-3 py-1 bg-white/15 backdrop-blur-sm rounded-full text-xs font-semibold tracking-wider uppercase mb-4">
                    Sistem Informasi Arsip
                </span>
                <h1 class="text-2xl sm:text-4xl font-extrabold tracking-tight leading-tight">
                    Selamat Datang di Sistem Informasi Surat 👋
                </h1>
                <p class="mt-3 text-blue-100 text-sm sm:text-base leading-relaxed">
                    Kelola pengarsipan surat masuk dan surat keluar instansi secara digital, terstruktur, dan mudah diakses kapan saja.
                </p>
                
                <!-- Tombol Akses Cepat -->
                <div class="mt-8 flex flex-wrap items-center gap-3">
                    <a href="{{ route('surat-masuk.index') }}" class="px-5 py-2.5 bg-white text-blue-600 hover:bg-blue-50 font-semibold rounded-xl text-sm shadow-sm transition duration-200">
                        Kelola Surat Masuk →
                    </a>
                    <a href="{{ route('surat-keluar.index') }}" class="px-5 py-2.5 bg-blue-500/80 hover:bg-blue-500 text-white border border-blue-400/30 font-semibold rounded-xl text-sm transition duration-200">
                        Kelola Surat Keluar →
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection