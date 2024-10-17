@extends('Post.mainLayout')
@section('content')
    @php
        $action_url = route('Post.store');
    @endphp
    <div class="container-fluid mt-5">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Sửa bài viết</h2>
            <a href="{{ route('Post.index') }}" class="text-decoration-none"><i class="bi bi-box-arrow-left"></i> Trở về</a>
        </div>

        <div class="mt-5">
            <form action="{{ route('Post.update', $post->id) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label" >Title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="title"
                        name="title" value="{{ $post->title }}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">content</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content">{{ $post->content }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="published_at" class="form-label">Published At</label>
                    <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{ $post->published_at }}">
                </div>

                <button type="submit" class="btn btn-outline-primary">Lưu dữ liệu</button>

            </form>
        </div>
    </div>
@endsection
