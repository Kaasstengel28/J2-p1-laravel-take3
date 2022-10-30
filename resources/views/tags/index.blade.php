@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('tags.create') }}" class="btn btn-success">add tag</a>
    </div>

    <div class="card card-default">
        <div class="card-header">tags0</div>
        <table class="card-body">
            @if($tags->count() > 0)
                <table class="table">
                    <thead>
                    <th>Name</th>
                    <th>posts count</th>
                    <th></th>
                    </thead>
                </table>

                <tbody>
                @foreach($tags as $tag)
                    <tr>
                        <td>
                            {{ $tag->name }}
                        </td>
                        <td>
                            0
                        </td>
                        <td>
                        <a href="{{ route('tags.edit', $tags->id) }}" class="btn btn-info btn-sm">
                            Edit
                        </a>
                        <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $tag->id }})">delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
        </table>

        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="POST" id="deletetagForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">delete tag</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-center text-bold">
                                weet je zeker?
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">no goback</button>
                            <button type="button" class="btn btn-danger">yes, dlet</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    @else
        <h3 class="text-center">no tags yet</h3>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        function handleDelete(id)
        {
            var form = document.getElementById('deletetagForm')
            form.action = '/tags/' + id
            $('#deleteModal').modal('show')
        }
    </script>
@endsection
