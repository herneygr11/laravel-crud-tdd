@extends("layouts.layout")

@section('main')
<h1>Editar Rol</h1>
<form action="{{ route("roles.update", 1) }}" method="post">
    @csrf
    @method("PUT")

    <input type="text" name="name" value="{{$role->name}}">
    @if ($errors->has("name"))
        <span>{{ $errors->first("name") }}</span>
    @endif
    <br>
    <select name="guard_name">
        <option value="web" @if ("web" === $role->guard_name) selected @endif >Web</option>
        <option value="api" @if ("api" === $role->guard_name) selected @endif>Api</option>
    </select>
    <br>
    <textarea name="description" cols="30" rows="10">{{$role->description}}</textarea>
    @if ($errors->has("description"))
        <span>{{ $errors->first("description") }}</span>
    @endif

    <a href="{{ route("categories.index") }}">Cancelar</a>
    <button id="update-role">Guardar</button>
</form>
@endsection