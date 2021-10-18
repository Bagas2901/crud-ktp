<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //index menu user
    public function index(Request $request)
    {
        //menampilkan datatable serverside
        if ($request->ajax()) {
            $data = User::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a data-id="' . $data->id . '" id="edituser" href="javascript:void(0)" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"> </i></a> 
                                  <a data-id="' . $data->id . '" id="hapususer" href="javascript:void(0)" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"> </i></a>';
                    return $actionBtn;
                })
                ->editColumn('role', function ($data) {
                    if ($data->is_admin == '1') {
                        $badge = '<span class="badge badge-dark">Admin</span>';
                    } else {
                        $badge = '<span class="badge badge-info">User</span>';
                    }
                    return $badge;
                })
                ->addColumn('foto', function ($data) {
                    $url = asset("img/avatar_users/$data->foto");
                    return '<img alt="image" src="' . $url . '" border="1" width="100" class="img-rounded" align="center">';
                })
                ->rawColumns(['foto', 'action', 'role'])
                ->make(true);
        }

        //call view
        return view('user', [
            "title" => "User"
        ]);
    }

    //Cek Username pada database 
    public function cek_username($username)
    {
        $data = User::where('username', $username)->exists();
        if ($data) {
            return response()->json(['error' => 'Username sudah dipakai!']);
        } else {
            return response()->json(['success' => 'Username tidak ditemukan pada sistem.']);
        }
    }

    //Cek email pada database 
    public function cek_email($email)
    {
        $data = User::where('email', $email)->exists();
        if ($data) {
            return response()->json(['error' => 'Email sudah dipakai!']);
        } else {
            return response()->json(['success' => 'Email tidak ditemukan pada sistem.']);
        }
    }

    //menambah data
    public function simpan(Request $request, User $User)
    {
        $input = $request->all();

        //simpan foto ke storage
        if ($request->foto !== null) {
            $input['foto'] = time() . '.' . $request->file('foto')->getClientOriginalExtension();
            $request->foto->move(public_path('img/avatar_users'), $input['foto']);
        }
        $input['password'] = Hash::make($request->konfirm_password);

        $User->storeData($input);
        return response()->json(['success' => 'Data Berhasil Disimpan']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $User = new User;
        $data = $User->findData($id);

        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $User = new User;
        $input = $request->all();
        $data = $User->find($id);

        if ($data->foto != $request->foto) {
            if ($data->foto != "avatar-1.png" && $data->foto != "avatar-2.png" && $data->foto != "avatar-3.png" && $data->foto != "avatar-4.png" && $data->foto != "avatar-5.png" && $data->foto != "default.png") {
                unlink("img/avatar_users/" . $data->foto);

                $input['foto'] = time() . '.' . $request->file('foto_baru')->getClientOriginalExtension();
                $request->foto_baru->move(public_path('img/avatar_users'), $input['foto']);
            } else {
                $input['foto'] = time() . '.' . $request->file('foto_baru')->getClientOriginalExtension();
                $request->foto_baru->move(public_path('img/avatar_users'), $input['foto']);
            }
        }

        if ($request->konfirm_password == null) {
            $input['password'] = $data->password;
        } else {
            $input['password'] = Hash::make($request->konfirm_password);
        }

        $User->updateData($id, $input);

        return response()->json(['success' => 'Data User Berhasil dirubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */

    //menghapus data berdasarkan id 
    public function destroy($id)
    {
        $data = new User;
        $foto = User::find($id);

        if ($foto->foto != "avatar-1.png" && $foto->foto != "avatar-2.png" && $foto->foto != "avatar-3.png" && $foto->foto != "avatar-4.png" && $foto->foto != "avatar-5.png" && $foto->foto != "default.png") {
            unlink("img/avatar_users/" . $foto->foto);
        }
        $data->deleteData($id);
        return response()->json(['success' => 'Data User Berhasil Dihapus!']);
    }
}
