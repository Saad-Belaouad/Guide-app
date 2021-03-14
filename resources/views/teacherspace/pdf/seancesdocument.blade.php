<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mes Seances</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">


</head>
<body>
    <h6 class="text-danger text-center" style="font-size: 20px">Guide du Professeur  </h6>
    <div>
@foreach($user as $us)
<div > Email  :  {{$us->email}}</div>
<div>  Nom Complet :  {{$us->name}}</div>
    </div>
    <hr style="width:50%; color:red;  ">
<h4 class="text-center text-primary">Mon Emploi du Temps </h4>
@endforeach
<table  class="table  table-bordered ">
    <thead>
      <tr>
        <th scope="col" class="bg-info px-2">Cours</th>
        <th scope="col" class="bg-info px-2">Jour</th>
        <th scope="col" class="bg-info px-3">Durée du cours</th>
        <th scope="col" class="bg-info px-2">Classe</th>
        <th scope="col" class="bg-info px-2" >Nombre du séance</th>

      </tr>
    </thead>
    <tbody>

            @foreach($data as $seance)
      <tr >
        <td class="bg-light px-2"> {{$seance->cours}}</td>
        <td class="bg-light px-2">{{$seance->jour}}</td>
        <td class="bg-warning px-2"> {{  'De : '. $seance->tempsseance .' à : ' . $seance->tempsseancef  }}</td>
        <td class="bg-light px-2">{{$seance->classe}}</td>

        <td class="bg-light px-2">{{$seance->nombreseance}}</td>
    </tr>

      @endforeach

    </tbody>
  </table>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</html>

