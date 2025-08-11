<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class EditPassController extends Controller
{
    public function edit()
    {
    	$id = Auth::id();
    	$items = User::findOrFail($id);
    	return view('admin.edit_pass.edit', compact('items'));
    }

    public function update(Request $request, $id)
    {
    	$items = User::findOrFail($id);
    	$data = array(
    		 'name' => $request['name'],
            'email' => $request['email'],
            'role'  => $request['role'],
            'password' => Hash::make($request['password']),
    	);
    	 $items->update($data);
    	 return view('admin.edit_pass.edit', compact('items'));
    }
}
