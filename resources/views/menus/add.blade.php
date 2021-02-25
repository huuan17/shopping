@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('partials.content-header',[
    'name'=>'menus',
    'key'=> 'Add'
])
    <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-10 m-5">
                        <form method="post" action="{{route ('menus.store')}}" >
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Loại</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="type" onchange="myFunction()" id="selectType">
                                        <option value="1">Danh mục sản phẩm</option>
                                        <option value="2">Danh mục bài viết</option>
                                        <option value="3">Page</option>
                                        <option value="4">Custorm link</option>
                                        {{--{!!$htmlOption!!}--}}
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row" id="typeProduct">
                                <label class="col-sm-2 col-form-label">Danh mục sản phẩm</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="childpro">
                                        <option value="0">Chọn danh mục</option>
                                        {!!$optionSelect_cp!!}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" id="typePost" hidden>
                                <label class="col-sm-2 col-form-label">Danh mục bài viết</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="childpost">
                                        <option value="0">Chọn danh mục</option>
                                        {!!$optionSelect_cp!!}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" id="typePage" hidden>
                                <label class="col-sm-2 col-form-label">Page</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="childpage">
                                        <option value="0">Chọn danh mục</option>
                                        {!!$optionSelect_cp!!}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" id="typeClink" hidden>
                                <label class="col-sm-2 col-form-label">Custorm Link</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Link liên kết" name="clink">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tên</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Tên danh mục" name="name_vie">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Danh mục cha</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="parent_id">
                                        <option value="0">Chọn danh mục cha</option>
                                        {!!$optionSelect!!}
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kích hoạt</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="active" value="1" >
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nofollow</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="mega" value="1">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Sắp xếp</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Thứ tự sắp xếp" name="order">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label"></label>
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
    <script>
        function myFunction() {
            var e = document.getElementById("selectType");
            var x = e.value;
            if (x == 1) {
                document.getElementById("typeProduct").removeAttribute('hidden');
                document.getElementById("typePost").setAttribute('hidden','');
                document.getElementById("typePage").setAttribute('hidden','');
                document.getElementById("typeClink").setAttribute('hidden','');
            }
            if (x == 2) {
                document.getElementById("typeProduct").setAttribute('hidden','');
                document.getElementById("typePost").removeAttribute('hidden');
                document.getElementById("typePage").setAttribute('hidden','');
                document.getElementById("typeClink").setAttribute('hidden','');
            }
            if (x == 3) {
                document.getElementById("typeProduct").setAttribute('hidden','');
                document.getElementById("typePost").setAttribute('hidden','');
                document.getElementById("typePage").removeAttribute('hidden');
                document.getElementById("typeClink").setAttribute('hidden','');
            }
            if (x == 4) {
                document.getElementById("typeProduct").setAttribute('hidden','');
                document.getElementById("typePost").setAttribute('hidden','');
                document.getElementById("typePage").setAttribute('hidden','');
                document.getElementById("typeClink").removeAttribute('hidden');
            }

        }
    </script>
@endsection
