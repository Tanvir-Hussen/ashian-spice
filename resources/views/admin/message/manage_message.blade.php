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
            <div class="col-sm-12 col-md-8 col-md-offset-2">
                @include('includes.message')
                <div class="panel b-primary bt-md">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-xs-6">
                                <h4>Product Add Form</h4>
                            </div>
                            <div class="col-xs-6 text-right">
                                <a class="btn btn-primary " href="{{ route('add-message') }}">Add Message</a>
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
                                                <th>Message</th>
                                                <th>Status</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($getHeroMessage as $item)
                                                <tr>


                                                    <td>{{ $i }}</td>
                                                    <td>{{ $item->message }}</td>
                                                    <td>
                                                        <input type="checkbox" checked="checked">
                                                    </td>
                                                    <td>
                                                        <a href="" class="btn btn-primary btn-xs"><i
                                                                class="fa fa-thumbs-up"></i></a>
                                                        <a href="" id="delete-alert" class="btn btn-danger btn-xs"><i
                                                                class="fa fa-trash-o"></i></a>
                                                        <a href="" class="btn btn-warning btn-xs"><i
                                                                class="fa fa-pencil"></i></a>
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
