@extends('layout.main')
@section('title','Notificaciones')
@section('content')
<form method="POST" action="{{ route('notification.store') }}">
    <h3>Crear notificacion</h3>
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
<hr/>
<h3>Historico</h3>
<table class='table table-hover'>
    <thead>
        <tr>
            <th>Canal</th>
            <th>Mensaje</th>
            <th>Fecha/Hora</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($logs as $log)
        <tr>
            <td>{{ $log['channel'] }}</td>
            <td>{{ $log['message'] }}</td>
            <td>{{ $log['created_at']->format('d/m/Y h:i a') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<hr/>
<h3>Usuario</h3>
<div class='row'>
    <div class='col col-6'>
        <ul class="list-group">
            <li class="list-group-item"><h5>Categorias del usuario</h5></li>
            @foreach ($user->categories as $category)
            <li class="list-group-item">{{ $category['name'] }}</li>
            @endforeach
        </ul>
    </div>
    <div class='col col-6'>
        <ul class="list-group">
            <li class="list-group-item"><h5>Canales del usuario</h5></li>
            @foreach ($user->channels as $channel)
            <li class="list-group-item">{{ $channel['name'] }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
