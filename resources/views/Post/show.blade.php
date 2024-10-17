@extends('Post.mainLayout')
@section('content')

    <div class="container-fluid mt-5">

        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-center">chi tết bài viết</h2>
            <a href="{{ route('Post.index') }}" class="text-decoration-none"><i class="bi bi-box-arrow-left"></i> Trở về</a>
        </div>

        <div class="mt-3 px-5">
        <h3>title: {{ $post->title }}</h3>
        <h5>content: {{ $post->content }}</h5>
        <h6>ngày đăng: {{ $post->publishe_at }}</h6>
        </div>
        
    </div>
@endsection
