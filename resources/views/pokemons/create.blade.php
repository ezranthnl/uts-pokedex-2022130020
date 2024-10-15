@extends('layouts.app')

@section('content')
    <div class="container">
        <a class="btn btn-primary" href="http://127.0.0.1:8000/">Back</a>
        <main>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pokemon.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            id="name" value="{{ old('name') }}">
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="species">Species</label>
                        <textarea class="form-control @error('species') is-invalid @enderror" name="species" id="species" rows="3">{{ old('species') }}</textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="primary_type">Primary Type</label>
                        <select class="form-control @error('primary_type') is-invalid @enderror" name="primary_type"
                            id="primary_type">
                            <option value="">Pilih Tipe</option>
                            <option value="Grass" {{ old('primary_type') == 'Grass' ? 'selected' : '' }}>Grass</option>
                            <option value="Fire" {{ old('primary_type') == 'Fire' ? 'selected' : '' }}>Fire</option>
                            <option value="Water" {{ old('primary_type') == 'Water' ? 'selected' : '' }}>Water</option>
                            <option value="Bug" {{ old('primary_type') == 'Bug' ? 'selected' : '' }}>Bug</option>
                            <option value="Normal" {{ old('primary_type') == 'Normal' ? 'selected' : '' }}>Normal</option>
                            <option value="Poison" {{ old('primary_type') == 'Poison' ? 'selected' : '' }}>Poison</option>
                            <option value="Electric" {{ old('primary_type') == 'Electric' ? 'selected' : '' }}>Electric
                            </option>
                            <option value="Ground" {{ old('primary_type') == 'Ground' ? 'selected' : '' }}>Ground</option>
                            <option value="Fairy" {{ old('primary_type') == 'Fairy' ? 'selected' : '' }}>Fairy</option>
                            <option value="Fighting" {{ old('primary_type') == 'Fighting' ? 'selected' : '' }}>Fighting
                            </option>
                            <option value="Psychic" {{ old('primary_type') == 'Psychic' ? 'selected' : '' }}>Psychic
                            </option>
                            <option value="Rock" {{ old('primary_type') == 'Rock' ? 'selected' : '' }}>Rock</option>
                            <option value="Ghost" {{ old('primary_type') == 'Ghost' ? 'selected' : '' }}>Ghost</option>
                            <option value="Ice" {{ old('primary_type') == 'Ice' ? 'selected' : '' }}>Ice</option>
                            <option value="Dragon" {{ old('primary_type') == 'Dragon' ? 'selected' : '' }}>Dragon</option>
                            <option value="Dark" {{ old('primary_type') == 'Dark' ? 'selected' : '' }}>Dark</option>
                            <option value="Steel" {{ old('primary_type') == 'Steel' ? 'selected' : '' }}>Steel</option>
                            <option value="Flying" {{ old('primary_type') == 'Flying' ? 'selected' : '' }}>Flying</option>
                        </select>

                    </div>
                    <div class="col-6">
                        <label class="form-label" for="weight">Weight</label>
                        <input class="form-control @error('weight') is-invalid @enderror" type="number" name="weight"
                            id="weight" value="{{ old('weight') }}">
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="height">Height</label>
                        <input class="form-control @error('height') is-invalid @enderror" type="number" name="height"
                            id="height" value="{{ old('height') }}">
                    </div>

                    <div class="col-6">
                        <label class="form-label" for="hp">Hp </label>
                        <input class="form-control @error('hp') is-invalid @enderror" type="number" name="hp"
                            id="hp" value="{{ old('hp') }}">
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="attack">Attack</label>
                        <input class="form-control @error('attack') is-invalid @enderror" type="number" name="attack"
                            id="attack" value="{{ old('attack') }}">
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="defense">Defense</label>
                        <input class="form-control @error('defense') is-invalid @enderror" type="number" name="defense"
                            id="defense" value="{{ old('defense') }}">
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="is_legendary">Is Legendary?</label>
                        <input class="form-check-input @error('is_legendary') is-invalid @enderror" type="checkbox"
                            name="is_legendary" id="is_legendary" value="1">

                    </div>
                    <div class="col-6">
                        <label class="form-label" for="photo">Photo</label>
                        <input class="form-control @error('photo') is-invalid @enderror" type="file" name="photo"
                            id="photo">
                    </div>


                    <button class="btn btn-primary mt-3" type="submit">Add</button>
                </div>
            </form>
        </main>
    </div>
@endsection
