@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('cars.update', $car->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label class="col-form-label" for="marque" > Marque : </label>
                </div>
                <div class="col-auto">
                    <input class="form-control" id="marque" name="marque" type="text" required value="{{ $car->marque }}">
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label class="col-form-label" for="modele" > Modèle : </label>
                </div>
                <div class="col-auto">
                    <input class="form-control" id="modele" name="modele" type="text" required value="{{ $car->modele }}">
                </div>
            </div>
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label class="col-form-label" for="immat" > Immatriculation: </label>
                </div>
                <div class="col-auto">
                    <input class="form-control" id="immat" name="immat" type="text" required value="{{ $car->immat }}">
                </div>
                <div class="input-group mb-3">
                    <label for="tel"> Numéro de série : </label>
                    <input id="tel" name="num_serie" type="text" required value="{{ $car->num_serie }}">
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label class="col-form-label" for="puissance_fiscale" > Puissance fiscale : </label>
                    </div>
                    <div class="col-auto">
                        <input class="form-control" id="puissance_fiscale" name="puissance_fiscale" type="number" required value="{{ $car->puissance_fiscale }}">
                    </div>
                </div>
                <div class="row g-3 align-items-center">
                    <div class="col-auto">
                        <label class="col-form-label" for="date_mise_circulation" > Date de mise en circulation : </label>
                    </div>
                    <div class="col-auto">
                        <input class="form-control" id="date_mise_circulation" name="date_mise_circulation" type="date" required  value="{{ $car->date_mise_circulation }}">
                    </div>
                </div>

                <div class="input-group mb-3">
                    <button class="btn btn-success" type="submit">Valider</button>
                </div>
            </div>
        </form>
    </div>
@endsection
