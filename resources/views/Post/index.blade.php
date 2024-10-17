@extends('Post.mainLayout')
@section('content')
    <div class="container-fluid mt-5">
        <h1 class="text-center"> Danh Sách Bài Viết</h1>
        <a href="{{ route('Post.create') }}">
            <h5 class="text-end text-primary">Thêm mới</h5>
        </a>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">content</th>
                <th scope="col">Ngày tạo <a
                        href="?sort=created_at&order={{ request('order') === 'asc' ? 'desc' : 'asc' }}"><i
                            class="bi bi-arrow-down-up"></i></a></th>
                <th scope="col">thao tác</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($posts ?? [] as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><a href="{{ route('Post.show', $item->id) }}">{{ $item->title }}</a></td>
                    <td>{{ $item->content }}</td>

                    <td>{{ $item->published_at }}</td>
                    <td>
                        <a href="{{ route('Post.edit', $item->id) }}"><i class="bi bi-pencil-square text-warning"></i></a> |
                        <a href="{{ route('Post.delete', $item->id) }}">
                            <i class="bi bi-trash2-fill text-danger"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
