<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Invoice Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <table class="table">
      <tr>
        <th>Song</th>
        <th>Quantity</th>
        <th>Unit Price</th>
      </tr>
      @foreach($invoiceItems as $invoiceItem)
      <tr>
        <td>{{$invoiceItem->Track->Name}} by {{$invoiceItem->Track->Album->Artist->Name}}</td>
        <td>{{$invoiceItem->Quantity}}</td>
        <td>{{$invoiceItem->UnitPrice}}</td>
      </tr>
      @endforeach
    </table>
  </body>
</html>
