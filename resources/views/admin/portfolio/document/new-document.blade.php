@extends('admin.layouts.app')

@section('bar-title')
Upload Document
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Add New Document</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Upload Document</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Document </h3>
                        {{-- <div class="text-right"> <a href="{{ route('portfolio.update') }}" class="btn btn-secondary
                        text-left" >Back</a>
                    </div> --}}
                </div>
                <div class="form-group">
                    <form id="doc-form" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                              
                                <div class="form-group">
                                    <label for="title">Document Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="title">
                                    <small id="title_error" class="form-text text-danger"></small>
                                </div>
                                <label for="image">Document </label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file"  name="file" class="custom-file-input">
                                        <label class="custom-file-label" for="exampleInputFile">Choose Your
                                            Document</label>
                                        </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                                <small id="file_error" class="form-text text-danger"></small>
                            </div>
                            <div>
                                <button id="doc-upload" class="btn btn-primary ">Upload</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    </div>

    </div>
    </div>
    </div>
    </div>
</section>


@endsection

@section('script')
    
<script>
    $(document).on('click', '#doc-upload' ,function(e) {
        e.preventDefault();
        
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#file_error').text('');
        $('#title_error').text('');

        var formData = new FormData($('#doc-form')[0]);

        $.ajax({
            type: 'POST',
            url: "{{route('document.store')}}",
            enctype: 'multipart/form-data',
            data:formData,
            processData: false,
            contentType: false,
            cache: false,
            
        success: function (data) {
            swal({
                title: "Added",
                text: "Document Uploaded Successfully!",
                type: "success",
                confirmButtonClass: 'btn-success',
                confirmButtonText: "Done"
                });

            $("#doc-form").trigger('reset');//to clear the form
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