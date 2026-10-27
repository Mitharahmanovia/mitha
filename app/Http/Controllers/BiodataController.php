<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BiodataController extends Controller
{
    public function index()
    {
        $biodata = Biodata::all();

        return view('admin.biodata.index', compact('biodata'));
    }

    public function create()
    {
        return view('admin.biodata.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|string|max:30|unique:Biodata_1115,nim',
            'nama' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'email' => 'required|email|max:150|unique:Biodata_1115,email',
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:500',
        ]);

        Biodata::create($validated);

        return redirect()->route('biodata.index')
            ->with('success', 'Data biodata berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $biodata = Biodata::findOrFail($id);

        return view('admin.biodata.edit', compact('biodata'));
    }

    public function update(Request $request, string $id)
    {
        $biodata = Biodata::findOrFail($id);

        $validated = $request->validate([
            'nim' => [
                'required', 'string', 'max:30',
                Rule::unique('Biodata_1115', 'nim')->ignore($biodata->id),
            ],
            'nama' => 'required|string|max:100',
            'prodi' => 'required|string|max:100',
            'email' => [
                'required', 'email', 'max:150',
                Rule::unique('Biodata_1115', 'email')->ignore($biodata->id),
            ],
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:500',
        ]);

        $biodata->update($validated);

        return redirect()->route('biodata.index')
            ->with('success', 'Data biodata berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $biodata = Biodata::findOrFail($id);
        $biodata->delete();

        return redirect()->route('biodata.index')
            ->with('success', 'Data biodata berhasil dihapus.');
    }
}
