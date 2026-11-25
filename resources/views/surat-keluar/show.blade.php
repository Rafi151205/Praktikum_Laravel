
@extends('layouts.app')

@section('title', 'Detail Surat Keluar')

@section('content')
<div class="bg-slate-50 min-h-screen py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-sm border border-slate-200/80 p-6 sm:p-8">

        <div class="mb-6 pb-4 border-b border-slate-100 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Detail Surat Keluar</h1>
                <p class="text-sm text-slate-500 mt-1">Informasi lengkap arsip surat keluar</p>
            </div>
            <span class="bg-blue-50 text-blue-600 font-semibold px-3 py-1 rounded-full text-xs">
                Arsip Keluar
            </span>
        </div>

        <div class="space-y-6">

            {{-- Nomor Surat --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-4 bg-slate-50 rounded-xl">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">
                    Nomor Surat
                </span>
                <span class="sm:col-span-2 font-semibold text-slate-800">
                    {{ $surat->nomor_surat }}
                </span>
            </div>

            {{-- Tanggal Surat --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-4 bg-slate-50 rounded-xl">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">
                    Tanggal Surat
                </span>
                <span class="sm:col-span-2 text-slate-800">
                    {{ $surat->tanggal ?? '-' }}
                </span>
            </div>

            {{-- Pengirim / Tujuan --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-4 bg-slate-50 rounded-xl">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">
                    Pengirim / Tujuan
                </span>
                <span class="sm:col-span-2 text-slate-800">
                    {{ $surat->pengirim ?? $surat->tujuan ?? '-' }}
                </span>
            </div>

            {{-- Perihal --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-4 bg-slate-50 rounded-xl">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">
                    Perihal
                </span>
                <span class="sm:col-span-2 text-slate-800">
                    {{ $surat->perihal }}
                </span>
            </div>

            {{-- Kategori --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-4 bg-slate-50 rounded-xl">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">
                    Kategori Surat
                </span>
                <span class="sm:col-span-2 text-slate-800">
                    {{ $surat->category?->nama ?? 'Tanpa kategori' }}
                </span>
            </div>

            {{-- Keterangan --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-4 bg-slate-50 rounded-xl">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">
                    Keterangan
                </span>
                <span class="sm:col-span-2 text-slate-800">
                    {{ $surat->keterangan ?? '-' }}
                </span>
            </div>

            {{-- Lampiran --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-4 bg-slate-50 rounded-xl">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">
                    Lampiran
                </span>

                <div class="sm:col-span-2">
                    @if($surat->lampiran)
                        <a
                            href="{{ asset('storage/' . $surat->lampiran) }}"
                            target="_blank"
                            class="text-blue-600 hover:underline font-medium text-sm"
                        >
                            Lihat / Unduh Lampiran
                        </a>
                    @else
                        <span class="text-slate-400 text-sm">
                            Tidak ada lampiran.
                        </span>
                    @endif
                </div>
            </div>

        </div>

        {{-- Tombol Kembali --}}
        <div class="mt-8 pt-4 border-t border-slate-100 flex items-center gap-4">
            <a
                href="{{ route('surat-keluar.index') }}"
                class="px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-sm transition"
            >
                ← Kembali ke Daftar Surat
            </a>
        </div>

    </div>
</div>
@endsection
