@extends('admin.layouts.app')

@section('bar-title')
Show Document
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Show Document</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Upload Document</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Document</h3>
                        <div class="text-right"></div>
                    </div>
                    <div class="card-body">
                        <table id="portfolio" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Title</th>
                                    <th>User</th>
                                    <th>File</th>
                                    <th>Download</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($document as $doc)

                                <tr class="documentRow{{$doc->id}}">
                                    <td>{{ $doc->id}}</td>
                                    <td>{{ $doc->title}}</td>
                                    <td>{{ $doc->user->name}}</td>
                                    <td><a href="{{ route('document.view',['id' => $doc->id ]) }}">{{ $doc->file }}</a>
                                    </td>
                                    <td><a href="{{ route('document.download',['file' => $doc->file ]) }}">Download</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('document.edit',['id' => $doc->id]) }}"
                                            class="btn btn-secondary">Edit</a>
                                        <a href="" class="btn btn-danger delete_btn" document_id="{{ $doc->id }}"
                                            document_title={{ $doc->title }}>Delete</a>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                            <tfoot>
                                <th>id</th>
                                <th>Title</th>
                                <th>User</th>
                                <th>File</th>
                                <th>Download</th>
                                <th>Action</th>
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
@endsection


@section('script')

<script>
    $(document).on('click', '.delete_btn' ,function(e) {
        e.preventDefault();

            var document_id = $(this).attr('document_id');
            var document_title = $(this).attr('document_title');
      
            swal({
            title: "Are You Sure",
            text: "Are You Sure Delete ! " + document_title + " Document",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: 'btn-danger',
            confirmButtonText: 'Yes Delete',
            closeOnConfirm: false,
            closeOnCancel: true,
            cancelButtonText: "Not Now"
            },
            function () {
            $.ajax({
                    type: 'post',
                    url: "{{route('document.delete')}}",
                    data: {
                        '_token' : "{{ csrf_token() }}",
                        'id' : document_id,
                    },

                success: function (data) {
                  swal({
                title: "Deleted",
                text: "Project Deleted Successfully!",
                type: "success",
                confirmButtonClass: 'btn-success',
                confirmButtonText: "Done "
                });

                   $('.documentRow'+ data.id).remove();
                },
                error: function (data) {
                    swal({
                    title: "error",
                    text: "There is Errors!",
                    type: "error",
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: "Done "
                    });
                },
        });
        });
    });
</script>
@endsection