<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class RestauranteController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $perPage = (int) $request->input('per_page', 15);

        $records = Restaurante::withTrashed()
            ->when($search, fn($q) => $q->where('nombre', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%"))
            ->latest()
            ->paginate($perPage)
            ->withQueryString();

        return view('admin.restaurantes.index', compact('records', 'search', 'perPage'));
    }

    public function create()
    {
        return view('admin.restaurantes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:restaurantes,email'],
            'telefono' => ['nullable', 'string', 'max:50'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data['password'] = Hash::make($data['password']);

        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('restaurante/profile', 'public');
        }

        Restaurante::create($data);
        return redirect()->route('admin.restaurantes.index')
            ->with('success', 'Restaurante creado correctamente.');
    }

    public function show(Restaurante $restaurante)
    {
        $restaurante->load('photos');
        return view('admin.restaurantes.show', ['record' => $restaurante]);
    }

    public function edit(Restaurante $restaurante)
    {
        return view('admin.restaurantes.edit', ['record' => $restaurante]);
    }

    public function update(Request $request, Restaurante $restaurante)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', Rule::unique('restaurantes')->ignore($restaurante->id)],
            'telefono' => ['nullable', 'string', 'max:50'],
        ]);

        if ($request->hasFile('profile_photo')) {
            if ($restaurante->profile_photo) Storage::disk('public')->delete($restaurante->profile_photo);
            $data['profile_photo'] = $request->file('profile_photo')->store('restaurante/profile', 'public');
        }

        $restaurante->update($data);
        return redirect()->route('admin.restaurantes.index')
            ->with('success', 'Restaurante actualizado correctamente.');
    }

    public function destroy(Restaurante $restaurante)
    {
        $restaurante->delete();
        return redirect()->route('admin.restaurantes.index')
            ->with('success', 'Restaurante eliminado.');
    }

    public function restore($id)
    {
        Restaurante::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.restaurantes.index')
            ->with('success', 'Restaurante restaurado.');
    }
}
