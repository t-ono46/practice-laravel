@extends('layout.common')

@section('title', 'ノート一覧')

@section('content')
    <h1>ノート一覧</h1>
    <a class="btn btn-primary" href="{{ route('notes.create') }}">新規作成</a>

    <table class="table">
        <thead class="thead-light">
        <tr>
            <th style="width: 80%">title</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($notes as $note)
            <tr>
                <th>{{ $note->title }}</th>
                <th>
                    <a href="{{ route('notes.edit', $note->id) }}"><i class="far fa-edit text-secondary"></i></a>
                    <a href="{{ route('notes.destroy', $note->id) }}"><i class="fas fa-trash-alt text-danger"></i></a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
