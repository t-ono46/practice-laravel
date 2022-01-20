@extends('layout.common')

@section('title', 'ノート一覧')

@section('content')
    <h1>ノート一覧</h1>
    <a class="btn btn-primary" href="{{ route('note.create') }}">新規作成</a>
@endsection
