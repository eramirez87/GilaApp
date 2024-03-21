@extends('layout.main')
@section('title','Notificaciones')
@section('content')
<form method="POST" action="{{ route('notification.store') }}">
    <div class="mb-3">
        @csrf
        <input type="hidden" value='{{ Auth()->id() }}' name="user_id"/>
        <label for="exampleInputEmail1" class="form-label">Categoria</label>
        <select class="form-select" name='category_id' required>
            <option value selected disabled>Seleccione</option>
            @foreach ($categories as $category)
                <option value='{{ $category['id'] }}'>{{ $category['name'] }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Mensaje</label>
        <textarea class="form-control" name="message" maxlength="250" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    @if(Session::has('message'))
        {{ Session::get('message') }}
    @endif
</form>
@endsection
