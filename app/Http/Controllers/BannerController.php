<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\DataTables\BannerDataTable;
use App\Helpers\AuthHelper;
use App\Http\Requests\BannerRequest;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BannerDataTable $dataTable)
    {
        $pageTitle = trans('global-message.list_form_title',['form' => trans('banners.title')] );
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        $headerAction = '<a href="'.route('banners.create').'" class="btn btn-sm btn-primary" role="button">Add New Banner </a>';
        return $dataTable->render('global.datatable', compact('pageTitle','auth_user','assets', 'headerAction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('banners.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerRequest $request)
    {

        $banner = Banner::create($request->all());

        storeMediaFile($banner,$request->file, 'image');

        return redirect()->route('banners.index')->withSuccess(__('global-message.msg_added',['name' => __('banners.store')]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        return view('banners.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Banner::findOrFail($id);

        $profileImage = getSingleMedia($data, 'image');

        return view('banners.form', compact('data','id', 'profileImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerRequest $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $banner->fill($request->all())->update();

        if (isset($request->image) && $request->image != null) {
            $banner->clearMediaCollection('image');
            $banner->addMediaFromRequest('image')->toMediaCollection('image');
        }

        if(auth()->check()){
            return redirect()->route('banners.index')->withSuccess(__('global-message.update_form',['name' => __('banners.store')]));
        }
        return redirect()->back()->withSuccess(__('message.update_form',['name' => 'My Profile']));

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner = Banner::findOrFail($banner->id);
        $status = 'errors';
        $message= __('global-message.delete_form', ['form' => __('banners.title')]);

        if($banner!='') {
            $banner->delete();
            $status = 'success';
            $message= __('global-message.delete_form', ['form' => __('banners.title')]);
        }

        if(request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message, 'datatable_reload' => 'dataTable_wrapper']);
        }

        return redirect()->back()->with($status,$message);
    }
}
