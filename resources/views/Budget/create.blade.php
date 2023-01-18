@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Budget</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('admin/budget') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('admin/store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="form-group">
                    <strong>Budget:</strong>
                    <input type="number" name="budget" value="" class="form-control" placeholder="budget">
                </div>
            </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <strong>Saving:</strong>
                <input type="number" name="saving" value="" class="form-control" placeholder="saving">
            </div>
        </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-left" style="float: left">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>

    </form>
@endsection
