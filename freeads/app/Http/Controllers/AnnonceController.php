<?php

namespace App\Http\Controllers;

use App\Models\Annonce;


class AnnonceController extends Controller
{
    public function createAnnonce()
    {
        return view('createAnnonce');
    }

    public function store()
    {
        Annonce::create([
            'title' => request('title'),
            'description' => request('description'),
            'photo' => request('photo'),
            'price' => request('price')
        ]);
        return redirect('/createAnnonce');
    }
}
