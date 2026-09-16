@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $title }}</h1>

        <h2>{{ $role }}</h2>

        <p>
            Selamat datang di halaman {{ $role }} SIMONIKA.
        </p>
    </div>
@endsection