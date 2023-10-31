@extends('master')
@section('body')
    <div class="row justify-content-center mt-3">
        <div class="col-md-9">
            <h4>Create Sale</h4>
            <form id="saleForm" action="/sales" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <label for="item">Select Item</label>
                        <select class="form-control item-select" name="items[]">
                            <option selected disabled>Select an item</option>
                            @foreach($items as $item)
                                <option value="{{$item->id}}" data-price="{{$item->price}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="price">Item Price</label>
                        <input type="number" class="form-control item-price" name="unit_price[]" required>
                    </div>
                    <div class="col">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" name="quantity[]" required>
                    </div>
                    <div class="col">
                        <label for="total_price">Total Amount</label>
                        <input type="number" class="form-control" name="total_price[]" required>
                    </div>
                    <div class="col d-flex align-items-end">
                        <button type="button" class="btn btn-success add-row">Add</button>
                    </div>
                </div>

                <div id="saleItems"></div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.add-row').click(function () {
                let newRow = '<div class="row mb-3">' +
                    '<div class="col">' +
                    '<label for="item">Select Item</label>' +
                    '<select class="form-control item-select" name="items[]">' +
                    '<option selected disabled>Select an item</option>' +
                    '@foreach($items as $item)' +
                    '<option value="{{$item->id}}" data-price="{{$item->price}}">{{$item->name}}</option>' +
                    '@endforeach' +
                    '</select>' +
                    '</div>' +
                    '<div class="col">' +
                    '<label for="price">Item Price</label>' +
                    '<input type="number" class="form-control item-price" name="unit_price[]" required>' +
                    '</div>' +
                    '<div class="col">' +
                    '<label for="quantity">Quantity</label>' +
                    '<input type="number" class="form-control" name="quantity[]" required>' +
                    '</div>' +
                    '<div class="col">' +
                    '<label for="total_price">Total Amount</label>' +
                    '<input type="number" class="form-control" name="total_price[]" required>' +
                    '</div>' +
                    '<div class="col d-flex align-items-end">' +
                    '<button type="button" class="btn btn-danger remove-row">Remove</button>' +
                    '</div>' +
                    '</div>';

                $('#saleItems').append(newRow);
            });

            $(document).on('click', '.remove-row', function () {
                $(this).closest('.row').remove();
            });

            $(document).on('change', '.item-select', function () {
                let selectedPrice = $(this).find(':selected').data('price');
                $(this).closest('.row').find('.item-price').val(selectedPrice);

                let selectedValue = $(this).val();
                $('.item-select').not(this).find('option[value="' + selectedValue + '"]').prop('disabled', true);
            });

            $('#saleForm').submit(function (e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.post('/sales', formData, function (response) {
                    if (response) {
                        window.location.href = '/sales'
                    }
                });
            });
        });
    </script>
@endsection
