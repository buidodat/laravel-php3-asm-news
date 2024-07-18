@extends('clients.layouts.master')



@section('title')
    Báo Reader | Không tìm thấy kết quả này
@endsection


@section('content')

<section class="section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 mb-4">
          <h1 class="h2 mb-4">Tìm kiếm kết quả cho:
            <mark></mark>
          </h1>
        </div>
        <div class="col-lg-10 text-center">
          <img class="mb-5" src="{{ asset('theme/clients/images/no-search-found.svg') }}" alt="">
          <h3>Không tìm thấy kết quả</h3>
        </div>
      </div>
    </div>
  </section>

@endsection

