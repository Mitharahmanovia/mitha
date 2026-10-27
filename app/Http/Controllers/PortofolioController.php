<?php
namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class PortofolioController extends Controller
{
    public function index()
{
    $portofolios = Portofolio::latest()->get();

    return view('portfolio.index', compact('portofolios'));
}

    public function create()
    {
        return view('portfolio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required|max:100',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only('judul', 'kategori', 'deskripsi');
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('portofolio', 'public');
        }

        Portofolio::create($data);

        return redirect()->route('portofolio.index')
            ->with('success', 'Portofolio berhasil ditambahkan.');
    }

    public function show(Portofolio $portofolio)
    {
        abort(404);
    }

    public function edit(Portofolio $portofolio)
{
    return view('portfolio.edit', compact('portofolio'));
}

    public function update(Request $request, Portofolio $portofolio)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'kategori' => 'required|max:100',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only('judul', 'kategori', 'deskripsi');
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('gambar')) {
            if ($portofolio->gambar) {
                Storage::disk('public')->delete($portofolio->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('portofolio', 'public');
        }

        $portofolio->update($data);

        return redirect()->route('portofolio.index')
            ->with('success', 'Portofolio berhasil diperbarui.');
    }

    public function destroy(Portofolio $portofolio)
    {
        if ($portofolio->gambar) {
            Storage::disk('public')->delete($portofolio->gambar);
        }

        $portofolio->delete();

        return redirect()->route('portofolio.index')
            ->with('success', 'Portofolio berhasil dihapus.');
    }

    public function toggle(Portofolio $portofolio)
    {
        $portofolio->update([
            'is_active' => !$portofolio->is_active,
        ]);

        return redirect()->route('portofolio.index')
            ->with('success', 'Status tampilan portofolio berhasil diubah.');
    }

    public function publicPage()
    {
        $portofolios = Portofolio::where('is_active', true)
            ->latest()
            ->get();

        return view('portfolio.public', compact('portofolios'));
    }
}
