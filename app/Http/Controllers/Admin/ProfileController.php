<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Photo;

class ProfileController extends Controller
{
    private function user() { return Auth::guard('admin')->user(); }

    public function edit()
    {
        $user = $this->user();
        return view('admin.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = $this->user();
        $data = $request->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('admins')->ignore($user->id)],
        ]);
        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) Storage::disk('public')->delete($user->profile_photo);
            $data['profile_photo'] = $request->file('profile_photo')->store('admin/profile', 'public');
        }
        $user->update($data);
        return back()->with('success', 'Perfil actualizado.');
    }

    public function editPassword()
    {
        return view('admin.profile.password');
    }

    public function updatePassword(Request $request)
    {
        $user = $this->user();
        $request->validate([
            'current_password' => ['required', 'current_password:admin'],
            'password'         => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user->update(['password' => Hash::make($request->password)]);
        return back()->with('success', 'Contraseña actualizada.');
    }

    public function gallery()
    {
        $user = $this->user();
        $photos = $user->photos;
        return view('admin.profile.gallery', compact('user', 'photos'));
    }

    public function uploadPhoto(Request $request)
    {
        $user = $this->user();
        $request->validate(['photo' => ['required', 'image', 'max:4096'], 'alt_text' => ['nullable', 'string', 'max:255']]);
        $path = $request->file('photo')->store('admin/gallery', 'public');
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
