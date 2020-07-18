@extends("layouts.layout")

@section('main')

<div class="d-flex align-items-center justify-content-between my-5">
    <h3>Roles</h3>
    <a href="{{ route("roles.create") }}" class="btn btn-primary">Crear Rol</a>
</div>

<table class="table table-active table-hover w-50 m-auto">
    <thead>
        <tr>
            <th>#</th>
            <th>name</th>
            <th>descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roles as $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td>{{ $role->description }}</td>
            <td class="d-flex align-content-center">
                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary mx-1" >
                    editar
                </a>
                <form action="{{ route('roles.delete', $role->id) }}" method="post">
                    <button type="submit" class="btn btn-danger mx-1" >eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection