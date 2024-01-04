<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body">
        <div class="container-fluid">
            <a class="navbar-brand text-dark font-weight-bold" href="{{route('tasks')}}">TO DO - TP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-primary" aria-current="page" href="{{route('tasks')}}">Liste des taches</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-danger font-weight-bold" aria-current="page" href="{{route('logout')}}">Logout <img style="width: 25px; margin-bottom:5px;" src="https://th.bing.com/th/id/R.6eee58adc676996f78d66af8c19c88d7?rik=R4A%2ftdKweh%2bthQ&riu=http%3a%2f%2fclipground.com%2fimages%2flogout-clipart-1.jpg&ehk=%2fsG46YF0dlIzpWM8SwYaRC8FmuFkQ%2fkEGB93nCeT6Eg%3d&risl=&pid=ImgRaw&r=0" alt="logout"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    
    <!-- Section (Liste - Ajouter - Modifier) -->
    <h1 class="m-3 mb-5 text-center text-primary">@yield("title_H1")</h1>
    <div class="container">
        @yield("content")
    </div>
    


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>