@extends('layouts.app', ['styles' => ['pages/auth/form', 'annonces/create']])

@section('content')
<div class="create-content row">
    <div class="content create-form col-md-6">
        <div id="box">
            @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
            <h1>Rejoignez les annonceurs</h1>
            <h2>complétez ces informations pour votre annonce</h2>
            <form method="POST" action="{{ route('annonces.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-10 col-md-8">
                        <label for="departement_id" class="col-form-label">Departement de l'annonce</label>
                        <select class="form-control" name="departement_id" id="departement_id">
                            @foreach ($departements as $dep)
                                <option value="{{ $dep->identifier }}" {{ (old("departement_id") == $dep->identifier ? "selected":"") }}>{{ $dep->name }}</option>
                            @endforeach
                        </select>
                        @error('departement_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-10 col-md-8">
                        <label for="title" class="col-form-label">Titre de l'annonce</label>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required autocomplete="current-title" value="{{ old('title') }}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-10 col-md-8">
                        <label for="description" class="col-form-label">Description de votre annonce</label>
                        <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="current-description" maxlength="150">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-10 col-md-8">
                        <label for="link" class="col-form-label">Lien de votre annonce</label>
                        <input id="link" type="link" class="form-control @error('link') is-invalid @enderror" name="link" required autocomplete="current-link" value="{{ old('link') }}">
                        @error('link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-10 col-md-8">
                        <label for="image" class="col-form-label">Image de votre annonce</label>
                        <div class="custom-file">
                            <input type="file" id="image" name="image"
                                   class="{{ $errors->has('image') ? ' is-invalid ' : '' }}custom-file-input" required value="{{old('image')}}">
                            <label class="custom-file-label" for="image" style="padding: 0.375rem 0.75rem;">Choissisez un fichier</label>
                            @if ($errors->has('image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-10 col-md-8 row">
                        <div class="col-8 button" style="padding: 0;">
                            <button type="submit" class="btn">
                                Créer mon annonce
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="create-exemple col-md-6 d-none d-md-block">

    </div>
</div>
<script>
    $("input[type=file]").change(function () {
        var fieldVal = $(this).val();

        // Change the node's value by removing the fake path (Chrome)
        fieldVal = fieldVal.replace("C:\\fakepath\\", "");

        if (fieldVal != undefined || fieldVal != "") {
            $(this).next(".custom-file-label").attr('data-content', fieldVal);
            $(this).next(".custom-file-label").text(fieldVal);
        }
    });
    
</script>
@endsection