@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',[
        'name'=>'Danh mục sản phẩm',
        'key'=> 'Edit'
    ])
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-10 m-5">
                        <form method="post" action="{{route ('product_categories.update',[$productcate->id])}}" >
                            @csrf
                            <div class="alert alert-dark" role="alert">
                                Thông tin chính
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tên</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Tên danh mục" name="name_vie" value="{{$productcate->name_vie}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Danh mục cha</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="parent_id">
                                        <option value="0">Chọn danh mục cha</option>
                                        {!!$htmlOption!!}
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Mô tả ngắn</label>
                                <textarea class="form-control col-md-10" rows="3" name="introduction_vie" >{!! $productcate->introduction_vie !!}</textarea>
                            </div>
                            <div class="alert alert-dark" role="alert">
                                Hiển thị
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Hiển thị trang chủ</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="home_page" value="{{$productcate->home_page}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kích hoạt</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="active" value="{{$productcate->active}}" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Sắp xếp</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Thứ tự sắp xếp" name="order" value="{{$productcate->order}}">
                                </div>
                            </div>
                            <div class="alert alert-dark" role="alert">
                                SEO information
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Title SEO</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Title SEO" name="title" value="{{$productcate->title}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" data-placeholder="https://domain.com/ULR-MAU.">URL SEO</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="ULR-MAU." name="slug" value="{{$productcate->slug}}">
                                    <small class="form-text text-muted">https://domain.com/ULR-MAU.</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Description</label>
                                <textarea class="form-control col-md-10" rows="3" name="description" value="{{$productcate->description}}"></textarea>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Keyword</label>
                                <textarea class="form-control col-md-10" rows="3" name="keyword" value="{{$productcate->keyword}}"></textarea>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
