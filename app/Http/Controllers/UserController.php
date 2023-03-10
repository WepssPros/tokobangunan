<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = User::query();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                       <div class="cell">
                            <div>
                                
                                <a class=" btn like btn-link btn-icon btn-fab btn-info btn-sm " 
                                    href="' . route('dashboard.user.edit', $item->id) . '">
                                    <i data-v-01e1f50f="" class="tim-icons icon-pencil"></i>
                                 </a>
                               <form class="btn like btn-link btn-icon btn-fab btn-info btn-sm" action="' . route('dashboard.user.destroy', $item->id) . '" method="POST">
                                <button type="button" class="btn remove btn-link btn-icon btn-fab btn-danger btn-sm" >
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                                    ' . method_field('delete') . csrf_field() . '
                                </form>
                               
                            </div>
                        </div>  
                    ';
                })
                
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.dashboard.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
