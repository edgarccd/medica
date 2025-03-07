<x-app-layout>
    <br>
    <div class="major container" style="background-color:aqua;">
        <h2>Registrar Medico</h2>
        <br>
        <form action="{{ route('medicos.store') }}" method="post">
            @csrf
            @include('medicos.form-fields')
            <div style="margin: 10px;">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Mostrar Medicos</a>
            </div>
        </form>
    </div>
</x-app-layout>
