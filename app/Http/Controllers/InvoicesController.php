<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Invoice;

class InvoicesController extends Controller
{
    public function index(Request $request)
    {
      $invoices = Invoice::where('eliminado', false);

      // Consultar filtros y aplicarlos a la "consulta"
      if($request->has('filters.folio')){
        $invoices = $invoices->where('folio', $request->filters['folio']);
      }
      if($request->has('filters.serie')){
        $invoices = $invoices->where('serie', $request->filters['serie']);
      }
      if($request->has('filters.total')){
        $invoices = $invoices->where('total', $request->filters['total']);
      }
      if($request->has('filters.referencia')){
        $invoices = $invoices->where('referencia', $request->filters['referencia']);
      }

      // Filtrado en campos de un modelo relacionado (Ej. Razon Social del Cliente)
      if($request->has('filters.cliente')){
        $invoices = $invoices->whereHas('Client', function($item) use ($request){
          $item->where('razonSocial', 'like', '%'.$request->filters['cliente'].'%');
        });
      }

      $invoices = $invoices->orderBy('id', 'desc')->paginate(5);
      return view('invoices.index')->with('invoices', $invoices)->with('filters', $request->filters);
    }
}
