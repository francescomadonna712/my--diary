<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('auth.edit-profile'); // Vista per modificare il profilo
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'profile_image' => 'nullable|image|max:2048', // validazione per l'immagine
        ]);

        $user = Auth::user();
        $user->name = $request->name;

        if ($request->hasFile('profile_image')) {
            // caricare l'immagine e aggiornare il percorso nel database
        }

        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'Profilo aggiornato con successo!');
    }

    public function destroy()
    {
        $user = Auth::user();
        $user->delete(); // Questo eliminerà l'utente

        return redirect('/')->with('success', 'Profilo eliminato con successo!');
    }
}
