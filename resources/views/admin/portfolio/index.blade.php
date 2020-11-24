@extends('admin.layouts.app')

@section('bar-title')
Portfolio
@endsection

@section('css')
<style>
    .thumb {
        width: 180px;
        border-radius: 40px;
    }
</style>
@endsection

@section('title')
Portfolio
@endsection

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">@yield('title')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Portfolios</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Portfolios</h3>
                        <div class="text-right"> <button class="btn btn-success text-left" data-toggle="modal"
                                data-target="#add_new_project">Add New Project</button></div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="portfolio" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>description</th>
                                    <th>User</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <th>id</th>
                                <th>Name</th>
                                <th>description</th>
                                <th>User</th>
                                <th>Date</th>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>


<!-- Modal -->
<div class="modal fade" id="add_new_project" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Porject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form id="projectForm" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Portfolio Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                            <small id="name_error" class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                            <label for="description">Portfolio Description</label>
                            <textarea type="text" name="description" id="description" class="form-control"></textarea>
                            <small id="description_error" class="form-text text-danger"></small>
                        </div>
                        <div class="form-group">
                                    <label for="image">Portfolio Image</label>
                                
                                    <div id="thumb-output"></div><br>
                                
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" id="file-image" name="image" class="custom-file-input">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                    <small id="image_error" class="form-text text-danger"></small>
                                </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="project_save" class="btn btn-primary">Save changes</button>
                <form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script>
    $(document).ready(function() {
        var SITEURL = '{{URL::to('')}}';
        var table = $('#portfolio');
        var datatable = table.DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
        serverSide: true,

        ajax: {
            url: SITEURL + "/admin/portfolio/",
            type: 'GET'
        },
            columns: [
                { data: 'id', name: 'id'},
                { data: 'name', name: 'name',class:'post_item'},
                { data: 'description', name: 'description' },
                { data: 'user', name: 'user' },
                { data: 'created_at', name: 'created_at' },
            ]
        });
        // table.on('draw.dt', function () {
        // $('.dataTables_scrollBody', '#datatable_wrapper').jScrollPane().data().jsp.destroy();
        // $('.dataTables_scrollBody', '#datatable_wrapper').jScrollPane();
        // });

 });
</script>

<script>
    $(document).on('click', '#project_save' ,function(e) {
        e.preventDefault();
        
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        var table = $('#portfolio').DataTable();

        $('#name_error').text('');
        $('#description_error').text('');
        $('#image_error').text('');

        var formData = new FormData($('#projectForm')[0]);

        $.ajax({
            type: 'POST',
            url: "{{route('portfolio.store')}}",
            enctype: 'multipart/form-data',
            data:formData,
            processData: false,
            contentType: false,
            cache: false,
            
        success: function (data) {
            swal({
                title: "Added",
                text: "Project Added Successfully!",
                type: "success",
                confirmButtonClass: 'btn-success',
                confirmButtonText: "Done "
                });

            var oTable = $('#portfolio').dataTable();
            oTable.fnDraw(false);
            $("#add_new_project").modal('hide');
            $("#projectForm").trigger('reset');//to clear the form
        },
        error: function (reject){
            var response = $.parseJSON(reject.responseText);
            $.each(response.errors, function (key, val) {
            $("#" + key + "_error").text(val[0]); //# معناها اختار لي اسم الايررور
            });
           },
        
   });
});
</script>
@endsection