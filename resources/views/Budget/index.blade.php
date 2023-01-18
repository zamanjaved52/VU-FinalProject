@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{url('admin/create')}}"> Create New Budget</a>
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
            <th>Budget</th>
            <th width="280px">Saving</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($budget as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->budget }}</td>
                <td>{{ $product->saving }}</td>
                <td>
                    <form action="{{ url('admin/destroy',$product->id) }}" method="POST">

{{--                        <a class="btn btn-info" href="{{ url('admin/show',$product->id) }}">Show</a>--}}

                        <a class="btn btn-primary" href="{{ url('admin/edit',$product->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $budget->links() !!}

@endsection
