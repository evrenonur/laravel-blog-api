<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Users extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::role('user')->get();
        return view('backend.users.index', compact('users'));
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrfail($id);
        if ($user) {
            $user["url"] = route('admin.users.update', $user->id);
            return response()->json($user);
        } else {
            return redirect()->back()->with('error', 'Kullanıcı bulunamadı.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrfail($id);
        if ($user) {
            $data = array(
                'name' => $request->name,
                'email' => $request->email,
            );
            if ($request->password) {
                $data['password'] = bcrypt($request->password);
            }
            $user->update($data);
            return redirect()->back()->with('success', 'Kullanıcı başarıyla güncellendi.');
        } else {
            return redirect()->back()->with('error', 'Kullanıcı bulunamadı.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);
        if ($user) {
            $user->delete();
            return redirect()->back()->with('success', 'Kullanıcı başarıyla silindi.');
        } else {
            return redirect()->back()->with('error', 'Kullanıcı bulunamadı.');
        }
    }

}
