@extends('master')
@section('body')
    <div class="row flex justify-content-center mt-3">
        <div class="col-md-6">
            <div class="d-flex justify-content-between"><h4>Sales List</h4>
                <a href="/sales/create" class="btn btn-primary">Create New</a>
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
                    <th scope="col">Item Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Item Price</th>
                    <th scope="col">Total Amount</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sales as $sale)
                    <tr>
                        <td>
                            {{$sale->id}}
                        </td>
                        <td colspan="4">
                            <table class="table">
                                @foreach($sale->items as $item)
                                    <tr>
                                        <td>{{$item->name}}
                                        <td>{{$sale->item_sale->quantity}}</td>
                                        <td>{{$sale->item_sale->unit_price}}</td>
                                        <td>{{$sale->item_sale->total_price    }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
