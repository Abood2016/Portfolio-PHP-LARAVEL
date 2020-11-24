@extends('admin.layouts.app')


@section('bar-title')
    Portfolio | Details
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
                    <li class="breadcrumb-item"><a href="{{ route('portfolio.index') }}">Portfolio</a></li>
                    <li class="breadcrumb-item">Show</a></li>
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
                        <h3 class="card-title">Portfolio | {{ $portfolio->name }}</h3>
                        <div class="text-right"> <a href="{{ route('portfolio.index') }}" class="btn btn-success">Back</a> </div>
                    </div>
   <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                {{-- <h3 class="card-title">Responsive Hover Table</h3> --}}
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>User</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $portfolio->id }}</td>
                            <td>{{ $portfolio->name }}</td>
                            <td>{!! \Illuminate\Support\Str::limit($portfolio->description) !!}</td>
                            <td><a href="{{asset('images/portfolio/') .'/' .$portfolio->image}}" target="_blank"><img width="130px" style="border-radius: 30px" src="{{ asset('images/portfolio/' . $portfolio->image) }}"></td>
                            <td>{{ $portfolio->user->name }}</td>
                            <td>{{ $portfolio->created_at->diffForHumans()}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

</section>
@endsection