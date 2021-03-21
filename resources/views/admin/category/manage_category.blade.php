@extends('dashboard.app')
@section('admin_content')
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('home') }}">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">category</a></li>
                <li><a href="javascript:avoid(0)">manage-category</a></li>

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
                                <h4>Category Add Form</h4>
                            </div>
                            <div class="col-xs-6 text-right">
                                <button onclick="addForm()" type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal" data-whatever="@mdo">Add Category</button>

                            </div>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <label for="name" class="col-form-label">Category Name:</label>
                                                    <input type="text" class="form-control" id="name" name="category_name"
                                                        placeholder="Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Description:</label>
                                                    <textarea class="form-control" id="message-text"
                                                        name="cat_des"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="image" class="col-form-label">Category Image:</label>
                                                    <input type="file" class="form-control" id="image" name="image"
                                                        required>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" id="insertbutton">Send
                                                        message</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
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
                                                <th>Name</th>
                                                <th>description</th>
                                                <th>image</th>
                                                <th>status</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($getData as $item)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $item->category_name }}</td>
                                                    <td>{{ $item->cat_des }}</td>
                                                    <td><img style="height: 60px; width:60px;"
                                                            src="{{ asset('/images/' . $item->cat_image) }}" alt=""></td>
                                                    <td>
                                                        <input type="checkbox" data-toggle="toggle" data-on="Active"
                                                            data-off="Inactive" id="categoryStatus"
                                                            data-id="{{ $item->category_id }}"
                                                            {{ $item->status == 0 ? 'checked' : '' }}>
                                                    </td>
                                                    <td>
                                                        @if ($item->status == 0)
                                                            <a href="{{ route('inactive-category', $item->category_id) }}"
                                                                class="btn btn-primary btn-xs"><i
                                                                    class="fa fa-thumbs-up"></i></a>
                                                        @else
                                                            <a href="{{ route('active-category', $item->category_id) }}"
                                                                class="btn btn-warning btn-xs"><i
                                                                    class="fa fa-thumbs-down"></i></a>
                                                        @endif
                                                        <a href="{{ route('edit-category', $item->category_id) }}"
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
