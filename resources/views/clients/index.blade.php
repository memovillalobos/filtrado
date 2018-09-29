@extends('master')
@section('content')
<form action="{{ url('clients') }}">
  <fieldset>
    <legend>Filtrar Clientes</legend>
    <label for="razonSocial">Razón Social:</label>
    <input type="text" id="razonSocial" name="filters[razonSocial]" value="{{ $filters['razonSocial'] ?? '' }}" />
    <br>
    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="filters[direccion]" value="{{ $filters['direccion'] ?? '' }}" />
    <br>
    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="filters[telefono]" value="{{ $filters['telefono'] ?? '' }}" />
    <br>
    <button type="submit">Buscar</button>
    <a href="{{ url('clients') }}">Limpiar Filtros</a>
  </fieldset>
</form>
<br>
<table border="1">
  <thead>
    <tr>
      <th>Razón Social</th>
      <th>Dirección</th>
      <th>Teléfono</th>
      <th>Facturas</th>
    </tr>
  </thead>
  <tbody>
    @foreach($clients as $client)
    <tr>
      <td>{{ $client->razonSocial }}</td>
      <td>{{ $client->direccion }}</td>
      <td>{{ $client->telefono }}</td>
      <td>{{ $client->invoices()->count() }} - $ {{ number_format($client->invoices()->sum('total'), 2) }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

{!! $clients->appends(['filters' => $filters])->render() !!}

@endsection
