@extends('dashboard.app')
@section('admin_content')
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('home') }}">Dashboard</a></li>
                <li><a href="{{ route('home') }}">category</a></li>
                <li><a href="{{ route('home') }}">edit-category</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="row">
            <!--HORIZONTAL-->
            <div class="col-sm-12 col-md-8 col-md-offset-2">
                @include('includes.message')
                <div class="panel b-primary bt-md">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-xs-6">
                                <h4>Category Edit Form</h4>
                            </div>
                        </div>
                        @foreach ($category_edit as $item)
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-horizontal" method="post"
                                        action="{{ route('update-category', $item->category_id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="category_name" class="col-sm-3 control-label">Category Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="cat_name"
                                                    value="{{ $item->category_name }}" id="email2"
                                                    placeholder="category name">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="textarea" class="col-sm-3 control-label">Categpry
                                                Description</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                    name="cat_des" rows="3">{{ $item->cat_des }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <p></p>

                                            <label for="category_name" class="col-sm-3 control-label">Old Image: </label>
                                            <div class="col-sm-9">
                                                <img style="height: 60px; width:60px;"
                                                    src="{{ asset('/images/' . $item->cat_image) }}" alt="">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="category_name" class="col-sm-3 control-label">Category Image</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" name="cat_image" id="email2"
                                                    value="{{ old('category_image') }}">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Update Category</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        @endforeach
                    </div>
                </div>
            </div>
            <!--STRIPE-->
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

@endsection
