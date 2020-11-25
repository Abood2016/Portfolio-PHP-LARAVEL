@extends('admin.layouts.app')

@section('bar-title')
Setting
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Setting</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">edit Setting</li>
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
                        <h3 class="card-title">Setting</h3>
                    </div>
                    <div class="form-group">
                        <form id="SetttingFormUpdate" enctype="multipart/form-data">
                            @csrf
                            {{-- {{ method_field('PUT') }} --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="site_title">Title</label>
                                    <input type="text" name="site_title" class="form-control"
                                        value="{{ $setting->site_title }}" placeholder="Name">
                                    <small id="site_title_error" class="form-text text-danger"></small>
                                </div>
                                <input type="hidden" name="setting_id" value="{{ $setting->id }}">

                                <div class="form-group">
                                    <label for="job_title">Job Title</label>
                                    <input type="text" name="job_title" class="form-control"
                                        value="{{ $setting->job_title }}">
                                    <small id="job_title_error" class="form-text text-danger"></small>
                                </div>

                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" name="location" class="form-control"
                                        value="{{ $setting->location }}">
                                    <small id="location_error" class="form-text text-danger"></small>
                                </div>

                                <div class="form-group">
                                    <label for="twitter_url">Twitter</label>
                                    <input type="text" name="twitter_url" class="form-control"
                                        value="{{ $setting->twitter_url }}">
                                    <small id="twitter_url_error" class="form-text text-danger"></small>
                                </div>

                                <div class="form-group">
                                    <label for="linkdin_url">Linkdin</label>
                                    <input type="text" name="linkdin_url" class="form-control"
                                        value="{{ $setting->linkdin_url }}">
                                    <small id="linkdin_url_error" class="form-text text-danger"></small>
                                </div>

                                <div class="form-group">
                                    <label for="facebook_url">Facebook</label>
                                    <input type="text" name="facebook_url" class="form-control"
                                        value="{{ $setting->facebook_url }}">
                                    <small id="facebook_url_error" class="form-text text-danger"></small>
                                </div>

                                <div class="form-group">
                                    <label for="about">About</label>
                                    <textarea type="text" name="about" cols="10" rows="5"
                                        class="form-control" id="description">{{ $setting->about }}</textarea>
                                    <small id="about_error" class="form-text text-danger"></small>
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>

                                    <div id="thumb-output"></div><br>

                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
                                    <small id="image_error" class="form-text text-danger"></small>
                                </div>
                                <div>
                                <button id="setting_update" class="btn btn-primary ">Update</button>
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
    $(document).on('click', '#setting_update' ,function(e) {
     e.preventDefault();
    
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        
    
        $('#site_title_error').text('');
        $('#job_titl_error').text('');

        var formData = new FormData($('#SetttingFormUpdate')[0]);

        $.ajax({
                type: 'POST',
                url: "{{route('setting.update')}}",
                enctype: 'multipart/form-data',
               data:formData,
                processData: false,
                contentType: false,
                cache: false,   

                success: function (data) {
                    swal({
                    title: "Added",
                    text: "Setting Updated Successfully!",
                    type: "success",
                    confirmButtonClass: 'btn-success',
                    confirmButtonText: "Done "
                    });
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