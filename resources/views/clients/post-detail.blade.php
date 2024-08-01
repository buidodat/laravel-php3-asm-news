@extends('clients.layouts.master')

@section('title')
    Báo Reader | {{ $post->title }}
@endsection

@section('content')
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-lg-9   mb-5 mb-lg-0">
                    <article>
                        <div class="post-slider mb-4">
                            <img src="{{ Storage::url($post->image) }}" class="card-img" alt="post-thumb">
                        </div>

                        <h1 class="h2">{{ $post->title }} </h1>
                        <ul class="card-meta my-3 list-inline">
                            <li class="list-inline-item">
                                <a class="card-meta-author">
                                    <img src="{{ $post->author->image }}">
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
                        <div class="content">
                            <h4>{!! $post->description !!}</h4>
                            <p>{!! $post->content !!}</p>

                        </div>
                    </article>

                </div>



            </div>
        </div>
    </section>
@endsection
