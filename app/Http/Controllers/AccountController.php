<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Role;
use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

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
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'email' => 'required|email:rfc,dns|unique:accounts,email',
            'role' => 'required',
            'gender' => 'required',
            'display_picture' => 'required',
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
        return back();
    }

    // public function login(Request $request) {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('index');
    //     }

    //     return redirect()->back()->withErrors(['email' => 'The provided credentials are incorrect.']);
    // }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
