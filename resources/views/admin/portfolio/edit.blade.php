@extends('admin.layouts.app')

@section('css')
<style>
    .thumb {
        width: 180px;
        border-radius: 40px;
        text-align: right
    }

    #thumb-output {
        text-align: right
    }
</style>
@endsection

@section('bar-title')
Edit | {{ $portfolio->name }} | Portfolio
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit : {{ $portfolio->name }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('portfolio.index') }}">Portfolios</a></li>
                    <li class="breadcrumb-item active">edit Portfolio</li>
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
                        <h3 class="card-title">Portfolio</h3>
                        {{-- <div class="text-right"> <a href="{{ route('portfolio.update') }}" class="btn btn-secondary
                        text-left" >Back</a>
                    </div> --}}
                </div>
                <div class="form-group">
                    <form id="portfolioFormUpdate" enctype="multipart/form-data">
                        @csrf
                        {{-- {{ method_field('PUT') }} --}}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Portfolio Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $portfolio->name }}"
                                    placeholder="Name">
                                <small id="name_error" class="form-text text-danger"></small>
                            </div>
                            <input type="hidden" name="portfolio_id" value="{{ $portfolio->id }}">
                            <div class="form-group">
                                <label for="name">Portfolio Description</label>
                                <textarea type="text" name="description" id="description" class="form-control"
                                    placeholder="Description">{{ $portfolio->description }}</textarea>
                                <small id="description_error" class="form-text text-danger"></small>
                            </div>
                            <div class="form-group">
                                <label for="image">Portfolio Image</label>
                               

                                <div id="thumb-output"></div><br>

                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" id="file-image"  name="image" class="custom-file-input">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                                <small id="image_error" class="form-text text-danger"></small>
                            </div>
                            <div>
                                <button id="portfolio_update" class="btn btn-primary ">Update</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

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
    $(document).on('click', '#portfolio_update' ,function(e) {
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
        
        var formData = new FormData($('#portfolioFormUpdate')[0]);

        $.ajax({
                type: 'POST',
                url: "{{route('portfolio.update')}}",
                enctype: 'multipart/form-data',
               data:formData,
                processData: false,
                contentType: false,
                cache: false,   

                success: function (data) {
                    swal({
                    title: "Added",
                    text: "Project Updated Successfully!",
                    type: "success",
                    confirmButtonClass: 'btn-success',
                    confirmButtonText: "Done "
                    });
                    var oTable = $('#portfolio').dataTable();
                    oTable.fnDraw(false);
                    // $("#portfolioFormUpdate").trigger("reset"); //to clear the form
                    },
               error: function (reject){
                var response = $.parseJSON(reject.responseText);
                $.each(response.errors, function (key, val) {
                $("#" + key + "_error").text(val[0]); //# معناها اختار لي اسم الايررور
                
                swal({
                    title: "error",
                    text: "There is Errors!",
                    type: "error",
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: "Done "
                    });
                              
                });
                },
                 
            });
    });
</script>
@endsection