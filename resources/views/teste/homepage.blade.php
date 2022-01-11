<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url("assets/bootstrap/css/bootstrap.min.css")}}">

</head>
<body>
    <div class="container">
        <ul class="nav justify-content-end">

            <li class="nav-item">
              <a class="nav-link " href="{{url("/logout")}}">Sair</a>
            </li>
          </ul>

        <br>
        <h3>Bem vindo</h3><br>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($results as $result)
      <tr>
      <th scope="row">{{$result->Id_Cadastro}}</th>
      <td>{{$result->Nome_Cadastro}}</td>
      <td>{{$result->Email_Cadastro}}</td>

    </tr>
      @endforeach
  </tbody>
</table>
</div>


</body>
</html>


