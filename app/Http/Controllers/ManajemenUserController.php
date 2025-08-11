<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class ManajemenUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perPage = 10;
        $items = User::orderBy('id', 'DESC')->paginate($perPage);
        return view('admin.manajemen_user.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manajemen_user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {           
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role'  => $request['role'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('admin.manajemen_user.index')->withSuccess('Great! Data has been successfully uploaded.');
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
        $items = User::findOrFail($id);
        return view('admin.manajemen_user.edit', compact('items'));
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
        $items = User::findOrFail($id);

        $items->update($request->except(['password']));
        $items->update([
                    'password' => Hash::make($request['password'])
                ]);

        return redirect()->route('admin.manajemen_user.index')->withSuccess('Great! Data has been successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $items = User::findOrFail($id);
        $items->delete();

        return redirect()->route('admin.manajemen_user.index')->withSuccess('Great! Data has benn successfully Deleted.');
    }
}
