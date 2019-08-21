<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Manager;
use App\Model\Role;
use Auth;
use Illuminate\Http\Request;

class ManagerController extends Controller {
	public function index() {
		$data = Manager::all();
		return view('admin/manager/index', compact('data'));
	}

	public function add() {
        $roles = Role::get();
		return view('admin/manager/add',compact('roles'));
	}

	public function doAdd(Request $request) {
		$datas =  $request->all();
		$datas['password'] = bcrypt($datas['password']);
		$res = Manager::create($datas );
		return $res ? '1':'0';
	}

	public function edit($id) {
	    $manager = Manager::find($id);
        $roles = Role::get();
		return view('admin.manager.edit',compact('manager','roles'));
	}

	public function doEdit(Request $request){
        $id = $request->get('id');
        $manager = Manager::find($id);
        if (!$manager){
            return '0';
        }
        $manager->username=$request->username;
        $manager->gender = $request->gender;
        $manager->password = bcrypt($request->password1);
        $manager->mobile = $request->get('mobile','');
        $manager->email = $request->get('email','');
        $manager->role_id = $request->role_id;
        $manager->status = $request->status;
        return $manager->save() ? '1': '0';
    }

	public function statusOff($id) {
        $res = Manager::where('id',$id)->update(['status'=>1]);
        return $res ? '1':'0';
    }

    public function statusOn($id) {
        $res = Manager::where('id',$id)->update(['status'=>2]);
        return $res ? '1':'0';
    }

    public function delete($id) {
	    $res = Manager::where('id',$id)->delete();
	    return $res ? '1':'0';
    }
}
