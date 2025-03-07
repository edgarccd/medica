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
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicos as $medico)
                        <tr>
                            <td>{{ $medico->apellido_pat }}</td>
                            <td>{{ $medico->apellido_mat }}</td>
                            <td>{{ $medico->nombre }}</td>
                            <td>
                                <a href="{{ route('medicos.edit', $medico) }}"
                                class="btn btn-outline-primary">Editar</a>
                            </td>
                            <td>

                                <form action="{{ route('medicos.destroy', $medico) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('medicos.create') }}" class="btn btn-secondary">Registrar Medicos</a>
    </div>
</x-app-layout>
