<?php

namespace App\Http\Controllers\Security;

use App\DataTables\RoleDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Helpers\AuthHelper;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class RolePermission extends Controller
{
    public function index(RoleDataTable $dataTable)
    {
        // $roles = Role::get();
        // $permissions = Permission::get();
        // return view('role-permission.permissions', compact('roles', 'permissions'));

        $pageTitle = trans('global-message.list_form_title',['form' => trans('roles.title')] );
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        $headerAction = '<a href="'.route('role.permission.create').'" class="btn btn-sm btn-primary" role="button">Add New Role </a>';
        return $dataTable->render('global.datatable', compact('pageTitle','auth_user','assets', 'headerAction'));
    }

    public function create(Request $request)
    {
        $permissions  = [];
        $menus = [
            'Dashboard',
            'Users',
            'Roles',
            'Permissions',
            'Categories',
            'Products',
            'Orders',
            'Settings',
        ];
        return view('role.form', compact('menus','permissions'));
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            $role = Role::create(['title' => $request->name,'name' => Str::slug($request->name)]);

            $menus = $request->input('menu'); // ["Dashboard", "Categories", "Products"]
            // 2. Loop dan buat permission (jika belum ada)
            foreach ($menus as $menu) {
                $permission = Permission::firstOrCreate(['name' => Str::slug($menu),'title' => $menu]);
                $role->givePermissionTo($permission);
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('role.permission.list')->with('error', 'Role created failed');
        }



        return redirect()->route('role.permission.list')->with('success', 'Role created successfully');
    }

    // Destroy
    public function destroy($id)
    {

        $role = Role::findOrFail($id);
        $status = 'errors';
        $message= __('global-message.delete_form', ['form' => __('roles.title')]);

        if($role!='') {
            $role->delete();
            $status = 'success';
            $message= __('global-message.delete_form', ['form' => __('roles.title')]);
        }

        if(request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message, 'datatable_reload' => 'dataTable_wrapper']);
        }

        return redirect()->back()->with($status,$message);
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        //pluck permission name
        $permissions = $role->permissions->pluck('title')->toArray();

        $menus = [
            'Dashboard',
            'Users',
            'Roles',
            'Permissions',
            'Categories',
            'Products',
            'Orders',
            'Settings',
        ];
        return view('role.form', compact('menus','permissions','role','id'));
    }

    public function updateStore(Request $request, $id)
    {
        $name = $request->input('name'); // "asd"
        $menus = $request->input('menu'); // ["Dashboard", "Categories", "Products"]

        $role = Role::findOrFail($id);
        $role->update(['title' => $name,'name' => Str::slug($name)]);

        $permissionIds = [];

        foreach ($menus as $menu) {
            $permission = Permission::firstOrCreate(['name' => Str::slug($menu),'title' => $menu]);
            $permissionIds[] = $permission->id;
        }

        $role->syncPermissions($permissionIds);

        return redirect()->route('role.permission.list')->with('success', 'Role updated successfully');
    }

}
