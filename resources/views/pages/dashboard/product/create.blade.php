@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Produk Create</h4>
            </div>
            <div class="card-body">
                <form action="{{route('dashboard.product.store')}}" method="POST" enctype="multipart/form-data"
                    class="form-horizontal">
                    @csrf
                    <div class="row">
                        <label class="col-sm-2 col-form-label">
                            <i class="tim-icons icon-components"></i>
                            Nama Produk
                        </label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name">
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
                                <input type="text" class="form-control" name="price">
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
                                    class="form-control"></textarea>
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
                                <input type="text" class="form-control" name="tags">
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
