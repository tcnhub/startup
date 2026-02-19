<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transportista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class TransportistaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $perPage = (int) $request->input('per_page', 15);

        $records = Transportista::withTrashed()
            ->when($search, fn($q) => $q->where('nombre', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%"))
            ->latest()
            ->paginate($perPage)
            ->withQueryString();

        return view('admin.transportistas.index', compact('records', 'search', 'perPage'));
    }

    public function create()
    {
        return view('admin.transportistas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:transportistas,email'],
            'telefono' => ['nullable', 'string', 'max:50'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data['password'] = Hash::make($data['password']);

        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('transportista/profile', 'public');
        }

        Transportista::create($data);
        return redirect()->route('admin.transportistas.index')
            ->with('success', 'Transportista creado correctamente.');
    }

    public function show(Transportista $transportista)
    {
        $transportista->load('photos');
        return view('admin.transportistas.show', ['record' => $transportista]);
    }

    public function edit(Transportista $transportista)
    {
        return view('admin.transportistas.edit', ['record' => $transportista]);
    }

    public function update(Request $request, Transportista $transportista)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', Rule::unique('transportistas')->ignore($transportista->id)],
            'telefono' => ['nullable', 'string', 'max:50'],
        ]);

        if ($request->hasFile('profile_photo')) {
            if ($transportista->profile_photo) Storage::disk('public')->delete($transportista->profile_photo);
            $data['profile_photo'] = $request->file('profile_photo')->store('transportista/profile', 'public');
        }

        $transportista->update($data);
        return redirect()->route('admin.transportistas.index')
            ->with('success', 'Transportista actualizado correctamente.');
    }

    public function destroy(Transportista $transportista)
    {
        $transportista->delete();
        return redirect()->route('admin.transportistas.index')
            ->with('success', 'Transportista eliminado.');
    }

    public function restore($id)
    {
        Transportista::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.transportistas.index')
            ->with('success', 'Transportista restaurado.');
    }
}
