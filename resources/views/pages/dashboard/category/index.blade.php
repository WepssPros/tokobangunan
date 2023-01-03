@extends('layouts.app')
@section('content')
<h2 class="font-semibold text-xl text-gray-800 leading-tight mb-10">
    {{ __('Category') }}
</h2>
<div class="col-md-12">
    <div class="card ">
        <div class="card-header">
            <a class="btn btn-success text-white" href="{{route('dashboard.category.create')}}">
                <i class="tim-icons icon-simple-add"></i> Create Data Kategory
            </a>
        </div>
        <div class="card-header">
            <h4 class="card-title"> Simple Table</h4>
        </div>
        <div class="card-body ">
            <div class="table-responsive">
                <table class="table tablesorter " id="crudTable">
                    <thead class=" text-primary">
                        <tr>
                            <th class="text-center">
                                id
                            </th>
                            <th class="text-center">
                                Nama
                            </th>

                            <th class="text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

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
                data: 'name',
                name: 'name'
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
