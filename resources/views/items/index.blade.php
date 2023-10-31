@extends('master')
@section('body')
    <div class="row flex justify-content-center mt-3">
        <div class="col-md-6">
            <div class="d-flex justify-content-between"><h4>Items List</h4>
                <a href="/items/create" class="btn btn-primary">Create New</a>
            </div>
            @if(!empty($message))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif
            <table class="table mt-3">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Arabic Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <th scope="row">{{$item->id}}</th>
                        <td>{{$item->name}}</td>
                        <td>{{$item->arabic_name}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->stock}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
