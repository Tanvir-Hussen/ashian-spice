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
                                <h4>Product Edit Form</h4>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @foreach ($product_info as $item)
                                    <form class="form-horizontal" method="post"
                                        action="{{ route('update-product', $item->product_id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        {{-- <div class="form-group">
                                            <label for="category" class="col-sm-3 control-label">Category</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="cat_id" id="category">
                                                    <option value="">Select Category</option>
                                                    @foreach ($category_data as $item)
                                                        <option value="{{ $item->category_id }}">
                                                            {{ ucwords($item->category_name) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="category_name" class="col-sm-3 control-label">Product Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="product_name"
                                                    value="{{ $item->product_name }}" id="email2"
                                                    placeholder="product name">
                                                @error('product_name')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="textarea" class="col-sm-3 control-label">Short Description</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                    name="product_des" rows="3">{{ $item->product_des }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="textarea" class="col-sm-3 control-label">Long Description</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="exampleFormControlTextarea1"
                                                    name="product_long_des"
                                                    rows="3">{{ $item->product_long_des }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="category_name" class="col-sm-3 control-label">Prepare Time</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="prepare_time"
                                                    value="{{ $item->prepare_time }}" id="email2"
                                                    placeholder="prepare time">
                                                @error('prepare_time')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="category_name" class="col-sm-3 control-label">Delivery Time</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="delivery_time"
                                                    value="{{ $item->delivery_time }}" id="email2"
                                                    placeholder="delivery time">
                                                @error('delivery_time')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="category_name" class="col-sm-3 control-label">Product Price</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="product_price"
                                                    value="{{ $item->product_price }}" id="email2"
                                                    placeholder="product price">
                                                @error('product_price')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="category_name" class="col-sm-3 control-label">Old image:</label>
                                            <div class="col-sm-9">
                                                <img style="height: 60px; width:60px;"
                                                    src="{{ asset('/images/' . $item->product_image) }}" alt="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="category_name" class="col-sm-3 control-label">Product Image</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" name="product_image" id="email2"
                                                    value="{{ old('product_image') }}">
                                                @error('product_image')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Save Product</button>
                                            </div>
                                        </div>
                                    </form>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--STRIPE-->
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

@endsection
