<?php

namespace App\Http\Controllers\Guia;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    private function user() { return Auth::guard('guia')->user(); }

    public function edit()
    {
        $user = $this->user();
        return view('guia.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = $this->user();
        $data = $request->validate([
            'nombre'           => ['required', 'string', 'max:255'],
            'apellido'         => ['required', 'string', 'max:255'],
            'email'            => ['required', 'email', Rule::unique('guias')->ignore($user->id)],
            'telefono'         => ['nullable', 'string', 'max:50'],
            'descripcion'      => ['nullable', 'string'],
            'numero_licencia'  => ['nullable', 'string', 'max:100'],
            'experiencia_anios'=> ['nullable', 'integer', 'min:0', 'max:60'],
            'precio_por_dia'   => ['nullable', 'numeric', 'min:0'],
            'precio_por_hora'  => ['nullable', 'numeric', 'min:0'],
            'disponible'       => ['boolean'],
            'especialidades_raw' => ['nullable', 'string'],
            'idiomas_raw'      => ['nullable', 'string'],
        ]);

        // Convert comma-separated strings to arrays
        $data['especialidades'] = array_filter(array_map('trim', explode(',', $data['especialidades_raw'] ?? '')));
        $data['idiomas']        = array_filter(array_map('trim', explode(',', $data['idiomas_raw'] ?? '')));
        unset($data['especialidades_raw'], $data['idiomas_raw']);

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) Storage::disk('public')->delete($user->profile_photo);
            $data['profile_photo'] = $request->file('profile_photo')->store('guia/profile', 'public');
        }
        $user->update($data);
        return back()->with('success', 'Perfil actualizado.');
    }

    public function editPassword()
    {
        return view('guia.profile.password');
    }

    public function updatePassword(Request $request)
    {
        $user = $this->user();
        $request->validate([
            'current_password' => ['required', 'current_password:guia'],
            'password'         => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user->update(['password' => Hash::make($request->password)]);
        return back()->with('success', 'Contraseña actualizada.');
    }

    public function gallery()
    {
        $user = $this->user();
        $photos = $user->photos;
        return view('guia.profile.gallery', compact('user', 'photos'));
    }

    public function uploadPhoto(Request $request)
    {
        $user = $this->user();
        $request->validate(['photo' => ['required', 'image', 'max:4096'], 'alt_text' => ['nullable', 'string', 'max:255']]);
        $path = $request->file('photo')->store('guia/gallery', 'public');
        $user->photos()->create(['path' => $path, 'alt_text' => $request->input('alt_text', ''), 'order' => $user->photos()->count()]);
        return back()->with('success', 'Foto agregada.');
    }

    public function deletePhoto(Photo $photo)
    {
        $user = $this->user();
        if ($photo->photoable_id !== $user->id || $photo->photoable_type !== get_class($user)) abort(403);
        Storage::disk('public')->delete($photo->path);
        $photo->delete();
        return back()->with('success', 'Foto eliminada.');
    }
}
