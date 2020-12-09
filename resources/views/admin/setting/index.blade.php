@extends('admin.layouts.app')

@section('bar-title')
Settings
@endsection

@section('css')
    <style>
        #img{
            border-radius: 30px;
        }
    </style>
@endsection

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Settings</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Settings</li>
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
                        <h3 class="card-title">Settings</h3>
                        <div class="text-right"></div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Site Title</th>
                                    <th>Job Title</th>
                                    <th>Image</th>
                                    <th>Location</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($settings as $setting)

                                <tr>
                                    <td>{{ $setting->id}}</td>
                                    <td>{{ $setting->site_title}}</td>
                                    <td>{{ $setting->job_title}}</td>
                                    <td><a href="{{asset('images/settings/') .'/' .$setting->image}}" target="_blank"><img  width="100px" height="100px" id="img" src="{{ asset('images/settings/'. $setting->image) }}" ></td>
                                    <td>{!! $setting->location !!}</td>
                                    <td><a href="{{ route('setting.edit',['id' => $setting->id]) }}" class="btn btn-success">Edit</a></td>
                                </tr>

                                @endforeach
                            </tbody>
                            <tfoot>
                                <th>id</th>
                                <th>Site Title</th>
                                <th>Job Title</th>
                                <th>Image</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tfoot>
                        </table>
                    </div>
                
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</section>

@endsection