@extends("index")


@section("title","TO DO | Liste de vos taches")


@section("title_H1","Liste de vos taches !")


@section("content")
    <a class="btn btn-primary mb-5" href="{{route('ajouter')}}">Ajouter une tache</a>
    @if(session("statut"))
        <hr class="container">
        <p class="container alert alert-success">{{session("statut")}}</p>
    @endif
    
    <table class="table table-striped text-center">
        <caption class="text-center">N'oubliez pas à faire des nouvelles taches.</caption>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom de Tache</th>
                <th scope="col">Description</th>
                <th scope="col">Durée (Heure)</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{$task->id}}</td>
                <td>{{$task->task}}</td>
                <td>{{$task->description}}</td>
                <td>{{$task->duree}}</td>
                <td>
                    <a class="btn btn-success ml-2" href="{{route('modifier',['id'=>$task->id])}}">Modifier</a>
                    <a class="btn btn-danger" href="{{route('supprimerTraitement',['id'=>$task->id])}}">Supprimer</a>
                </td>
            </tr>
            @endforeach
            <!-- Ajoutez plus de lignes au besoin -->
        </tbody>
    </table>
@endsection