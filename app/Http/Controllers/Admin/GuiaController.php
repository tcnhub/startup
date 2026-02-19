<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class GuiaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $perPage = (int) $request->input('per_page', 15);

        $records = Guia::withTrashed()
            ->when($search, fn($q) => $q->where('nombre', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%"))
            ->latest()
            ->paginate($perPage)
            ->withQueryString();

        return view('admin.guias.index', compact('records', 'search', 'perPage'));
    }

    public function create()
    {
        return view('admin.guias.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:guias,email'],
            'telefono' => ['nullable', 'string', 'max:50'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data['password'] = Hash::make($data['password']);

        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('guia/profile', 'public');
        }

        Guia::create($data);
        return redirect()->route('admin.guias.index')
            ->with('success', 'Guia creado correctamente.');
    }

    public function show(Guia $guia)
    {
        $guia->load('photos');
        return view('admin.guias.show', ['record' => $guia]);
    }

    public function edit(Guia $guia)
    {
        return view('admin.guias.edit', ['record' => $guia]);
    }

    public function update(Request $request, Guia $guia)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', Rule::unique('guias')->ignore($guia->id)],
            'telefono' => ['nullable', 'string', 'max:50'],
        ]);

        if ($request->hasFile('profile_photo')) {
            if ($guia->profile_photo) Storage::disk('public')->delete($guia->profile_photo);
            $data['profile_photo'] = $request->file('profile_photo')->store('guia/profile', 'public');
        }

        $guia->update($data);
        return redirect()->route('admin.guias.index')
            ->with('success', 'Guia actualizado correctamente.');
    }

    public function destroy(Guia $guia)
    {
        $guia->delete();
        return redirect()->route('admin.guias.index')
            ->with('success', 'Guia eliminado.');
    }

    public function restore($id)
    {
        Guia::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.guias.index')
            ->with('success', 'Guia restaurado.');
    }
}
