<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $perPage = (int) $request->input('per_page', 15);

        $records = Hotel::withTrashed()
            ->when($search, fn($q) => $q->where('nombre', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%"))
            ->latest()
            ->paginate($perPage)
            ->withQueryString();

        return view('admin.hotels.index', compact('records', 'search', 'perPage'));
    }

    public function create()
    {
        return view('admin.hotels.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:hoteles,email'],
            'telefono' => ['nullable', 'string', 'max:50'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data['password'] = Hash::make($data['password']);

        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('hotel/profile', 'public');
        }

        Hotel::create($data);
        return redirect()->route('admin.hotels.index')
            ->with('success', 'Hotel creado correctamente.');
    }

    public function show(Hotel $hotel)
    {
        $hotel->load('photos');
        return view('admin.hotels.show', ['record' => $hotel]);
    }

    public function edit(Hotel $hotel)
    {
        return view('admin.hotels.edit', ['record' => $hotel]);
    }

    public function update(Request $request, Hotel $hotel)
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', Rule::unique('hoteles')->ignore($hotel->id)],
            'telefono' => ['nullable', 'string', 'max:50'],
        ]);

        if ($request->hasFile('profile_photo')) {
            if ($hotel->profile_photo) Storage::disk('public')->delete($hotel->profile_photo);
            $data['profile_photo'] = $request->file('profile_photo')->store('hotel/profile', 'public');
        }

        $hotel->update($data);
        return redirect()->route('admin.hotels.index')
            ->with('success', 'Hotel actualizado correctamente.');
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->route('admin.hotels.index')
            ->with('success', 'Hotel eliminado.');
    }

    public function restore($id)
    {
        Hotel::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.hotels.index')
            ->with('success', 'Hotel restaurado.');
    }
}
