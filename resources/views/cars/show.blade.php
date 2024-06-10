@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row g-3 align-items-center">
            <div class="input-group mb-3">
                <p> Id : {{ $car->id }}</p>
            </div>
            <div class="input-group mb-3">
                <p> Marque : {{ $car->marque }}</p>
            </div>
            <div class="input-group mb-3">
                <p> Modele : {{ $car->modele }}</p>
            </div>
        </div>
        <a href="{{ route('cars.index') }}" class="btn btn-dark">Retour</a>
    </div>
@endsection
