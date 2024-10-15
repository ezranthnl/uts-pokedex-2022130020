<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;


class PokemonController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); // Semua metode di controller ini memerlukan autentikasi
    }

    public function index()
    {
        $pokemons = Pokemon::paginate(20);
        return view('pokemons.index', compact('pokemons'));
    }

    public function create()
    {
        return view('pokemons.create');
    }

    public function store(Request $request)
    {
        $request->validate([


            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|in:Grass,Fire,Water,Bug,Normal,Poison,Electric,Ground,Fairy,Fighting,Psychic,Rock,Ghost,Ice,Dragon,Dark,Steel,Flying',
            'weight' => 'nullable|numeric|max:99999999.99',
            'height' => 'nullable|numeric|max:99999999.99',
            'hp' => 'nullable|integer|max:9999',
            'attack' => 'nullable|integer|max:9999',
            'defense' => 'nullable|integer|max:9999',
            'is_legendary' => 'sometimes|boolean',
            'photo' => 'nullable|image|max:2048|mimes:jpeg,jpg,png,gif,svg',

        ]);

        $pokemon = Pokemon::create($request->all());

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->hashName();
            $filePath = $file->storeAs('public', $fileName);
            $pokemon->update([
                'photo' => $filePath
            ]);

        }

        return redirect()->route('pokemon.index');
    }

    public function show(Pokemon $pokemon)
    {
        return view('pokemons.show', compact('pokemon'));
    }

    public function edit(Pokemon $pokemon)
    {
        return view('pokemons.edit', compact('pokemon'));
    }


    public function update(Request $request, Pokemon $pokemon)
    {
        $request->validate([

            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|in:Grass,Fire,Water,Bug,Normal,Poison,Electric,Ground,Fairy,Fighting,Psychic,Rock,Ghost,Ice,Dragon,Dark,Steel,Flying',
            'weight' => 'required|numeric|min:1|max:9999999|lte:weight',
            'height' => 'required|numeric|min:1|max:9999999|lte:height',
            'hp' => 'required|integer|min:1',
            'attack' => 'required|integer|min:1',
            'defense' => 'required|integer|min:1',
            'is_legendary' => 'required|boolean',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pokemon = Pokemon::where('id', $pokemon->id);
        $pokemon->update($request->except(['_token', '_method']));

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->hashName();
            $filePath = $file->storeAs('public', $fileName);
            $pokemon->update([
                'photo' => $filePath
            ]);
        }

        return redirect()->route('pokemon.index');
    }

    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();
        return redirect()->route('pokemon.index');
    }
}
