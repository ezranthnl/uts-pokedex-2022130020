@extends('layouts.app')

@section('content')
    <div class="container">
        <main>
            <h1>{{ $pokemon->name }}</h1>
            <p>
                {{ $pokemon->species }}
            </p>

            <table class="table table-primary">
                <tbody>
                    <tr>
                        <td><b>Primary Type</b></td>
                        <td>{{ $pokemon->primary_type }}</td>
                    </tr>
                    <tr>
                        <td><b>Weight</b></td>
                        <td>{{ $pokemon->weight }}</td>
                    </tr>
                    <tr>
                        <td><b>Height</b></td>
                        <td>{{ $pokemon->height }}</td>
                    </tr>
                    <tr>
                        <td><b>Hp</b></td>
                        <td>{{ $pokemon->hp }}</td>
                    </tr>
                    <tr>
                        <td><b>Attack</b></td>
                        <td>{{ $pokemon->attack }}</td>
                    </tr>
                    <tr>
                        <td><b>Defense</b></td>
                        <td>{{ $pokemon->defense }}</td>
                    </tr>
                    <tr>
                        <td><b>Legendary</b></td>
                        <td>{{ $pokemon->is_legendary ? 'Yes' : 'No' }}</td>
                    </tr>
                    <td> <img src="{{ Storage::url($pokemon->photo) }}"class="img-thumbnail w-50"></td>

                </tbody>
            </table>
        </main>
    </div>
@endsection
