@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Transaction &raquo; {{ $item->user->name }} &raquo; Edit</h4>
            </div>
            <div class="card-body">
                <form action="{{route('dashboard.transaction.update', $item->id)}}" method="POST"
                    enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @method('put')

                    <div class="row">
                        <label class="col-sm-2 col-form-label"> <i class="tim-icons icon-components"></i>
                            Status
                        </label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <select type="text" class="form-control" name="status">
                                    <option value="{{ $item->status }}">{{ $item->status }}</option>
                                    <option disabled>-------</option>
                                    <option value="PENDING">PENDING</option>
                                    <option value="SUCCESS">SUCCESS</option>
                                    <option value="CANCELLED">CANCELLED</option>
                                    <option value="FAILED">FAILED</option>
                                    <option value="SHIPPING">SHIPPING</option>
                                    <option value="SHIPPED">SHIPPED</option>
                                </select>
                                <span class="form-text">A block of help text that breaks onto a new line.</span>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>

                </form>
            </div>
        </div>
    </div>

</div>
@endsection
