<?php

namespace App\Http\Controllers;

use App\Models\ServiceType;
use Illuminate\Http\Request;
use App\DataTables\ServiceTypeDataTable;
use App\Helpers\AuthHelper;
use App\Http\Requests\ServiceTypeRequest;

class ServiceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ServiceTypeDataTable $dataTable)
    {
        $pageTitle = trans('global-message.list_form_title', ['form' => trans('service_types.title')] );
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        $headerAction = '<a href="'.route('service-types.create').'" class="btn btn-sm btn-primary" role="button">Add New Service Type</a>';
        return $dataTable->render('global.datatable', compact('pageTitle','auth_user','assets', 'headerAction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('service-types.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceTypeRequest $request)
    {
        $serviceType = ServiceType::create($request->all());
        return redirect()->route('service-types.index')->withSuccess(__('global-message.msg_added', ['name' => __('service_types.store')]));
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceType $serviceType)
    {
        return view('service-types.show', compact('serviceType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = ServiceType::findOrFail($id);
        return view('service-types.form', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceTypeRequest $request, $id)
    {
        $serviceType = ServiceType::findOrFail($id);
        $serviceType->fill($request->all())->update();
        
        if(auth()->check()){
            return redirect()->route('service-types.index')->withSuccess(__('global-message.update_form', ['name' => __('service_types.store')]));
        }
        return redirect()->back()->withSuccess(__('message.update_form', ['name' => 'Service Type']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $serviceType = ServiceType::findOrFail($id);
        $status = 'errors';
        $message = __('global-message.delete_form', ['form' => __('service_types.title')]);

        if($serviceType != '') {
            $serviceType->delete();
            $status = 'success';
            $message = __('global-message.delete_form', ['form' => __('service_types.title')]);
        }

        return response()->json([
            'status' => $status,
            'message' => $message
        ]);
    }
}
