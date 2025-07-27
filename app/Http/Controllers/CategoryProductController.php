<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\DataTables\CategoryProductDataTable;
use App\Helpers\AuthHelper;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryProductDataTable $dataTable)
    {
        $pageTitle = trans('global-message.list_form_title',['form' => trans('category_product.title')] );
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        $headerAction = '<a href="'.route('category_product.create').'" class="btn btn-sm btn-primary" role="button">Add New Category Product </a>';
        return $dataTable->render('global.datatable', compact('pageTitle','auth_user','assets', 'headerAction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category_product.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        CategoryProduct::create($request->all());

        return redirect()->route('category_product.index')->withSuccess(__('global-message.msg_added',['name' => __('category_product.store')]));
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryProduct $categoryProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = CategoryProduct::findOrFail($id);

        return view('category_product.form', compact('data','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categoryProduct = CategoryProduct::findOrFail($id);

        $categoryProduct->fill($request->all())->update();

        return redirect()->route('category_product.index')->withSuccess(__('global-message.update_form',['name' => __('category_product.store')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoryProduct = CategoryProduct::findOrFail($id);
        $status = 'errors';
        $message= __('global-message.delete_form', ['form' => __('category_product.title')]);

        if($categoryProduct!='') {
            $categoryProduct->delete();
            $status = 'success';
            $message= __('global-message.delete_form', ['form' => __('category_product.title')]);
        }

        if(request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message, 'datatable_reload' => 'dataTable_wrapper']);
        }

        return redirect()->back()->with($status,$message);
    }
}
