@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('admin/expense') }}"> Back</a>
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

    <form action="{{ url('admin/expense_update/'.$expense->id) }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="sel1">Select list:</label>
                    {{--                {{dd(\App\Category::all())}}--}}
                    <select class="form-control" name="category_id" id="sel1">

                        @foreach(\App\Category::all() as $category)
                            <option value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach


                    </select>
                </div>
                <div class="form-group">
                    <strong>name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="name" value="{{$expense->name}}">
                </div>
                <div class="form-group">
                    <strong>price:</strong>
                    <input type="text" name="price" class="form-control" placeholder="price" value="{{$expense->price}}">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>

    </form>
@endsection
