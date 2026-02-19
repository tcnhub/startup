<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ActividadController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $perPage = (int) $request->input('per_page', 15);

        $records = Actividad::withTrashed()
            ->when($search, fn($q) => $q->where('nombre', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%"))
            ->latest()
            ->paginate($perPage)
            ->withQueryString();

        return view('admin.actividads.index', compact('records', 'search', 'perPage'));
    }

    public function create()
    {
        return view('admin.actividads.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:actividades,email'],
            'telefono' => ['nullable', 'string', 'max:50'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data['password'] = Hash::make($data['password']);

        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('actividad/profile', 'public');
        }

        Actividad::create($data);
        return redirect()->route('admin.actividads.index')
            ->with('success', 'Actividad creado correctamente.');
    }

    public function show(Actividad $actividad)
    {
        $actividad->load('photos');
        return view('admin.actividads.show', ['record' => $actividad]);
    }

    public function edit(Actividad $actividad)
    {
        return view('admin.actividads.edit', ['record' => $actividad]);
    }

    public function update(Request $request, Actividad $actividad)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', Rule::unique('actividades')->ignore($actividad->id)],
            'telefono' => ['nullable', 'string', 'max:50'],
        ]);

        if ($request->hasFile('profile_photo')) {
            if ($actividad->profile_photo) Storage::disk('public')->delete($actividad->profile_photo);
            $data['profile_photo'] = $request->file('profile_photo')->store('actividad/profile', 'public');
        }

        $actividad->update($data);
        return redirect()->route('admin.actividads.index')
            ->with('success', 'Actividad actualizado correctamente.');
    }

    public function destroy(Actividad $actividad)
    {
        $actividad->delete();
        return redirect()->route('admin.actividads.index')
            ->with('success', 'Actividad eliminado.');
    }

    public function restore($id)
    {
        Actividad::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.actividads.index')
            ->with('success', 'Actividad restaurado.');
    }
}
