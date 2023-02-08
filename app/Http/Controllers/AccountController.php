<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Role;
use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function viewRegister() {
        $roles = Role::all();
        $genders = Gender::all();
        return view('register', ['roles' => $roles, 'genders' => $genders]);
    }

    public function viewLogin() {
        return view('login');
    }

    public function register(Request $request) {
        // @dd($request);
        $rules = [
            'first_name' => 'required|max:25|regex:/^[a-zA-Z]*$/',
            'last_name' => 'required|max:25|regex:/^[a-zA-Z]*$/',
            'email' => 'required|email:rfc,dns|unique:accounts,email|regex:/^(?=.*[@])(?=.*[.]).+$/',
            'role' => 'required',
            'gender' => 'required',
            'display_picture' => 'required|image',
            'password' => 'required|min:8|regex:/^(?=.*[0-9])/|confirmed',
            'password_confirmation' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $image = $request->file('display_picture');
        $imageName = $image->getClientOriginalName();

        Storage::putFileAs('public/img', $image, $imageName);
        $imageUrl = 'storage/img/'.$imageName;

          Account::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role_id' => $request->role,
            'gender_id' => $request->gender,
            'display_picture_link' => $imageUrl,
            'password' => Hash::make($request->password),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
          ]);

          return redirect('/login');
    }

    public function login(Request $request) {
        // @dd($request);
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        // @dd($request->password);
        return back()->withErrors('Incorrect Email or Password!');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with('fail', 'Logged Out Successfully');
    }

    public function viewProfile()
    {
        $roles = Role::all();
        $genders = Gender::all();
        $user_role = Role::find(auth()->user()->role_id);
        $user_gender = Gender::find(auth()->user()->gender_id);

        return view('profile', [
            // 'first_name' => auth()->user()->first_name,
            // 'last_name' => auth()->user()->last_name,
            // 'email' => auth()->user()->email,
            // 'role_id' => auth()->user()->role,
            // 'gender_id' => auth()->user()->gender,
            // 'display_picture_link' => auth()->user()->display_picture_link,
            // 'password' => auth()->user()->password,
            'roles' => $roles,
            'genders' => $genders,
            'user_role' => $user_role,
            'user_gender' => $user_gender
        ]);
    }

    public function editProfile(Request $request) {
        // @dd($request->all());
        $user = Account::find(auth()->user()->id);

        $rules = [
            'first_name' => 'required|max:25|regex:/^[a-zA-Z]*$/',
            'last_name' => 'required|max:25|regex:/^[a-zA-Z]*$/',
            'email' => 'required|email:rfc,dns|regex:/^(?=.*[@])(?=.*[.]).+$/',
            'role' => 'required',
            'gender' => 'required',
            'display_picture' => 'required|image',
            'password' => 'required|min:8|regex:/^(?=.*[0-9])/|confirmed',
            'password_confirmation' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        $image = $request->file('display_picture');
        $imageName = $image->getClientOriginalName();

        Storage::putFileAs('public/img', $image, $imageName);
        $imageUrl = 'storage/img/'.$imageName;

        $user['first_name'] = $request->first_name;
        $user['last_name'] = $request->last_name;
        $user['email'] = $request->email;
        // $user_role = DB::table('roles')->where('role_name', '=', $request->role)->get();
        // dd($request->role);
        $user['role_id'] = $request->role;
        // @dd($request->all());
        // $user_gender = Gender::find($request->gender);
        $user['gender_id'] = $request->gender;
        $user['display_picture_link'] = $imageUrl;
        $user['password'] = Hash::make($request->password);
        $user['updated_at'] = date("Y-m-d H:i:s");
        $user->save();

        return redirect('/home')->with('success', 'Saved!');
    }

    public function viewAccountMaintenance() {
        $accounts = Account::all();
        $roles = Role::all();
        return view('account_maintenance', ['accounts' => $accounts, 'roles' => $roles]);
    }

    public function viewUpdateRole($id) {
        $user = Account::find($id);
        $roles = Role::all();
        $user_role = Role::find($user->role_id);

        // @dd($user_role);
        // @dd($user);
        return view('update_role', [
            'roles' => $roles,
            'user_role' => $user_role,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'user' => $id
        ]);
    }

    public function updateRole(Request $request) {
        // @dd($request);
        $rules = [
            'role' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return back()->withErrors($validator);
        }

        // @dd($request->id);

        Account::where('id', '=', $request->user_id)->update(['role_id' => $request->role]);

        return redirect('/view-account-maintenance')->with('success', 'Role edited Successfully');
    }

    public function deleteAccount($id) {
        // @dd($id);
        Account::find($id)->delete();
        return redirect()->back()->with('success', 'Account deleted Succesfully');
    }
}
