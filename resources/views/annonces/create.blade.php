@extends('layouts.app', ['styles' => ['pages/auth/form', 'annonces/create']])

@section('content')
<div class="create-content row">
    <div class="content create-form col-md-6">
        <div id="box">
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
                        <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="current-description" maxlength="300">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-10 col-md-8">
                        <label for="link" class="col-form-label">Lien de votre annonce</label>
                        <input id="link" type="link" class="form-control @error('link') is-invalid @enderror" name="link" autocomplete="current-link" value="{{ old('link') }}">
                        @error('link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-10 col-md-8">
                        <label for="image" class="col-form-label">Image de votre annonce <span>(max 3Mo)</span></label>
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
    <div class="view col-md-6 d-none d-md-block">
        <div class="ac-box">
            <img id="ex_image" src="">
            <div class="ac-txt">
                <h3 id="ex_title"></h3>
                <p id="ex_description"></p>
            </div>
            <div class="ac-btn">
                Plus d'informations...
            </div>
        </div>
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
<script>
    $('#title').on('input', function() {
        document.getElementById('ex_title').innerHTML = document.getElementById('title').value;
        console.log('test')
        console.log(document.getElementById('title').value)
    });
    $('#description').on('input', function() {
        document.getElementById('ex_description').innerHTML = document.getElementById('description').value;
    });
    $('#image').on('change', function(event) {
        document.getElementById('ex_image').src = URL.createObjectURL(event.target.files[0]);
    });
</script>
@endsection