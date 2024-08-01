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
                      <img src="{{ Storage::url($post->image) }}" class="card-img" alt="post-thumb" style="height:200px; object-fit: cover;">
                    </div>
                  </div>
                  <div class="col-md-8">
                    <h3 class="h4 mb-3"><a class="post-title" href="{{ route('client.post',[$category->slug, $post->slug]) }}">{{ $post->title  }}</a></h3>
                    <ul class="card-meta list-inline">
                      <li class="list-inline-item">
                        <a href="author-single.html" class="card-meta-author">
                          <img src="{{ $post->author->image }}" alt="John Doe">
                          <span>{{ $post->author->name }}</span>
                        </a>
                      </li>
                      <li class="list-inline-item">
                            <i class="ti-eye"></i>{{ $post->views }}
                        </li>
                      <li class="list-inline-item">
                        <i class="ti-calendar"></i>{{ $post->created_at->format('d/m/Y') }}
                      </li>
                      <li class="list-inline-item">
                        <ul class="card-meta-tag list-inline">
                            @foreach ( $post->tags as $tag )
                                <li class="list-inline-item"><a href="tags.html">{{ $tag->name }}</a></li>
                            @endforeach

                        </ul>
                      </li>
                    </ul>
                    <p>{{ Str::limit($post->description, 225) }}</p>
                    <a href="{{ route('client.post',[$category->slug, $post->slug]) }}" class="btn btn-outline-primary">Đọc thêm</a>
                  </div>
                </div>
              </article>
            @endforeach
            {{ $posts->links() }}

        </div>
      </div>
    </div>
  </section>



@endsection
