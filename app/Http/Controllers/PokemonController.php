<?php

namespace App\Http\Controllers;

use App\Models\pokemon;
use Illuminate\Http\Request;


class PokemonController extends Controller
{
    public function index()
    {
        $pokemon = pokemon::paginate();
        return view('pokemon.index', compact('pokemon'));
    }

    public function create()
    {
        return view('pokemon.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50',
            'weight' => 'required|numeric|min:1|max:9999999|lte:weight',
            'height' => 'required|numeric|min:1|max:9999999|lte:height',
            'hp' => 'required|integer|min:9999',
            'attack' => 'required|integer|min:9999',
            'defense' => 'required|integer|min:9999',
            'defense' => 'required|boolean|default:false',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pokemon = pokemon::create($request->all());

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

    public function show(pokemon $pokemon)
    {
        return view('pokemons.show', compact('pokemon'));
    }

    public function edit(pokemon $pokemon)
    {
        return view('pokemons.edit', compact('pokemon'));
    }

    public function update(Request $request, pokemon $pokemon)
    {
        $request->validate([

            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50',
            'weight' => 'required|numeric|min:1|max:9999999|lte:weight',
            'height' => 'required|numeric|min:1|max:9999999|lte:height',
            'hp' => 'required|integer|min:9999',
            'attack' => 'required|integer|min:9999',
            'defense' => 'required|integer|min:9999',
            'defense' => 'required|boolean|default:false',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pokemon = pokemon::where('id', $pokemon->id);
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

    public function destroy(pokemon $pokemon)
    {
        $pokemon->delete();
        return redirect()->route('pokemon.index');
    }
}
