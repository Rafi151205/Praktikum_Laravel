<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\OutcomingLetters;
use App\Models\Category;

class SuratKeluarController extends Controller
{
    // Menampilkan daftar surat keluar
    public function index(Request $request)
    {
        $query = OutcomingLetters::with('category');

        // Pencarian surat
        if ($request->filled('q')) {
            $search = $request->q;

            $query->where(function ($q) use ($search) {
                $q->where('nomor_surat', 'like', "%{$search}%")
                  ->orWhere('pengirim', 'like', "%{$search}%")
                  ->orWhere('perihal', 'like', "%{$search}%");
            });
        }

        // Filter kategori
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $suratKeluar = $query->latest('id')
            ->paginate(5)
            ->withQueryString();

        $categories = Category::all();

        return view('surat-keluar.index', compact(
            'suratKeluar',
            'categories'
        ));
    }

    // Form tambah surat
    public function create()
    {
        $categories = Category::all();

        return view('surat-keluar.create', compact('categories'));
    }

    // Menyimpan surat baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')
                ->store('lampiran-surat-keluar', 'public');
        }

        OutcomingLetters::create($validated);

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil ditambahkan.');
    }

    // Detail surat
    public function show($id)
    {
        $surat = OutcomingLetters::with('category')->findOrFail($id);

        return view('surat-keluar.show', compact('surat'));
    }

    // Form edit surat
    public function edit($id)
    {
        $surat = OutcomingLetters::findOrFail($id);
        $categories = Category::all();

        return view('surat-keluar.edit', compact(
            'surat',
            'categories'
        ));
    }

    // Memperbarui surat
    public function update(Request $request, $id)
    {
        $surat = OutcomingLetters::findOrFail($id);

        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'pengirim' => 'required|string|max:255',
            'perihal' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'lampiran' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('lampiran')) {
            $fileLama = $surat->lampiran;

            $validated['lampiran'] = $request->file('lampiran')
                ->store('lampiran-surat-keluar', 'public');

            $surat->update($validated);

            if ($fileLama) {
                Storage::disk('public')->delete($fileLama);
            }
        } else {
            unset($validated['lampiran']);
            $surat->update($validated);
        }

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil diperbarui.');
    }

    // Menghapus surat
    public function destroy($id)
    {
        $surat = OutcomingLetters::findOrFail($id);

        if ($surat->lampiran) {
            Storage::disk('public')->delete($surat->lampiran);
        }

        $surat->delete();

        return redirect()->route('surat-keluar.index')
            ->with('success', 'Surat keluar berhasil dihapus.');
    }
}