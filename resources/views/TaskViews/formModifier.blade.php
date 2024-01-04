@extends("index")


@section("title","TO DO | Modifier vos taches")


@section("title_H1","Modifier vos taches !")


@section("content")
    @foreach($errors->all() as $error)
        <p class="container alert alert-danger">{{$error}}</p>
    @endforeach

    <form action="{{route('modifierTraitement')}}" method="POST" class="container" style="max-width: 700px;">
        @csrf

        <div class="d-none mb-3">
            <label class="form-label">Id :</label>
            <input type="text" name="txtId" value="{{ $tacheSearch ? $tacheSearch->id : '' }}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="txtNom" value="{{$tacheSearch->task}}" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="txtDescription" style="height: 100px">{{$tacheSearch->description}}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Durée en heure</label>
            <input type="number" name="txtDuree" value="{{$tacheSearch->duree}}" class="form-control">
        </div>
        <button type="submit" class="d-block mx-auto btn btn-primary">Modifier</button>
    </form>
@endsection