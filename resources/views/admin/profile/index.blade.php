@extends('admin.layouts.app')

@section('bar-title')
Your Profile
@endsection

@section('content')

  <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Welcome {{ auth()->user()->name }}</h1>
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
                        <h3 class="card-title">Edit Profile</h3>
                    </div>
                    <div class="form-group">
                        <form id="ProfileFormUpdate">
                            @csrf
                            {{-- {{ method_field('PUT') }} --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="site_title">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}"
                                        placeholder="Name">
                                    <small id="name_error" class="form-text text-danger"></small>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                    <small id="email_error" class="form-text text-danger"></small>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control">
                                </div>

                                <div>
                                    <button id="profile_update" class="btn btn-primary ">Update</button>
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
        $(document).on('click', '#profile_update' ,function(e) {
         e.preventDefault();
        
            $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            
        
            $('#name_error').text('');
            $('#email_error').text('');
    
            var formData = new FormData($('#ProfileFormUpdate')[0]);
    
            $.ajax({
                    type: 'POST',
                    url: "{{route('profile.update')}}",
                    data:formData,
                    processData: false,
                    contentType: false,
                    cache: false,   
    
                    success: function (data) {
                        swal({
                        title: "Added",
                        text: "Profile Updated Successfully!",
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