@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Category &raquo; {{ $item->name }} &raquo; Edit</h4>
            </div>
            <div class="card-body">
                <form action="{{route('dashboard.category.update',$item->id)}}" method="POST"
                    enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="row">
                        <label class="col-sm-2 col-form-label">
                            <i class="tim-icons icon-components"></i>
                            Nama Produk
                        </label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="{{$item->name}}">
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
