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
                            <img src="{{ $post->image }}" class="card-img" alt="post-thumb">
                        </div>

                        <h1 class="h2">{{ $post->title }} </h1>
                        <ul class="card-meta my-3 list-inline">
                            <li class="list-inline-item">
                                <a class="card-meta-author">
                                    <img src="https://scontent.fhan5-6.fna.fbcdn.net/v/t39.30808-6/442489658_1188534822580401_4619065718944841631_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeFIawSML8qBohxq63OW3A6inAeWbOCGgPKcB5Zs4IaA8tUgpUqmMcgjb2MoJxiiAr03UFvc2tmwzzKx27GrmG-3&_nc_ohc=ldFf9aQs1BoQ7kNvgHdEzpQ&_nc_ht=scontent.fhan5-6.fna&oh=00_AYAWIxmLm7OBJcswkaTBtCyU91XL45djhW8kGobsm7XAXw&oe=669EEB2A">
                                    <span>{{ $post->author->name }}</span>
                                </a>
                            </li>
                            {{-- <li class="list-inline-item">
                                <i class="ti-timer"></i>2 Min To Read
                            </li> --}}
                            <li class="list-inline-item">
                                <i class="ti-calendar"></i>{{ $post->created_at->format('d/m/Y') }}
                            </li>
                            {{-- <li class="list-inline-item">
                                <ul class="card-meta-tag list-inline">
                                    <li class="list-inline-item"><a href="tags.html">Color</a></li>
                                    <li class="list-inline-item"><a href="tags.html">Recipe</a></li>
                                    <li class="list-inline-item"><a href="tags.html">Fish</a></li>
                                </ul>
                            </li> --}}
                        </ul>
                        <div class="content">
                            <p>{{ $post->content }}</p>

                        </div>
                    </article>

                </div>



            </div>
        </div>
    </section>
@endsection
