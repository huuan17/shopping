@extends('layouts.admin')
@section('title')
    <title>Trang chủ</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name'=>'product_category', 'key'=> 'List'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('product_categories.create')}}" class="btn btn-success m-2 float-right">Add</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($productcategories as $pcategory)
                            <tr>
                                <th scope="row">{{$pcategory->id}}</th>
                                <td>{{$pcategory->name_vie}}</td>
                                <td>
                                    <a href="{{route('product_categories.edit',['id'=> $pcategory->id])}}" class="btn-default">Edit</a>
                                    <a href="{{route('product_categories.delete',['id'=> $pcategory->id])}}" class="btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{$productcategories->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


