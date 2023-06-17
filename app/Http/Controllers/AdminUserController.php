<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    public function index()
    {
        $data = User::paginate(15);

        return view('admin.data.user.index', compact('data'));
    }

    public function create()
    {
        return view('admin.data.user.create');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        Session::flash('success', 'Berhasil Dihapus');
        return back();
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.data.user.edit', compact('data'));
    }

    public function store(Request $req)
    {
        $checkuser = User::where('username', $req->username)->first();

        if ($checkuser == null) {
            $roles = Role::where('name', $req->role)->first();
            $u = new User;
            $u->name = $req->nama;
            $u->username = $req->username;
            $u->password = bcrypt($req->password);
            $u->save();
            $u->roles()->attach($roles);

            Session::flash('success', 'Berhasil DiSimpan');
            return redirect('/admin/data/user');
        } else {
            Session::flash('error', 'Username sudah ada');
            return back();
        }
    }

    public function update(Request $req, $id)
    {
        $u = User::find($id);
        $roles = Role::where('name', $req->role)->first();
        $u->name = $req->nama;
        if ($req->password == null) {
        } else {
            $u->password = bcrypt($req->password);
        }
        $u->save();
        $u->roles()->sync($roles);
        Session::flash('success', 'Berhasil Diupdate');
        return redirect('/admin/data/user');
    }
}
