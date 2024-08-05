@extends('clients.layouts.master')

@section('banner')
    @include('clients.layouts.banner')
@endsection

@section('title')
    Báo Reader | Tin tức Việt Nam và Quốc tế
@endsection


@section('content')
@if (session()->has('error'))
<div  style="text-align: center;  color:red; margin-top: 40px">
    <span style=" padding:10px 5%; background-color: orange; border-radius: 5px">
        {{ session()->get('error') }}
    </span>

</div>
@endif
    <section class="section pb-0">

        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <h2 class="h5 section-title">Tin nóng </h2>
                    <article class="card">
                        <div class="post-slider slider-sm">
                            <img src="{{  Storage::url($postHot->image) }}"
                                class="card-img-top" alt="post-thumb" style="height:235px; object-fit: cover;">
                        </div>

                        <div class="card-body">
                            <h3 class="h4 mb-3"><a class="post-title" href="{{ route('client.post', [$postHot->category->slug, $postHot->slug])  }}">{{ $postHot->title }}</a></h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="" class="card-meta-author">
                                        <img src="{{ $postHot->author->image }}">
                                        <span>{{ $postHot->author->name }}</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-calendar"></i>{{ $postHot->created_at->format('d/m/Y') }}
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-eye"></i>{{ $postHot->views }}
                                </li>
                                <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">
                                        @foreach ($postHot->tags as $tag)
                                            <li class="list-inline-item"><a>{{ $tag->name }}</a></li>
                                        @endforeach

                                    </ul>
                                </li>
                            </ul>
                            <p>{!! Str::limit($postHot->description, 100) !!}</p>
                            <a href="{{ route('client.post',[ $postHot->category->slug, $postHot->slug])  }}" class="btn btn-outline-primary">Đọc thêm</a>
                        </div>
                    </article>
                </div>

                {{-- Start Tin tức thịnh hành--}}
                <div class="col-lg-4 mb-5">
                    <h2 class="h5 section-title">Tin tức thịnh hành</h2>
                    @foreach ( $postTrendings as $item )
                        <article class="card mb-4">
                            <div class="card-body d-flex">
                                <img class="card-img-sm"
                                    src="{{  Storage::url($item->image) }}">
                                <div class="ml-3">
                                    <h4><a href="{{ route('client.post', [$item->category->slug, $item->slug])  }}" class="post-title">{{ $item->title }}</a>
                                    </h4>
                                    <ul class="card-meta list-inline mb-0">
                                        <li class="list-inline-item mb-0">
                                            <i class="ti-calendar"></i>{{ $item->created_at->format('d/m/Y') }}
                                        </li>
                                        <li class="list-inline-item mb-0">
                                            <i class="ti-eye"></i>{{  $item->views }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    @endforeach

                </div>
                {{-- End Tin tức thịnh hành--}}

                {{-- Start Tin tức phổ biến--}}
                <div class="col-lg-4 mb-5">
                    <h2 class="h5 section-title">Tin tức phổ biến</h2>

                    <article class="card">
                        <div class="post-slider slider-sm">
                            <img src="{{  Storage::url($postPopular->image) }}"
                                class="card-img-top" alt="post-thumb" style="height:235px; object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <h3 class="h4 mb-3"><a class="post-title" href="{{ route('client.post', [$postPopular->category->slug, $postPopular->slug])  }}">{{ $postPopular->title }}</a></h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="author-single.html" class="card-meta-author">
                                        <img src="{{ $postPopular->author->image }}">
                                        <span>{{ $postPopular->author->name }}</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-calendar"></i>{{ $postPopular->created_at->format('d/m/Y') }}
                                </li>
                                <li class="list-inline-item">
                                    <i class="ti-eye"></i>{{  $postPopular->views }}
                                </li>
                                <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">
                                        @foreach ($postPopular->tags as $tag)
                                            <li class="list-inline-item"><a>{{ $tag->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                            <p>{{ Str::limit($postPopular->description, 100) }}</p>
                            <a href="{{ route('client.post', [$postPopular->category->slug, $postPopular->slug])  }}" class="btn btn-outline-primary">Đọc thêm</a>
                        </div>
                    </article>
                </div>
                {{-- End Tin tức phổ biến--}}

                <div class="col-12">
                    <div class="border-bottom border-default"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-sm">
        <div class="container">
            <div class="row justify-content-center">
                {{-- Start Tin tức gần đây--}}
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <h2 class="h5 section-title">Tin tức gần đây</h2>
                    @foreach ($postRecents as $post )
                        <article class="card mb-4">
                            <div class="row card-body">
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <div class="post-slider slider-sm">
                                        <img src="{{  Storage::url($post->image) }} "
                                            class="card-img" alt="post-thumb" style="height:200px; object-fit: cover;">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h3 class="h4 mb-3"><a class="post-title" href="{{ route('client.post', [$post->category->slug, $post->slug])  }}">{{ $post->title }}</a></h3>
                                    <ul class="card-meta list-inline">
                                        <li class="list-inline-item">
                                            <a href="" class="card-meta-author">
                                                <img src="{{ $post->author->image  }}"
                                                    alt="John Doe">
                                                <span>{{ $post->author->name }}</span>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <i class="ti-calendar"></i>{{ $post->created_at->format('d/m/Y') }}
                                        </li>
                                        <li class="list-inline-item">
                                            <i class="ti-eye"></i>{{  $post->views }}
                                        </li>
                                        <li class="list-inline-item">
                                            <ul class="card-meta-tag list-inline">
                                                @foreach ($post->tags as $tag)
                                                    <li class="list-inline-item"><a>{{ $tag->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                    <p>{!! Str::limit($post->description, 100) !!}</p>
                                    <a href="{{ route('client.post',[ $post->category->slug, $post->slug])  }}" class="btn btn-outline-primary">Đọc thêm</a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                    {{ $postRecents->links() }}



                </div>
                {{-- End Tin tức gần đây--}}
                <aside class="col-lg-4 @@sidebar">
                    <!-- Search -->
                    <div class="widget">
                        <h4 class="widget-title"><span>Tìm kiếm</span></h4>
                        <form  action="{{ route('client.search') }}" class="widget-search" method="get">
                            @csrf
                            <input class="mb-3" id="search-query" name="q" type="search"
                                placeholder="Tin tức hôm nay">
                            <i class="ti-search"></i>
                            <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
                        </form>
                    </div>
                    <!-- authors -->
                    <div class="widget widget-author">
                        <h4 class="widget-title">Tác giả</h4>
                        @foreach ($authors as $author )
                            <div class="media align-items-center">
                                <div class="mr-3">
                                    <img class="widget-author-image"
                                        src="{{ $author->image }}">
                                </div>
                                <div class="media-body">
                                    <h5 class="mb-1"><a class="post-title" href="">{{ $author->name }}</a></h5>
                                    <span>{{ $author->introduce }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <!-- categories -->
                    <div class="widget widget-categories">
                        <h4 class="widget-title"><span>Danh mục bài viết</span></h4>
                        <ul class="list-unstyled widget-list">
                            @foreach ( $categories as $ct )
                                <li><a href="{{ route('client.category.posts',$ct->slug) }}" class="d-flex">{{ $ct->name }} <small class="ml-auto">({{ $ct->total_post }})</small></a>
                                </li>
                            @endforeach

                        </ul>
                    </div>

                    <div class="widget">
                        <h4 class="widget-title"><span>Nhận thông báo bài viết mới</span></h4>
                        <form action="#"  name="mc-embedded-subscribe-form"
                            class="widget-search">
                            <input class="mb-3" id="search-query" name="s" type="search"
                                placeholder="Your Email Address">
                            <i class="ti-email"></i>
                            <button type="submit" class="btn btn-primary btn-block" name="subscribe">Theo dõi ngay</button>
                            <div style="position: absolute; left: -5000px;" aria-hidden="true">
                                <input type="text" name="b_463ee871f45d2d93748e77cad_a0a2c6d074" tabindex="-1">
                            </div>
                        </form>
                    </div>

                    <!-- Social -->
                    <div class="widget">
                        <h4 class="widget-title"><span>Liên kết mạng xã hội</span></h4>
                        <ul class="list-inline widget-social">
                            <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>
                        </ul>
                    </div>


                </aside>
            </div>
        </div>
    </section>

@endsection
