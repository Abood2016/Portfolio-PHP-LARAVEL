@extends('admin.layouts.app')

@section('bar-title')
View Document
@endsection

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">View Document</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">View Document</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Document </h3>
                    </div>
                    @if (isset($document))
                    <div class="card-body text-center">
                        <h3>Document Title : {{ $document->title }}</h3>
                        <h3>Document For User : {{ $document->user->name }}</h3>
                        <br><br>
                        <h3>The Document File :</h3>
                        <iframe width="600px" height="600px" src="{{ asset('documents/'.$document->file) }}" frameborder="4"></iframe>
                    </div>
                    @else
                    <br>
                       <div class=" alert alert-secondary text-center">No Document Found</div> 
                    @endif

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