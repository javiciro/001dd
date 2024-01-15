@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="background-color: #ffffff; border: 1px solid #1197D4;">
                    <div class="card-header" style="background-color: #1197D4; color: #ffffff;">
                        <h3 class="card-title">Agregar Placa</h3>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ url('/agregarPlaca') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="placa">Placa:</label>
                                <input type="text" name="placa" id="placa" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary" style="background-color: #1285AD;">Guardar Placa</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card" style="background-color: #ffffff; border: 1px solid #1197D4;">
                    <div class="card-header" style="background-color: #1197D4; color: #ffffff;">
                        <h3 class="card-title">Placas Creadas</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Placa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($placas as $placa)
                                    <tr>
                                        <td>{{ $placa->placa }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="1">No hay placas disponibles</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{ $placas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>



@endsection
