<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Playlists</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <h1>{{$playlist->Name}}</h1>
    <h3>Tracks</h3>
    <ul>
        @foreach($tracks as $track)
          <li>
              {{$track->Name}}
          </li>
        @endforeach
  </body>
</html>
