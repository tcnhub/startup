<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Atraccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AtraccionController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $perPage = (int) $request->input('per_page', 15);

        $records = Atraccion::withTrashed()
            ->when($search, fn($q) => $q->where('nombre', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%"))
            ->latest()
            ->paginate($perPage)
            ->withQueryString();

        return view('admin.atraccions.index', compact('records', 'search', 'perPage'));
    }

    public function create()
    {
        return view('admin.atraccions.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:atracciones,email'],
            'telefono' => ['nullable', 'string', 'max:50'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data['password'] = Hash::make($data['password']);

        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('atraccion/profile', 'public');
        }

        Atraccion::create($data);
        return redirect()->route('admin.atraccions.index')
            ->with('success', 'Atraccion creado correctamente.');
    }

    public function show(Atraccion $atraccion)
    {
        $atraccion->load('photos');
        return view('admin.atraccions.show', ['record' => $atraccion]);
    }

    public function edit(Atraccion $atraccion)
    {
        return view('admin.atraccions.edit', ['record' => $atraccion]);
    }

    public function update(Request $request, Atraccion $atraccion)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', Rule::unique('atracciones')->ignore($atraccion->id)],
            'telefono' => ['nullable', 'string', 'max:50'],
        ]);

        if ($request->hasFile('profile_photo')) {
            if ($atraccion->profile_photo) Storage::disk('public')->delete($atraccion->profile_photo);
            $data['profile_photo'] = $request->file('profile_photo')->store('atraccion/profile', 'public');
        }

        $atraccion->update($data);
        return redirect()->route('admin.atraccions.index')
            ->with('success', 'Atraccion actualizado correctamente.');
    }

    public function destroy(Atraccion $atraccion)
    {
        $atraccion->delete();
        return redirect()->route('admin.atraccions.index')
            ->with('success', 'Atraccion eliminado.');
    }

    public function restore($id)
    {
        Atraccion::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.atraccions.index')
            ->with('success', 'Atraccion restaurado.');
    }
}
