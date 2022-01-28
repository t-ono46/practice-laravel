@extends('layout.common')

@section('title', 'ノート一覧')

@section('content')
    <table class="table table-hover">
        <thead class="thead-light">
        <tr>
            <th>Notes</th>
            <th style="width: 10%"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>
                <a style="display: block; text-decoration: none;" href="{{ route('notes.create') }}">
                    <span class="text-black-50"><i class="far fa-plus-square"></i> create a new note ... </span>
                </a>
            </th>
            <th></th>
        </tr>
        @foreach($notes as $note)
            <tr>
                <th>
                    <a style="display: block; text-decoration: none;" href="{{ route('notes.edit', $note->id) }}">
                        <span class="text-black">{{ $note->title }}</span>
                    </a>
                </th>
                <th>
                    <button class="py-0 btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"
                            data-url="{{ route('notes.destroy', $note->id) }}">Delete
                    </button>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete note</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ノートを削除してもよろしいですか？
                </div>
                <div class="modal-footer">
                    <form method="POST" name="delete_form">
                        <input type="submit" class="btn btn-danger" value="Delete">
                        @csrf
                        @method('DELETE')
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget)
            let url = button.data('url')
            $(delete_form).attr('action', url)
        })
    </script>
@endsection
