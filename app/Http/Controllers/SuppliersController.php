<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\Supplier as SupplierResource;
use App\Http\Resources\ProductCollection;
use App\Suppliers;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $fillable = ['id','name'];
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',

    ];
    public function index()
    {
        return response()->json(Suppliers::all(), 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $suppliers = Suppliers::create($request->all());
        return response()->json($suppliers, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Suppliers $suppliers
     * @return \Illuminate\Http\Response
     */
    public function show(Suppliers $suppliers)
    {
        return response()->json($suppliers, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Suppliers $suppliers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suppliers $suppliers)
    {
        $$suppliers->update($request->all());
        return response()->json($suppliers, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Suppliers $suppliers
     * @return \Illuminate\Http\Response
     */
    public function delete(Suppliers $suppliers)
    {
        $suppliers->status = 'deleted';
        $suppliers->update($suppliers->all());
        return response()->json($suppliers, 200);
    }
}
