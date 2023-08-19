@extends('layouts3.app')

@section('content')
    <div class="d-flex">
        <div class="flex-grow-1">
            @include('layouts3.title', ['titlePage' => 'Preview Virtual tour'])
        </div>
    </div>
    <!-- Latest compiled and minified JavaScript -->
    <script src="/pannellum/pannellum.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/pannellum/pannellum.css">
    <style>
        #panorama {
            width: 100%;
            height: 500px;
        }
    </style>
    <div id="panorama"></div>
    <script>
        pannellum.viewer('panorama', {
            "type": "equirectangular",
            "panorama": "/client/images/{{ $virtualtour->hinh }}",
            "autoLoad": true,
        });
    </script>
@endsection
