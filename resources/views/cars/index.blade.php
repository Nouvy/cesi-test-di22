@extends('layouts.app')

@section('customCss')
    <link href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.css" />
@endsection

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div id="alert_success" class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        <a href="{{ route('cars.create') }}" class="btn btn-success">Créer une voiture</a>
        <table class="table" data-replace="jtable" id="example" aria-label="JS Datatable" data-locale="en" data-search="true">
            <thead>
            <tr>
                <th>Modele</th>
                <th>Immatriculation</th>
                <th>Numéro Série</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cars as $car)
                <tr>
                    <td>{{ $car->modele }}</td>
                    <td>{{ $car->immat }}</td>
                    <td>{{ $car->num_serie }}</td>
                    <td>
                        <a href="{{ route('cars.show', $car->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection

@section('customJs')
    <script   src="https://code.jquery.com/jquery-3.7.1.min.js"   integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="   crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.js" ></script>
    <script type="text/javascript">
        new DataTable('#example');
    </script>
    <script>
        setTimeout(() => {
            let alert = document.querySelector('#alert_success');
            alert.style.display = 'none';
        }, 2000);
    </script>
@endsection
