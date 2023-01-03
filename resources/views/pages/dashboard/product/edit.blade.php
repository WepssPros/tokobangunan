@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Product &raquo; {{ $item->name }} &raquo; Edit</h4>
            </div>
            <div class="card-body">
                <form action="{{route('dashboard.product.update', $item->id)}}" method="POST"
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
                    <div class="row">
                        <label class="col-sm-2 col-form-label">
                            <i class="tim-icons icon-components"></i>
                            Harga Produk </label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="text" class="form-control" name="price" value="{{$item->price}}">
                                <span class="form-text">A block of help text that breaks onto a new line.</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label">
                            <i class="tim-icons icon-components"></i>
                            Deskripsi
                        </label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <textarea name="description" id="" cols="30" rows="10" type="text"
                                    class="form-control">{{$item->description}}</textarea>
                                <span class="form-text">A block of help text that breaks onto a new line.</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label"> <i class="tim-icons icon-components"></i>
                            Tags
                        </label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="text" class="form-control" name="tags" value="{{$item->tags}}">
                                <span class="form-text">A block of help text that breaks onto a new line.</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-2 col-form-label"> <i class="tim-icons icon-components"></i>
                            Kategory
                        </label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <select type="text" class="form-control" name="categories_id">
                                    <option value="{{$item->category->id}}">{{$item->category->name}}</option>
                                    <option disabled value="#">=================</option>
                                    @foreach ($categories as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
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
