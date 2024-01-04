@extends("index")


@section("title","TO DO | Ajouter vos taches")


@section("title_H1","Ajouter vos taches !")


@section("content")
    @if(session("statut"))
        <p class="container alert alert-success">{{session("statut")}}</p>
    @else
        @foreach($errors->all() as $error)
            <p class="container alert alert-danger">{{$error}}</p>
        @endforeach
    @endif

    <form action="{{route('ajouterTraitement')}}" method="POST" class="container" style="max-width: 700px;">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="txtNom" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="txtDescription" style="height: 100px"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Durée en heure</label>
            <input type="number" name="txtDuree" class="form-control">
        </div>
        <button type="submit" class="d-block mx-auto btn btn-primary">Ajouter</button>
    </form>
@endsection