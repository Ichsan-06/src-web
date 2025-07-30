<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Helpers\AuthHelper;
use Illuminate\Http\Request;
use App\DataTables\ReviewDataTable;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ReviewDataTable $dataTable)
    {
        $pageTitle = trans('global-message.list_form_title',['form' => trans('reviews.title')] );
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        $headerAction = '<a href="'.route('review.create').'" class="btn btn-sm btn-primary" role="button">Add New Review </a>';
        return $dataTable->render('global.datatable', compact('pageTitle','auth_user','assets', 'headerAction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reviews.form');
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

        $review = Review::create($request->all());

        storeMediaFile($review,$request->file, 'image');

        return redirect()->route('review.index')->withSuccess(__('global-message.msg_added',['name' => __('reviews.store')]));
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
        $data = Review::findOrFail($id);


        return view('reviews.form', compact('data','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $review = Review::findOrFail($id);

        $review->fill($request->all())->update();



        if ($request->hasFile('file')) {
            $review->clearMediaCollection('image');
            $review->addMediaFromRequest('file')->toMediaCollection('image');
        }

        if(auth()->check()){
            return redirect()->route('review.index')->withSuccess(__('global-message.update_form',['name' => __('reviews.store')]));
        }
        return redirect()->back()->withSuccess(__('message.update_form',['name' => 'Review']));
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
