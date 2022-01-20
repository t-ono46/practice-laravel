@extends('layout.common')

@section('title', 'ノート作成')

@section('content')
    <form action="{{ route('notes.store') }}" method="POST">
        <textarea class="" id="body" name="name"></textarea>
    </form>



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
        $(document).ready(function () {
            var simplemde = new SimpleMDE({element: document.getElementById("body")});
        });
    </script>
@endsection
