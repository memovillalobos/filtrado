<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" lang="es">
  </head>
  <body>
    <nav>
      <ul>
        <li><a href="{{ url('invoices') }}">Facturas</a></li>
        <li><a href="{{ url('clients') }}">Clientes</a></li>
      </ul>
    </nav>
    <hr>
    @yield('content')
  </body>
</html>
