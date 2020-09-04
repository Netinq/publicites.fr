@extends('layouts.app', ['styles' => ['pages/devlog']])

@section('content')
<div class="offset-md-2 col-md-8" id="content">
    <h1>Journal de développement</h1>
    <iframe id="yourdevlog_iframe" title="YourDevlog : Publicites.fr" width="100%" height="100%" allowfullscreen=true style="border: none;" src="https://yourdevlog.com/data/66108d59-2d85-4ba6-af36-bee49299ea2e">
</div>
@endsection
