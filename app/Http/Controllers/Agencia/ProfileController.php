<?php

namespace App\Http\Controllers\Agencia;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    private function user() { return Auth::guard('agencia')->user(); }

    public function edit()
    {
        $user = $this->user();
        return view('agencia.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = $this->user();
        $data = $request->validate([
            'nombre'    => ['required', 'string', 'max:255'],
            'email'     => ['required', 'email', Rule::unique('agencias')->ignore($user->id)],
            'telefono'  => ['nullable', 'string', 'max:50'],
            'direccion' => ['nullable', 'string', 'max:255'],
        ]);
        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) Storage::disk('public')->delete($user->profile_photo);
            $data['profile_photo'] = $request->file('profile_photo')->store('agencia/profile', 'public');
        }
        $user->update($data);
        return back()->with('success', 'Perfil actualizado.');
    }

    public function editPassword()
    {
        return view('agencia.profile.password');
    }

    public function updatePassword(Request $request)
    {
        $user = $this->user();
        $request->validate([
            'current_password' => ['required', 'current_password:agencia'],
            'password'         => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user->update(['password' => Hash::make($request->password)]);
        return back()->with('success', 'Contraseña actualizada.');
    }

    public function gallery()
    {
        $user = $this->user();
        $photos = $user->photos;
        return view('agencia.profile.gallery', compact('user', 'photos'));
    }

    public function uploadPhoto(Request $request)
    {
        $user = $this->user();
        $request->validate(['photo' => ['required', 'image', 'max:4096'], 'alt_text' => ['nullable', 'string', 'max:255']]);
        $path = $request->file('photo')->store('agencia/gallery', 'public');
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
