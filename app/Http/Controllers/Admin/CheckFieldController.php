<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Manager;
use App\Model\Role;
use App\Model\PeriodicalCategory;

class CheckFieldController extends Controller
{
    public function checkName(Request $request) {
        $username = $request->get('username');
        $user = Manager::where('username',$username)->first();
        return $user ? response()->json('false') : response()->json('true');
    }

    public function checkRoleName(Request $request) {
        $role = Role::where('role_name',$request->get('role_name'))->get();
        return $role->count() ? 'false' : 'true';
    }

    public function checkCategoryName(Request $request) {
        $name = PeriodicalCategory::where('name',$request->get('name'))->first();
        return (null === $name || $request->get('id')==$name->id) ? 'true' : 'false';
    }
}
