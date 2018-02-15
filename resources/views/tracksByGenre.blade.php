<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tracks by Genre</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <table class="table">
      <tr>
        <th>Track Name</th>
        <th>Album Title</th>
        <th>Artist Name</th>
        <th>Media Type</th>
        <th>Price</th>
      </tr>
      @foreach($trackItems as $trackItem)
      <tr>
        <td>{{$trackItem->Name}}</td>
        <td>{{$trackItem->Album->Title}}</td>
        <td>{{$trackItem->Album->Artist->Name}}</td>
        <td>{{$trackItem->MediaType->Name}}</td>
        <td>{{$trackItem->UnitPrice}}</td>
      </tr>
      @endforeach
    </table>
  </body>
</html>
