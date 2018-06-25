<?php

namespace App\Http\Controllers\Users;

use App\User;
use App\Models\Activity\Activity;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Users\UsersRequest;

class UsersController extends Controller
{

    public function index()
    {
//        return  \App\Models\Config\Config::where('key', 'site_name')->pluck('vlaue')->first();
        $title = trans('common.add') . ' ' . trans('common.user');
        // get all users
        $allUsers = User::all();
        $roles = Role::lists('display_name','id');

        $pageName = trans('common.all') . ' ' . trans('common.users');
        return view('users.home', get_defined_vars());
    }

    // add new user
    public function store(UsersRequest $request, User $user)
    {
        if ( Auth::user()->role_id == 1 ) {
            // get all request data from

            $allRequest = $request->all();
            $allRequest['password'] = Hash::make($request->password);
            $allRequest['status'] = 'Active';
            $user = $user->create($allRequest);

            $user_id = Auth::id();
            $roles = Role::lists('name','id');
            $message = 'Created user ' . $user->email;
            //save into activity
            Activity::saveActivity($user_id, $message);

            Session::flash('success_msg', 'Successfully created a User.');
        } else {
            Session::flash('error_msg', 'Only Admin can create user account.');
        }
        return redirect('users');
    }

    public function edit(User $User)
    {
        if (Auth::user()->role_id != 1 ) {
            Session::flash('error_msg', 'Only Admin can update user account.');
            return redirect('users');
        } else {
            //get all user
            $roles = Role::lists('name','id');
            $allUsers = User::all();
            $userInfo = $User;
            $title = trans('common.edit') . ' ' . trans('common.user');

            return view('users.home', get_defined_vars());
        }
    }

    public function update(UsersRequest $request, User $user)
    {
        if (Auth::user()->role_id != 1 ) {
            Session::flash('error_msg', 'Only Admin can update user account.');
            return redirect('users');
        } else {
            //updated user info

            $data['name'] = $request->name;
            $data['role_id'] = $request->role_id;

            if ($request->email != $user->email) {
                $data['email'] = $request->email;
            }

            if (!empty($request->password)) {
                $data['password'] = Hash::make($request->password);
            }



            $user->update($data);

            $user_id = Auth::id();
            $message = 'Updated user ' . $user->email;
            Activity::saveActivity($user_id, $message);

            Session::flash('success_msg', 'Successfully Updated User.');
            return redirect('users');
        }
    }

    public function destroy(User $user)
    {
        if (Auth::user()->role_id != 1) {
            Session::flash('error_msg', 'Only Admin can delete user account.');
            return redirect('users');
        } else {
            //deleted user
            $user_id = Auth::id();
            $message = 'Deleted user ' . $user->email;
            Activity::saveActivity($user_id, $message);

            // deleted all activity according to this user
            Activity::where('user_id', $user->id)->delete();

            $user->delete();

            Session::flash('success_msg', 'Successfully Deleted User.');
            return redirect('users');
        }
    }

    public function change_status($user_id)
    {
        if (Auth::user()->role_id != 1) {
            Session::flash('error_msg', 'Only Admin can change user status.');
            return redirect('users');
        } else {
            // get user by user_id
            $user = User::find($user_id);

            if ($user->status == 'Active') {// check user status (Active, Banned) and set
                $user->status = 'Banned';
            } else if ($user->status == 'Banned') {
                $user->status = 'Active';
            }
            $user->save();
            $message = $user->status . ' user ' . $user->email;
            Activity::saveActivity(Auth::id(), $message);
            return redirect('users');
        }
    }

    public function active_users() // get all active user
    {
        $title = trans('common.add') . ' ' . trans('common.user');
        $pageName = trans('common.all') . ' ' . trans('common.users');
        // only active users
        $allUsers = User::where('status', 'Active')->get();
        $roles = Role::lists('display_name','id');
        return view('users.home', get_defined_vars());
    }

    public function banned_users() // get all banned user
    {
        $title = trans('common.add') . ' ' . trans('common.user');
        $pageName = trans('common.all') . ' ' . trans('common.users');
        //only banned users
        $allUsers = User::where('status', 'Banned')->get();
        $roles = Role::lists('display_name','id');
        return view('users.home', get_defined_vars());
    }

}
