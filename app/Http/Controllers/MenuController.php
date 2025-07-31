<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Helpers\AuthHelper;
use Illuminate\Http\Request;
use App\DataTables\MenuDataTable;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MenuDataTable $dataTable)
    {
        $pageTitle = trans('global-message.list_form_title',['form' => trans('menu.title')] );
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        return $dataTable->render('global.datatable', compact('pageTitle','auth_user','assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'sub_title' => 'required',
            'file' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $menu = Menu::create($request->all());

        storeMediaFile($menu,$request->file, 'image');

        return redirect()->route('menu.index')->withSuccess(__('global-message.msg_added',['name' => __('menu.store')]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Menu::findOrFail($id);


        return view('menu.form', compact('data','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $menu = Menu::findOrFail($id);

        $menu->fill($request->all())->update();


        if(auth()->check()){
            return redirect()->route('menu.index')->withSuccess(__('global-message.update_form',['name' => __('menu.store')]));
        }
        return redirect()->back()->withSuccess(__('message.update_form',['name' => 'Menu']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $status = 'errors';
        $message= __('global-message.delete_form', ['form' => __('reviews.title')]);

        if($review!='') {
            $review->delete();
            $status = 'success';
            $message= __('global-message.delete_form', ['form' => __('reviews.title')]);
        }

        if(request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message, 'datatable_reload' => 'dataTable_wrapper']);
        }

        return redirect()->back()->with($status,$message);

    }
}
