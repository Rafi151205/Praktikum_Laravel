@extends('layouts.app')

@section('content')
<div class="bg-slate-50 min-h-screen py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-sm border border-slate-200/80 p-6 sm:p-8">
        
        <div class="mb-6 pb-4 border-b border-slate-100 flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Detail Surat Masuk</h1>
                <p class="text-sm text-slate-500 mt-1">Informasi lengkap arsip surat</p>
            </div>
            <span class="bg-emerald-50 text-emerald-600 font-semibold px-3 py-1 rounded-full text-xs">Arsip Masuk</span>
        </div>

        <div class="space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-4 bg-slate-50 rounded-xl">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Nomor Surat</span>
                <span class="sm:col-span-2 font-semibold text-slate-800">{{ $surat->nomor_surat }}</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-4 bg-slate-50 rounded-xl">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Tanggal Surat</span>
                <span class="sm:col-span-2 text-slate-800">{{ $surat->tanggal }}</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-4 bg-slate-50 rounded-xl">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Pengirim</span>
                <span class="sm:col-span-2 text-slate-800">{{ $surat->pengirim }}</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-4 bg-slate-50 rounded-xl">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Perihal</span>
                <span class="sm:col-span-2 text-slate-800">{{ $surat->perihal }}</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-4 bg-slate-50 rounded-xl">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Keterangan</span>
                <span class="sm:col-span-2 text-slate-800">{{ $surat->keterangan ?? '-' }}</span>
            </div>
        </div>

        <div class="mt-8 pt-4 border-t border-slate-100 flex items-center gap-4">
            <a href="{{ route('surat-masuk.index') }}" class="px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-sm transition">← Kembali ke Daftar Surat</a>
        </div>

    </div>
</div>
@endsection