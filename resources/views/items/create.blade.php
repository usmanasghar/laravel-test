@extends('master')
@section('body')
    <div class="row d-flex justify-content-center mt-3">
        <div class="col-md-6">
            <h4>Create Item</h4>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="/items">
                @csrf
                <div class="form-group">
                    <label>Item Name</label>
                    <input value="{{ old('name') }}" name="name" type="text" class="form-control"
                           placeholder="Enter Item Name"/>
                </div>
                <div class="form-group">
                    <label>Arabic Name</label>
                    <input value="{{ old('arabic_name') }}" name="arabic_name" type="text" class="form-control"
                           placeholder="Enter Arabic Name"/>
                </div>
                <div class="form-group">
                    <label>Item Price</label>
                    <input value="{{ old('price') }}" name="price" class="form-control"
                           placeholder="Enter Price"/>
                </div>
                <div class="form-group">
                    <label>Item Stock</label>
                    <input value="{{ old('stock') }}" name="stock" type="number" class="form-control"
                       placeholder="Enter Stock"/>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection
