<x-app-layout>
    <br>
    <div class="container">
        <form action="{{ route('medicos.search') }}" method="get">
            <div class="input-group mb-3">
                <button class="btn btn-outline-secondary" type="submit">Buscar por</button>
                <input id="nombre" name="nombre" type="text" class="form-control"
                    aria-label="Text input with segmented dropdown button" placeholder=" " required>
                <select class="form-select" id="busqueda" name="busqueda" required>
                    <option value="paterno" selected>Apellido Paterno</option>
                    <option value="materno">Apellido Materno</option>
                    <option value="nombre">Nombre</option>
                </select>

            </div>
        </form>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido Paterno</th>
                    <th scope="col">Apellido Materno</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medicos as $medico)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $medico->nombre }}</td>
                        <td>{{ $medico->apellido_pat }}</td>
                        <td>{{ $medico->apellido_mat }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <a href="{{ route('paypal.payment') }}" class="btn btn-primary">Pagar con PayPal</a>
    </div>
</x-app-layout>
