<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function detail($id)
    {
        $title = "Profil";
        $title_content = "Profil Anda";
        $profil = User::with('genders')->get();
        $genders = Gender::all();
        $profil = User::find($id);

        return view('profil.profiluser', compact('title', 'title_content', 'profil', 'genders'));
    }

    public function edit($id)
    {
        $title = "Edit Profil";
        $title_content = "Edit Profil";
        $profil = User::find($id);
        return view('profil.edituser', compact('title', 'profil', 'title_content'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name'          => 'required',
            'email'         => 'required',
            'address'       => 'required',
            'phone'         => 'required|numeric',
            'photo'         => 'image|max:2048',
        ]);
        // dd($validateData);
        if ($request->file('photo')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['photo'] = $request->file('photo')->store('user-image');
        }
        User::where('id', $id)->update($validateData);
        return redirect('profil.detail')->with('success', 'Profil telah berhasil diedit!');
    }
}
