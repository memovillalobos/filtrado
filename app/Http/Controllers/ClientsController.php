<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;

class ClientsController extends Controller
{
    //
    public function index(Request $request)
    {
      $clients = Client::where('eliminado', false);

      // Consultar filtros y aplicarlos a la "consulta"
      if($request->has('filters.razonSocial')){
        $clients = $clients->where('razonSocial', 'like', '%'.$request->filters['razonSocial'].'%');
      }
      if($request->has('filters.direccion')){
        $clients = $clients->where('direccion', 'like', '%'.$request->filters['direccion'].'%');
      }
      if($request->has('filters.telefono')){
        $clients = $clients->where('telefono', 'like', '%'.$request->filters['telefono'].'%');
      }

      $clients = $clients->orderBy('id', 'asc')->paginate(5);
      return view('clients.index')->with('clients', $clients)->with('filters', $request->filters);
    }

}
