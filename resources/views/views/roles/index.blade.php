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
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection