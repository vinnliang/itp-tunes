<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use DB;

class InvoicesController extends Controller
{
    public function index()
    {
    //  $invoices = DB::table('invoices')
    //  ->join('customers', 'invoices.CustomerId', '=', 'customers.CustomerId')
    //  ->orderBy('InvoiceDate', 'desc')
    //  ->limit(10)
    //  ->get();
    $invoices = Invoice::orderBy('InvoiceDate', 'desc')->limit(10)->get();
      return view('invoices',
      [
        'invoices' => $invoices
      ]);
    }

    public function showInvoice($invoiceID)
    {
      //$invoiceItems = DB::table('invoice_items')
      //->select('Quantity', 'tracks.UnitPrice', 'artists.Name as ArtistName', 'tracks.Name as TrackName')
      //->join('tracks', 'invoice_items.TrackId', '=', 'tracks.TrackId')
      //->join('albums', 'tracks.AlbumId', '=', 'albums.AlbumId')
      //->join('artists', 'artists.ArtistId', '=', 'albums.ArtistId')
      //->where('InvoiceId', '=', $invoiceID)
      //->get();

      $invoice = Invoice::find($invoiceID);
      $invoiceItems = $invoice->InvoiceItems;
      
      return view('invoice-details',
      [
        'invoiceItems' => $invoiceItems
      ]);
    }
}
