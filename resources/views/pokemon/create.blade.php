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
                        <textarea class="form-control @error('species') is-invalid @enderror" name="species" id="species"
                            rows="3">{{ old('species') }}</textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="primary_type">Primary Type</label>
                        <textarea class="form-control @error('primary_type') is-invalid @enderror" name="primary_type" id="primary_type"
                            rows="3">{{ old('primary_type') }}</textarea>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="weight">Weight</label>
                        <input class="form-control @error('weight') is-invalid @enderror" type="number"
                            name="weight" id="weight" value="{{ old('weight') }}">
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="height">Height</label>
                        <input class="form-control @error('height') is-invalid @enderror" type="number"
                            name="height" id="height" value="{{ old('height') }}">
                    </div>
                    
                    <div class="col-6">
                        <label class="form-label" for="hp">Hp </label>
                        <input class="form-control @error('hp') is-invalid @enderror" type="number"
                            name="hp" id="hp" value="{{ old('hp') }}">
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
