@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{url('admin/expense_create')}}"> Create New Product</a>
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
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>

        </tr>
        @foreach ($expense as $exp)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $exp->category->category }}</td>
                <td>{{$exp->name}}</td>
                <td>{{$exp->price}}</td>
                <td>
                    <form action="{{ url('admin/expense_destroy',$exp->id) }}" method="POST">

{{--                        <a class="btn btn-info" href="{{ url('admin/expense_show',$exp->id) }}">Show</a>--}}

                        <a class="btn btn-primary" href="{{ url('admin/expense_edit',$exp->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')
                        <a href="{{url('expense_destroy',$exp->id)}}">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </a>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $expense->links() !!}

@endsection
