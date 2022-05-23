@extends('layouts.admin')

@section('title', 'Index')

@section('content')
    <div class="container">
        <table class="table table-striped table-dark table-hover my-5">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col" colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr data-id="{{ $post->slug }}">
                        <th class="text-center" scope="row">{{ $post->id }}</th>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ date('d/m/Y', strtotime($post->created_at)) }}</td>
                        <td>{{ date('d/m/Y', strtotime($post->updated_at)) }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.posts.show', $post->slug) }}">View</a>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('admin.posts.edit', $post->slug) }}">Edit</a>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-danger btn-delete">Delete</button>
                        </td>
                    </tr>
                @endforeach
            <tbody>
        </table>

        {{-- per paginate  --}}
        {{ $posts->links() }}

        <section id="confirmation" class="overlay d-none">
            <div class="popup">
                <h1>Sei sicuro di voler eliminare?</h1>
                <div class="d-flex justify-content-center">
                    <button id="btn-no" class="btn btn-primary me-3">NO</button>
                    <form method="POST" data-base="{{ route('admin.posts.destroy', '*****') }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">ELIMINA</button>
                    </form>
                </div>
            </div>
        </section>
    </div>



@endsection
