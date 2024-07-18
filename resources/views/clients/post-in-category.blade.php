@extends('clients.layouts.master')


@section('title')
    Báo Reader | {{ $category->name }}
@endsection


@section('content')

<section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 mb-4">
          <h1 class="h2 mb-4">
            <mark>{{ $category->name }}</mark>
          </h1>
        </div>
        <div class="col-lg-10">
            @foreach ($posts as $post )
            <article class="card mb-4">
                <div class="row card-body">
                  <div class="col-md-4 mb-4 mb-md-0">
                    <div class="post-slider slider-sm">
                      <img src="{{ $post->image }}" class="card-img" alt="post-thumb" style="height:200px; object-fit: cover;">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <h3 class="h4 mb-3"><a class="post-title" href="{{ route('client.post',$post->id) }}">{{ $post->title  }}</a></h3>
                    <ul class="card-meta list-inline">
                      <li class="list-inline-item">
                        <a href="author-single.html" class="card-meta-author">
                          <img src="https://scontent.fhan5-6.fna.fbcdn.net/v/t39.30808-6/442489658_1188534822580401_4619065718944841631_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeFIawSML8qBohxq63OW3A6inAeWbOCGgPKcB5Zs4IaA8tUgpUqmMcgjb2MoJxiiAr03UFvc2tmwzzKx27GrmG-3&_nc_ohc=ldFf9aQs1BoQ7kNvgHdEzpQ&_nc_ht=scontent.fhan5-6.fna&oh=00_AYAWIxmLm7OBJcswkaTBtCyU91XL45djhW8kGobsm7XAXw&oe=669EEB2A" alt="John Doe">
                          <span>{{ $post->author->name }}</span>
                        </a>
                      </li>
                      {{-- <li class="list-inline-item">
                        <i class="ti-timer"></i>3 Min To Read
                      </li> --}}
                      <li class="list-inline-item">
                        <i class="ti-calendar"></i>{{ $post->created_at->format('d/m/Y') }}
                      </li>
                      {{-- <li class="list-inline-item">
                        <ul class="card-meta-tag list-inline">
                          <li class="list-inline-item"><a href="tags.html">Demo</a></li>
                          <li class="list-inline-item"><a href="tags.html">Elements</a></li>
                        </ul>
                      </li> --}}
                    </ul>
                    <p>{{ Str::limit($post->content, 225) }}</p>
                    <a href="{{ route('client.post',$post->id) }}" class="btn btn-outline-primary">Đọc thêm</a>
                  </div>
                </div>
              </article>
            @endforeach

        </div>
      </div>
    </div>
  </section>



@endsection
