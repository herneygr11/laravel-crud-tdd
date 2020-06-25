@extends("layouts.layout")

@section('main')
    <h2>Crear Rol</h2>
    <form action="{{ route("roles.save") }}" method="POST">
    @csrf
    <input type="text" name="name">
    <select name="guard_name">
        <option value="web">Web</option>
        <option value="api">Api</option>
    </select>
    <textarea name="description" cols="30" rows="10"></textarea>
    <button id="create-role">Guardar</button>
    </form>
@endsection