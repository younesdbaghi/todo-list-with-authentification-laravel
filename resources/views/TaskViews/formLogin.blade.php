<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Formulaire de Connexion</title>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Connexion</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('login.traitement')}}">
                        @csrf
                        <div class="form-group">
                            <label for="username">Email</label>
                            <input type="email" class="form-control" name="txtEmail" value="{{ old('txtEmail') }}" placeholder="Email">
                            @if(session("login-error"))
                                <span class="text-danger">{{session("login-error")}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" name="txtPassword" placeholder="Mot de passe">
                        </div>
                        <button type="submit" class="btn btn-primary">Se Connecter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
