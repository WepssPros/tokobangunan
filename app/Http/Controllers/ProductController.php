<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Http\Requests\ProductRequest;
use App\Models\ProductCategory;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Product::with('category', 'galleries')->get();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="cell">
                            <div>
                                <a class=" btn like btn-link btn-icon btn-fab btn-info btn-sm " 
                                    href="' . route('dashboard.product.gallery.index', $item->id) . '">
                                    <i  class="tim-icons icon-image-02"></i>  
                                </a>
                                <a class=" btn like btn-link btn-icon btn-fab btn-info btn-sm " 
                                    href="' . route('dashboard.product.edit', $item->id) . '">
                                    <i data-v-01e1f50f="" class="tim-icons icon-pencil"></i>
                                 </a>
                                <form class="btn like btn-link btn-icon btn-fab btn-info btn-sm" action="' . route('dashboard.product.destroy', $item->id) . '" method="POST">
                                <button type="submit" class="btn remove btn-link btn-icon btn-fab btn-danger btn-sm" >
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                                    ' . method_field('delete') . csrf_field() . '
                                </form>
                            </div>
                        </div>

                       ';
                })

                ->editColumn('price', function ($item) {
                    return number_format($item->price);
                })
                ->rawColumns(['action', 'galleries.url'])
                ->make();
        }

        return view('pages.dashboard.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        return view('pages.dashboard.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();

        Product::create($data);

        return redirect()->route('dashboard.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        return view('pages.dashboard.product.edit', [
            'item' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->all();

        $product->update($data);

        return redirect()->route('dashboard.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('dashboard.product.index');
    }
}
