@php
    $categories = DB::table('categories')
        ->where('is_active',1)
        ->orderBy('name','asc')
        ->get();
@endphp

<header class="navigation fixed-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-white">
            <a class="navbar-brand order-1" href="{{ route('client') }}">
                <img class="img-fluid" width="100px" src="{{ env('APP_URL') . '/theme/clients/' }}images/logo.png"
                    alt="">
            </a>
            <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('client') }}" >
                            Trang chủ
                        </a>
                    </li>
                    @foreach ( $categories as $item )
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('client.category.posts', $item->slug) }}" >
                                {{ $item->name }}
                            </a>
                        </li>
                    @endforeach

            </div>

            <div class="order-2 order-lg-3 d-flex align-items-center">


                <!-- search -->
                <form  action="{{ route('client.search') }}" class="search-bar" method="get">
                    @csrf
                    <input id="search-query" name="q" type="search"
                        placeholder="Tin tức hôm nay...">
                </form>

                <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse"
                    data-target="#navigation">
                    <i class="ti-menu"></i>
                </button>
            </div>

        </nav>
    </div>
</header>
