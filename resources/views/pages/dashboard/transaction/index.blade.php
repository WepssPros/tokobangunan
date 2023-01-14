@extends('layouts.app')
@section('content')
<h2 class="font-semibold text-xl text-gray-800 leading-tight mb-10">
    {{ __('Transaction') }}
</h2>
<div class="col-md-12">
    <div class="card ">
        <div class="card-header">
            <h4 class="card-title"> Simple Table</h4>
        </div>
        <div class="card-body ">
            <div class="table-responsive">
                <table class="table tablesorter display responsive nowrap " id="crudTable">
                    <thead class=" text-primary">
                        <tr>
                            <th class="">
                                id
                            </th>
                            <th class="">
                                Nama User
                            </th>
                            <th class="">
                                Alamat User
                            </th>
                            <th class="">
                                Total Harga
                            </th>
                            <th class="">
                                Delivery Harga
                            </th>
                            <th class="">
                                Status
                            </th>
                            <th class="">
                                Payment
                            </th>

                            <th class="">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    // AJAX DataTable
    var datatable = $('#crudTable').DataTable({
        ajax: {
            url: '{!! url()->current() !!}',
        },
        columns: [{
                data: 'id',
                name: 'id',
                width: '5%'
            },
            {
                data: 'user.name',
                name: 'user.name'
            },
            {
                data: 'address',
                name: 'address'
            },
            {
                data: 'total_price',
                name: 'total_price'
            },
            {
                data: 'shipping_price',
                name: 'shipping_price'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'payment',
                name: 'payment'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
                width: '10%'
            },
        ],
    });

</script>
@endsection
