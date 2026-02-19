<?php

namespace App\Http\Controllers\Actividad;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    private function user() { return Auth::guard('actividad')->user(); }

    public function edit()
    {
        $user = $this->user();
        return view('actividad.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = $this->user();
        $data = $request->validate([
            'nombre'           => ['required', 'string', 'max:255'],
            'email'            => ['required', 'email', Rule::unique('actividades')->ignore($user->id)],
            'telefono'         => ['nullable', 'string', 'max:50'],
            'direccion'        => ['nullable', 'string', 'max:255'],
            'descripcion'      => ['nullable', 'string'],
            'numero_estrellas' => ['nullable', 'integer', 'min:1', 'max:5'],
            'tipo_actividad'       => ['nullable', 'string'],
            'sitio_web'        => ['nullable', 'url', 'max:255'],
            'check_in_hora'    => ['nullable', 'string'],
            'check_out_hora'   => ['nullable', 'string'],
            'numero_habitaciones' => ['nullable', 'integer', 'min:0'],
            'precio_desde'     => ['nullable', 'numeric', 'min:0'],
            'tiene_piscina'    => ['boolean'],
            'tiene_spa'        => ['boolean'],
            'tiene_restaurante'=> ['boolean'],
            'tiene_wifi'       => ['boolean'],
            'tiene_gym'        => ['boolean'],
            'latitud'          => ['nullable', 'numeric'],
            'longitud'         => ['nullable', 'numeric'],
        ]);

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) Storage::disk('public')->delete($user->profile_photo);
            $data['profile_photo'] = $request->file('profile_photo')->store('actividad/profile', 'public');
        }
        $user->update($data);
        return back()->with('success', 'Perfil actualizado.');
    }

    public function editPassword()
    {
        return view('actividad.profile.password');
    }

    public function updatePassword(Request $request)
    {
        $user = $this->user();
        $request->validate([
            'current_password' => ['required', 'current_password:actividad'],
            'password'         => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user->update(['password' => Hash::make($request->password)]);
        return back()->with('success', 'Contraseña actualizada.');
    }

    public function gallery()
    {
        $user = $this->user();
        $photos = $user->photos;
        return view('actividad.profile.gallery', compact('user', 'photos'));
    }

    public function uploadPhoto(Request $request)
    {
        $user = $this->user();
        $request->validate(['photo' => ['required', 'image', 'max:4096'], 'alt_text' => ['nullable', 'string', 'max:255']]);
        $path = $request->file('photo')->store('actividad/gallery', 'public');
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
