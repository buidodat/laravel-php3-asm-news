@extends('admin.layouts.master')

@section('title')
    Chi tiết danh mục
@endsection

@section('content')

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Chi tiết danh mục</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Basic Elements</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <!-- thông tin -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thông tin danh mục</h4>

                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Tên danh mục</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" disabled>
                                        @error("name")
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Slug</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $category->slug }}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Hình ảnh</label> <br>
                                        @if($category->image && Storage::exists("$category->image"))
                                             <img src="{{ Storage::url("$category->image") }}" alt="" width="110">
                                        @endif

                                    </div>
                                    <div class="mb-3">
                                        <label class="form-check-label" for="is_hot_deal">Is Active</label>
                                        <div class="form-check form-switch form-switch-danger">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="is_active" disabled @if($category->is_active==1)
                                                checked
                                            @endif>
                                        </div>
                                    </div>
                                    <div >
                                        <a href="{{ route('admin.categories.index') }}" class="btn btn-success">Trở về</a>
                                    </div>
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>

@endsection

