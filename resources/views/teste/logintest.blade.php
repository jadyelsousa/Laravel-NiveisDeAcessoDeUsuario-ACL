<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url("assets/bootstrap/css/bootstrap.min.css")}}">
    <title>Document</title>
</head>
<body>


    <div id="login">
        <h3 class="text-center text-black pt-5"></h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
        <div id="login-box" class="col-md-12">
        <form id="login-form" class="form"  action="{{url('/connection')}}" method="post">
            <h3 class="text-center text-black">Login</h3>
        @csrf
        @if ($errors->all())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{$error}}
              </div>
            @endforeach
        @endif
        <div class="form-group">
          <label >CPF</label>
          <input type="text" class="form-control" id="cpf"  name="cpf" placeholder="CPF"><br>

        </div>
        <div class="form-group">
          <label >Senha</label>
          <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha"><br>
        </div >

        <button type="submit" class="btn btn-primary">Logar</button>
      </form>
    </div>

        </div>
        </div>
        </div>

    <div><br>

</body>
</html>


