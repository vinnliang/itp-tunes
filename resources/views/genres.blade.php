<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Genres</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <table class="table">
      <tr>
        <th>Genres</th>
      </tr>
      @foreach($genres as $genre)
      <tr>
        <td>
          <!--<a href="/tracks/{{$genre->Name}}">{{$genre->Name}}</a>-->
          <a href="/tracks?genre={{$genre->Name}}">{{$genre->Name}}</a>
        </td>
      </tr>
      @endforeach
    </table>
  </body>
</html>
