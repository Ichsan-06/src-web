<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Helpers\AuthHelper;
use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\DataTables\ProductDataTable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( ProductDataTable $dataTable)
    {
        $pageTitle = trans('global-message.list_form_title',['form' => trans('products.title')] );
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        $headerAction = '<a href="'.route('products.create').'" class="btn btn-sm btn-primary" role="button">Add New Product </a>';
        return $dataTable->render('global.datatable', compact('pageTitle','auth_user','assets', 'headerAction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CategoryProduct::all();
        return view('products.form', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'unit_type' => 'required',
        ]);

        $product = Product::create($request->all());

        storeMediaFile($product,$request->file, 'image');

        return redirect()->route('products.index')->withSuccess(__('global-message.msg_added',['name' => __('products.store')]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $status = 'errors';
        $message= __('global-message.delete_form', ['form' => __('products.title')]);

        if($product!='') {
            $product->delete();
            $status = 'success';
            $message= __('global-message.delete_success',['name' => __('products.title')]);
        }

        if(request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message, 'datatable_reload' => 'dataTable_wrapper']);
        }

        return redirect()->back()->with($status,$message);
    }
}
