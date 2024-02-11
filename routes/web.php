<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

Route::get('/', function (){
    return view('pages.home');
});

Route::get('/users', function (){
    $users = User::all();
    return view('pages.users', compact('users'));
});

Route::get('/user/{id}/show', function ($id){
    $user = User::findOrFail($id);
    return view('pages.user_details', compact('user'));
});

Route::get('/user/{id}/edit', function ($id){
    $user = User::findOrFail($id);
    return view('pages.user_edit', compact('user'));
});

Route::get('user/create', function(){
    return view('pages.user_create');
});

Route::post('user/store', function(Request $request){

    $validator = Validator::make($request->all(), [
        'name' => 'required|max:50',
        'email' => 'required|email',
        'password' => 'required|confirmed'
    ]);

    if ($validator->fails()) {
        return redirect('/user/create')
                    ->withErrors($validator)
                    ->withInput();
    }
    
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();

    return redirect()->to('/users')->with('success', 'User created successfully');
});


Route::post('user/update/{id}', function(Request $request, $id){

    $validator = Validator::make($request->all(), [
        'name' => 'required|max:100',
        'email' => 'required|email',
        'password' => 'required|confirmed'
    ]);

    if ($validator->fails()) {
        return redirect("/user/$id/edit")
                    ->withErrors($validator)
                    ->withInput();
    }

    $user = User::find($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();
    return redirect()->to('/users')->with('success', 'User Updated successfully');

});

Route::post('user/{id}/delete', function($id){
    $user = User::find($id);
    $user->delete();

    return redirect()->to('/users')->with('success', 'User Deleted successfully');
});