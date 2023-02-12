<?php

namespace App\Http\Controllers;

use App\Models\M_product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('crud.v_crud_index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('crud.v_create');
    }
    public function read()
    {
        $data['model'] = M_product::all();
        return view('crud.v_table', $data);
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
  
        $data['name'] = $request->name;
        M_product::insert($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\M_product  $m_product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['model'] = M_product::findOrFail($id);
        // dd($data['model']);
        return view('crud.v_edit', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\M_product  $m_product
     * @return \Illuminate\Http\Response
     */
    public function edit(M_product $m_product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\M_product  $m_product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data= M_product::findOrFail($id);
        $data->name= $request->name;
        $data->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\M_product  $m_product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data= M_product::findOrFail($id);
        $data->delete();
    }
}
