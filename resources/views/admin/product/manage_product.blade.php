@extends('dashboard.app')
@section('admin_content')
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('home') }}">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">product</a></li>
                <li><a href="javascript:avoid(0)">manage-product</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="row">
            <!--HORIZONTAL-->
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                @include('includes.message')
                <div class="panel b-primary bt-md">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-xs-6">
                                <h4>Product Add Form</h4>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a class="btn btn-primary " href="{{ route('add-product') }}">Add Product</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="basic-table" class="data-table table table-striped nowrap table-hover"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="row">ID</th>
                                                <th>Product Name</th>
                                                <th>image</th>
                                                <th>price</th>
                                                <th>Delivery Time</th>
                                                <th>Prepare Time</th>
                                                <th>status</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($getData as $item)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $item->product_name }}</td>
                                                    <td><img style="height: 60px; width:60px;"
                                                            src="{{ asset('/images/' . $item->product_image) }}" alt="">
                                                    </td>
                                                    <td>{{ $item->product_price }}</td>
                                                    <td>{{ $item->delivery_time }}</td>
                                                    <td>{{ $item->prepare_time }}</td>
                                                    <td>
                                                        <input type="checkbox" data-toggle="toggle" data-on="Active"
                                                            data-off="Inactive" id="productStatus"
                                                            data-id="{{ $item->product_id }}"
                                                            {{ $item->product_status == 0 ? 'checked' : '' }}>
                                                    </td>
                                                    <td>
                                                        @if ($item->product_status == 0)
                                                            <a href="{{ route('product-inactive', $item->product_id) }}"
                                                                class="btn btn-primary btn-xs"><i
                                                                    class="fa fa-thumbs-up"></i></a>
                                                        @else
                                                            <a href="{{ route('product-active', $item->product_id) }}"
                                                                class="btn btn-warning btn-xs"><i
                                                                    class="fa fa-thumbs-down"></i></a>
                                                        @endif

                                                        <a href="{{ route('edit-product', $item->product_id) }}"
                                                            class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
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
