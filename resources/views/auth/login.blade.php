<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestão Comércio</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
</head>
<body class="bg-light">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="card">
                <div class="card-header">
                    Login -  MV Gestão
                </div>
                <div class="card-body">
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                        @endif
                    <form class="form" action="{{route('login.post')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" id="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Senha</label>
                            <input type="password" id="password" class="form-control" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary mb-3">Entrar</button>
                    </form>
                    <div class="alert alert-info" role="alert">
                        Para testes utilize Login: <b>teste@teste.com</b> Senha: <b>teste</b>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
