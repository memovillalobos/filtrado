@extends('master')
@section('content')
<form action="{{ url('invoices') }}">
  <fieldset>
    <legend>Filtrar Facturas</legend>
    <label for="folio">Folio:</label>
    <input type="text" id="folio" name="filters[folio]" value="{{ $filters['folio'] ?? '' }}" />
    <br>
    <label for="cliente">Cliente:</label>
    <input type="text" id="cliente" name="filters[cliente]" value="{{ $filters['cliente'] ?? '' }}" />
    <br>
    <label for="serie">Serie:</label>
    <input type="text" id="serie" name="filters[serie]" value="{{ $filters['serie'] ?? '' }}" />
    <br>
    <label for="total">Total:</label>
    <input type="text" id="total" name="filters[total]" value="{{ $filters['total'] ?? '' }}" />
    <br>
    <label for="referencia">Referencia:</label>
    <input type="text" id="referencia" name="filters[referencia]" value="{{ $filters['referencia'] ?? '' }}" />
    <br>
    <button type="submit">Buscar</button>
    <a href="{{ url('invoices') }}">Limpiar Filtros</a>
  </fieldset>
</form>
<br>
<table border="1">
  <thead>
    <tr>
      <th>Folio</th>
      <th>Cliente</th>
      <th>Serie</th>
      <th>Total</th>
      <th>Referencia</th>
      <th>Pagos</th>
    </tr>
  </thead>
  <tbody>
    @foreach($invoices as $invoice)
    <tr>
      <td>{{ $invoice->folio }}</td>
      <td>{{ $invoice->client->razonSocial }}</td>
      <td>{{ $invoice->serie }}</td>
      <td>$ {{ number_format($invoice->total, 2) }}</td>
      <td>{{ $invoice->referencia }}</td>
      <td>$ {{ number_format($invoice->payments()->sum('monto'), 2) }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

{!! $invoices->appends(['filters' => $filters])->render() !!}

@endsection
