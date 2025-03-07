<x-app-layout>
    <br>
    <div class="major container">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Nombre</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicos as $medico)
                        <tr>
                            <td>{{ $medico->apellido_pat }}</td>
                            <td>{{ $medico->apellido_mat }}</td>
                            <td>{{ $medico->nombre }}</td>
                            <td>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('medicos.create') }}" class="btn btn-secondary">Registrar Medicos</a>
    </div>
</x-app-layout>
