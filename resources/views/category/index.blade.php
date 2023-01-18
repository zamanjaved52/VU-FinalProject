@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{url('admin/category_create')}}"> Create New Category</a>
            </div>
        </div>
    </div>




    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Category</th>

        </tr>
        @foreach ($category as $cat)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $cat->category }}</td>
                <td>
                    <form action="{{ url('admin/category_destroy',$cat->id) }}" method="POST">

{{--                        <a class="btn btn-info" href="{{ url('admin/category_show',$cat->id) }}">Show</a>--}}

                        <a class="btn btn-primary" href="{{ url('admin/category_edit',$cat->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')
                        <a href="{{url('category_destroy',$cat->id)}}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </a>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $category->links() !!}

@endsection
