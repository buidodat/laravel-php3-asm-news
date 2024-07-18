@extends('clients.layouts.master')

@section('banner')
    @include('clients.layouts.banner')
@endsection

@section('title')
    Báo Reader | Tin tức Việt Nam và Quốc tế
@endsection


@section('content')

    <section class="section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <h2 class="h5 section-title">Tin nóng </h2>
                    <article class="card">
                        <div class="post-slider slider-sm">
                            <img src="{{  $postHot->image }}"
                                class="card-img-top" alt="post-thumb" style="height:235px; object-fit: cover;">
                        </div>

                        <div class="card-body">
                            <h3 class="h4 mb-3"><a class="post-title" href="{{ route('client.post', $postHot->id)  }}">{{ $postHot->title }}</a></h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="" class="card-meta-author">
                                        <img src="{{ env('APP_URL') . '/theme/clients/' }}images/john-doe.jpg">
                                        <span>{{ $postHot->author->name }}</span>
                                    </a>
                                </li>
                                {{-- <li class="list-inline-item">
                                    <i class="ti-timer"></i>2 Min To Read
                                </li> --}}
                                <li class="list-inline-item">
                                    <i class="ti-calendar"></i>{{ $postHot->created_at->format('d/m/Y') }}
                                </li>
                                {{-- <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">
                                        <li class="list-inline-item"><a href="tags.html">Color</a></li>
                                        <li class="list-inline-item"><a href="tags.html">Recipe</a></li>
                                        <li class="list-inline-item"><a href="tags.html">Fish</a></li>
                                    </ul>
                                </li> --}}
                            </ul>
                            <p>{{ Str::limit($postHot->content, 100) }}</p>
                            <a href="{{ route('client.post', $postHot->id)  }}" class="btn btn-outline-primary">Đọc thêm</a>
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
                                    src="{{  $item->image }}">
                                <div class="ml-3">
                                    <h4><a href="{{ route('client.post', $item->id)  }}" class="post-title">{{ $item->title }}</a>
                                    </h4>
                                    <ul class="card-meta list-inline mb-0">
                                        <li class="list-inline-item mb-0">
                                            <i class="ti-calendar"></i>{{ $item->created_at->format('d/m/Y') }}
                                        </li>
                                        {{-- <li class="list-inline-item mb-0">
                                            <i class="ti-timer"></i>2 Min To Read
                                        </li> --}}
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
                            <img src="{{  $postPopular->image }}"
                                class="card-img-top" alt="post-thumb" style="height:235px; object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <h3 class="h4 mb-3"><a class="post-title" href="{{ route('client.post', $postPopular->id)  }}">{{ $postPopular->title }}</a></h3>
                            <ul class="card-meta list-inline">
                                <li class="list-inline-item">
                                    <a href="author-single.html" class="card-meta-author">
                                        <img src="{{ env('APP_URL') . '/theme/clients/' }}images/kate-stone.jpg"
                                            alt="Kate Stone">
                                        <span>{{ $postPopular->author->name }}</span>
                                    </a>
                                </li>
                                {{-- <li class="list-inline-item">
                                    <i class="ti-timer"></i>2 Min To Read
                                </li> --}}
                                <li class="list-inline-item">
                                    <i class="ti-calendar"></i>{{ $postPopular->created_at->format('d/m/Y') }}
                                </li>
                                {{-- <li class="list-inline-item">
                                    <ul class="card-meta-tag list-inline">
                                        <li class="list-inline-item"><a href="tags.html">City</a></li>
                                        <li class="list-inline-item"><a href="tags.html">Food</a></li>
                                        <li class="list-inline-item"><a href="tags.html">Taste</a></li>
                                    </ul>
                                </li> --}}
                            </ul>
                            <p>{{ Str::limit($postPopular->content, 100) }}</p>
                            <a href="{{ route('client.post', $postPopular->id)  }}" class="btn btn-outline-primary">Đọc thêm</a>
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
                                        <img src="{{  $post->image }} "
                                            class="card-img" alt="post-thumb" style="height:200px; object-fit: cover;">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h3 class="h4 mb-3"><a class="post-title" href="{{ route('client.post', $post->id)  }}">{{ $post->title }}</a></h3>
                                    <ul class="card-meta list-inline">
                                        <li class="list-inline-item">
                                            <a href="author-single.html" class="card-meta-author">
                                                <img src="{{ env('APP_URL') . '/theme/clients/' }}images/john-doe.jpg"
                                                    alt="John Doe">
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
                                    <p>{{ Str::limit($post->content, 100) }}</p>
                                    <a href="{{ route('client.post', $post->id)  }}" class="btn btn-outline-primary">Đọc thêm</a>
                                </div>
                            </div>
                        </article>
                    @endforeach


                    <ul class="pagination justify-content-center">
                        <li class="page-item page-item active ">
                            <a href="#!" class="page-link">1</a>
                        </li>
                        <li class="page-item">
                            <a href="#!" class="page-link">2</a>
                        </li>
                        <li class="page-item">
                            <a href="#!" class="page-link">&raquo;</a>
                        </li>
                    </ul>
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

                    {{-- <!-- about me -->
                    <div class="widget widget-about">
                        <h4 class="widget-title">Hi, I am Alex!</h4>
                        <img class="img-fluid" src="{{ env('APP_URL') . '/theme/clients/' }}images/author.jpg"
                            alt="Themefisher">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vel in in donec iaculis tempus odio
                            nunc laoreet . Libero ullamcorper.</p>
                        <ul class="list-inline social-icons mb-3">

                            <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>

                            <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>

                            <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>

                            <li class="list-inline-item"><a href="#"><i class="ti-github"></i></a></li>

                            <li class="list-inline-item"><a href="#"><i class="ti-youtube"></i></a></li>

                        </ul>
                        <a href="about-me.html" class="btn btn-primary mb-2">About me</a>
                    </div>

                    <!-- Promotion -->
                    <div class="promotion">
                        <img src="{{ env('APP_URL') . '/theme/clients/' }}images/promotion.jpg"
                            class="img-fluid w-100">
                        <div class="promotion-content">
                            <h5 class="text-white mb-3">Create Stunning Website!!</h5>
                            <p class="text-white mb-4">Lorem ipsum dolor sit amet, consectetur sociis. Etiam nunc amet
                                id dignissim. Feugiat id tempor vel sit ornare turpis posuere.</p>
                            <a href="https://themefisher.com/" class="btn btn-primary">Get Started</a>
                        </div>
                    </div> --}}

                    <!-- authors -->
                    {{-- <div class="widget widget-author">
                        <h4 class="widget-title">Tác giả</h4>
                        <div class="media align-items-center">
                            <div class="mr-3">
                                <img class="widget-author-image"
                                    src="{{ env('APP_URL') . '/theme/clients/' }}images/john-doe.jpg">
                            </div>
                            <div class="media-body">
                                <h5 class="mb-1"><a class="post-title" href="author-single.html">Charls Xaviar</a>
                                </h5>
                                <span>Author &amp; developer of Bexer, Biztrox theme</span>
                            </div>
                        </div>
                        <div class="media align-items-center">
                            <div class="mr-3">
                                <img class="widget-author-image"
                                    src="{{ env('APP_URL') . '/theme/clients/' }}images/kate-stone.jpg">
                            </div>
                            <div class="media-body">
                                <h5 class="mb-1"><a class="post-title" href="author-single.html">Kate Stone</a>
                                </h5>
                                <span>Author &amp; developer of Bexer, Biztrox theme</span>
                            </div>
                        </div>
                        <div class="media align-items-center">
                            <div class="mr-3">
                                <img class="widget-author-image"
                                    src="{{ env('APP_URL') . '/theme/clients/' }}images/john-doe.jpg" alt="John Doe">
                            </div>
                            <div class="media-body">
                                <h5 class="mb-1"><a class="post-title" href="author-single.html">John Doe</a></h5>
                                <span>Author &amp; developer of Bexer, Biztrox theme</span>
                            </div>
                        </div>
                    </div> --}}


                    <!-- categories -->
                    <div class="widget widget-categories">
                        <h4 class="widget-title"><span>Danh mục bài viết</span></h4>
                        <ul class="list-unstyled widget-list">
                            @foreach ( $categories as $ct )
                                <li><a href="{{ route('client.category.posts',$ct->id) }}" class="d-flex">{{ $ct->name }} <small class="ml-auto">({{ $ct->total_post }})</small></a>
                                </li>
                            @endforeach

                        </ul>
                    </div><!-- tags -->
                    {{-- <div class="widget">
                        <h4 class="widget-title"><span>Tags</span></h4>
                        <ul class="list-inline widget-list-inline widget-card">
                            <li class="list-inline-item"><a href="tags.html">City</a></li>
                            <li class="list-inline-item"><a href="tags.html">Color</a></li>
                            <li class="list-inline-item"><a href="tags.html">Creative</a></li>
                            <li class="list-inline-item"><a href="tags.html">Decorate</a></li>
                            <li class="list-inline-item"><a href="tags.html">Demo</a></li>
                            <li class="list-inline-item"><a href="tags.html">Elements</a></li>
                            <li class="list-inline-item"><a href="tags.html">Fish</a></li>
                            <li class="list-inline-item"><a href="tags.html">Food</a></li>
                            <li class="list-inline-item"><a href="tags.html">Nice</a></li>
                            <li class="list-inline-item"><a href="tags.html">Recipe</a></li>
                            <li class="list-inline-item"><a href="tags.html">Season</a></li>
                            <li class="list-inline-item"><a href="tags.html">Taste</a></li>
                            <li class="list-inline-item"><a href="tags.html">Tasty</a></li>
                            <li class="list-inline-item"><a href="tags.html">Vlog</a></li>
                            <li class="list-inline-item"><a href="tags.html">Wow</a></li>
                        </ul>
                    </div><!-- recent post --> --}}
                    {{-- <div class="widget">
                        <h4 class="widget-title">Recent Post</h4>

                        <!-- post-item -->
                        <article class="widget-card">
                            <div class="d-flex">
                                <img class="card-img-sm"
                                    src="{{ env('APP_URL') . '/theme/clients/' }}images/post/post-10.jpg">
                                <div class="ml-3">
                                    <h5><a class="post-title" href="post/elements/">Elements That You Can Use In This
                                            Template.</a></h5>
                                    <ul class="card-meta list-inline mb-0">
                                        <li class="list-inline-item mb-0">
                                            <i class="ti-calendar"></i>15 jan, 2020
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </article>

                        <article class="widget-card">
                            <div class="d-flex">
                                <img class="card-img-sm"
                                    src="{{ env('APP_URL') . '/theme/clients/' }}images/post/post-3.jpg">
                                <div class="ml-3">
                                    <h5><a class="post-title" href="post-details.html">Advice From a Twenty
                                            Something</a></h5>
                                    <ul class="card-meta list-inline mb-0">
                                        <li class="list-inline-item mb-0">
                                            <i class="ti-calendar"></i>14 jan, 2020
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </article>

                        <article class="widget-card">
                            <div class="d-flex">
                                <img class="card-img-sm"
                                    src="{{ env('APP_URL') . '/theme/clients/' }}images/post/post-7.jpg">
                                <div class="ml-3">
                                    <h5><a class="post-title" href="post-details.html">Advice From a Twenty
                                            Something</a></h5>
                                    <ul class="card-meta list-inline mb-0">
                                        <li class="list-inline-item mb-0">
                                            <i class="ti-calendar"></i>14 jan, 2020
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div> --}}

                    <!-- Never Miss A New -->

                    <div class="widget">
                        <h4 class="widget-title"><span>Nhận thông báo bài viết mới</span></h4>
                        <form action="#!" method="post" name="mc-embedded-subscribe-form" target="_blank"
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
