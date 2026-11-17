@extends('layouts.app')

@section('content')
<div class="bg-slate-50 min-h-screen py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-sm border border-slate-200/80 p-6 sm:p-8">
        
        <div class="mb-6 pb-4 border-b border-slate-100">
            <h1 class="text-2xl font-bold text-slate-900">Tambah Surat Keluar</h1>
            <p class="text-sm text-slate-500 mt-1">Isi formulir di bawah ini untuk mencatat arsip surat keluar baru</p>
        </div>

        <!-- Menampilkan Pesan Error Validasi -->
        @if ($errors->any())
            <div class="mb-6 p-4 bg-rose-50 border border-rose-200 rounded-xl text-rose-600 text-sm">
                <p class="font-semibold mb-1">Terjadi kesalahan pengisian:</p>
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('surat-keluar.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">Nomor Surat</label>
                <input type="text" name="nomor_surat" value="{{ old('nomor_surat') }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition" placeholder="Contoh: 001/SK/2026">
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">Tanggal Surat</label>
                <input type="date" name="tanggal" value="{{ old('tanggal') }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition">
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">Pengirim / Tujuan</label>
                <!-- Diubah menjadi name="pengirim" agar sesuai dengan validasi controller Anda -->
                <input type="text" name="pengirim" value="{{ old('pengirim') }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition" placeholder="Contoh: PT Satelit Global Media">
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">Perihal</label>
                <input type="text" name="perihal" value="{{ old('perihal') }}" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition" placeholder="Contoh: Permohonan Proposal">
            </div>

            <div>
                <label class="block text-xs font-semibold uppercase tracking-wider text-slate-600 mb-1.5">Keterangan</label>
                <textarea name="keterangan" rows="4" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:bg-white transition" placeholder="Keterangan tambahan (opsional)">{{ old('keterangan') }}</textarea>
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-slate-100">
                <button type="submit" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl text-sm shadow-lg shadow-blue-500/25 transition">Simpan Surat</button>
                <a href="{{ route('surat-keluar.index') }}" class="px-6 py-3 bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold rounded-xl text-sm transition">Batal</a>
            </div>
        </form>

    </div>
</div>
@endsection