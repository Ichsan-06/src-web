<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductBenefit;
use App\Models\ProductPageSetting;

class ProductPageSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pps = ProductPageSetting::first();
        $productBenefit = ProductBenefit::all();
        return view('product_page_setting.list', compact('pps', 'productBenefit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product_page_setting.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check Product page setting
        $pps = ProductPageSetting::first();

        if($pps){
            $pps->update($request->all());
        }else{
            ProductPageSetting::create($request->all());
        }
        return redirect()->back()->with('success', 'Product page setting updated successfully');
    }

    public function addBenefit(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //If product page setting not found
        $pps = ProductPageSetting::first();
        if(!$pps){
            //Create product page setting
            $pps = ProductPageSetting::create([
                'link_youtube' => '-'
            ]);
        }

        $productBenefit = new ProductBenefit();
        $productBenefit->title = $request->title;
        $productBenefit->description = $request->description;
        $productBenefit->product_page_setting_id = $pps->id;
        $productBenefit->save();


        if ($request->file('file')) {
            storeMediaFile($productBenefit,$request->file, 'image');
        }

        return redirect()->back()->with('success', 'Product benefit added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductPageSetting $productPageSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = ProductBenefit::findOrFail($id);

        return view('product_page_setting.form', compact('data','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $banner = ProductBenefit::findOrFail($id);

        $banner->fill($request->all())->update();

        if (isset($request->image) && $request->image != null) {
            $banner->clearMediaCollection('image');
            $banner->addMediaFromRequest('image')->toMediaCollection('image');
        }

        if(auth()->check()){
            return redirect()->route('product_page_setting.index')->withSuccess(__('global-message.update_form',['name' => __('product_page_setting.store')]));
        }
        return redirect()->back()->withSuccess(__('message.update_form',['name' => 'My Profile']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $banner = ProductBenefit::findOrFail($id);
        $status = 'errors';
        $message= __('global-message.delete_form', ['form' => __('product_page_setting.title')]);

        if($banner!='') {
            $banner->delete();
            $status = 'success';
            $message= __('global-message.delete_form', ['form' => __('product_page_setting.title')]);
        }

        if(request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message, 'datatable_reload' => 'dataTable_wrapper']);
        }

        return redirect()->back()->with($status,$message);
    }
}
