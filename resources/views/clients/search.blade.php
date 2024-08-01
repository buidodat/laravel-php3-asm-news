@extends('clients.layouts.master')


@section('title')
    Báo Reader | Tìm kiếm tin tức: {{ $keyWord }}
@endsection


@section('content')

<section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 mb-4">
            <h1 class="h2 mb-4">Kết quả tìm được cho:
                <mark>{{ $keyWord }} </mark>
              </h1>
        </div>
        <div class="col-lg-10">
            @foreach ($posts as $p )
                <article class="card mb-4">
                    <div class="row card-body">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="post-slider slider-sm">
                        <img src="{{ Storage::url($p->image) }}" class="card-img" alt="post-thumb" style="height:200px; object-fit: cover;">

                        </div>
                    </div>
                    <div class="col-md-8">
                        <h3 class="h4 mb-3"><a class="post-title" href="{{ route('client.post',[$p->category->slug, $p->slug]) }}">{{ $p->title }}</a></h3>
                        <ul class="card-meta list-inline">
                        <li class="list-inline-item">
                            <a  class="card-meta-author">
                            <img src="{{ $p->author->image }}" >
                            <span>{{ $p->author->name }}</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <i class="ti-eye"></i>{{ $p->views }}
                        </li>
                        <li class="list-inline-item">
                            <i class="ti-calendar"></i>{{ $p->created_at->format('d/m/Y') }}
                        </li>
                        <li class="list-inline-item">
                            <ul class="card-meta-tag list-inline">
                                @foreach ( $p->tags as $tag )
                                    <li class="list-inline-item"><a href="tags.html">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        </ul>
                        <p>{{ Str::limit($p->description,225) }} </p>
                        <a href="{{ route('client.post',[$p->category->slug, $p->slug]) }}" class="btn btn-outline-primary">Đọc thêm</a>
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
