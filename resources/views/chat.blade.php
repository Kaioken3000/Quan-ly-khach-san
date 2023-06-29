@extends('layouts.app')
@section('content')

{{--
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"> --}}
{{--
<link rel="stylesheet" href="client/css/chatstyle.css"> --}}
<style type="text/css">
</style>
@vite(['resources/sass/app.scss', 'resources/js/app.js'])

<div id="app">
    <chat-layout></chat-layout>
</div>
<script src="http://localhost:6001/socket.io/socket.io.js"></script>

@endsection