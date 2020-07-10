@extends("layouts.layout")

@section('main')
<h2>Roles</h2>
<a href="{{ route("roles.create") }}">Crear Rol</a>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>name</th>
            <th>descripcion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td>{{ $role->description }}</td>
            <td>
                <a href="{{ route('roles.edit', $role->id) }}">
                    Editar
                </a>
                <form action="{{ route('roles.delete', $role->id) }}" method="post">
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection