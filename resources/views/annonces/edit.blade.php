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
            <h1>Modifier votre annonce</h1>
            <form method="POST" action="{{ route('annonces.update', $ac->id) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group row">
                    <div class="col-10 col-md-8">
                        <label for="title" class="col-form-label">Titre de l'annonce</label>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" autocomplete="current-title" 
                        value="{{ old('title') == null ? $ac->title : old('title')}}">
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-10 col-md-8">
                        <label for="description" class="col-form-label">Description de votre annonce</label>
                        <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="current-description" maxlength="300">{{ old('description') == null ? $ac->description : old('description')}}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-10 col-md-8">
                        <label for="link" class="col-form-label">Lien de votre annonce</label>
                        <input id="link" type="link" class="form-control @error('link') is-invalid @enderror" name="link" autocomplete="current-link" value="{{ old('link') == null ? $ac->link : old('link')}}">
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
                            class="{{ $errors->has('image') ? ' is-invalid ' : '' }}custom-file-input" value="{{ old('image') == null ? $ac->image : old('image')}}">
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
                                Enregistrer les modifications
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="view col-md-6 d-none d-md-block">
        <div class="ac-box">
            <img id="ex_image" src="{{$ac->image}}">
            <div class="ac-txt">
                <h3 id="ex_title">{{$ac->title}}</h3>
                <p id="ex_description">{{$ac->description}}</p>
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