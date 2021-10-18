<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\KTP;
use Carbon\Carbon;
use App\Exports\KTPExport;
use App\Imports\KTPImport;
use Maatwebsite\Excel\Facades\Excel;

class KTPController extends Controller
{
    //index menu ktp
    public function index(Request $request)
    {
        //menampilkan datatable serverside
        if ($request->ajax()) {
            $data = KTP::latest()->get();
            $datatable = DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    if (auth()->user()->is_admin != '0') {
                        $actionBtn = '<a data-id="' . $data->id . '" id="editktp" href="javascript:void(0)" style="width:50%;" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"> </i></a> 
                                  <a data-id="' . $data->id . '" id="hapusktp" href="javascript:void(0)" style="width:50%;" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"> </i></a>';
                        return $actionBtn;
                    }
                })
                ->editColumn('jk', function ($data) {
                    if ($data->jk == 'l') return 'Laki-Laki';
                    if ($data->jk == 'p') return 'Perempuan';
                    return '-';
                })
                ->editColumn('tmp_lahir', function ($data) {
                    return $data->tgl_lahir ? $data->tmp_lahir . ', ' . with(new Carbon($data->tgl_lahir))->format('d-m-Y') : '';
                })
                ->editColumn('umur', function ($data) {
                    $now = Carbon::now();
                    $tgl_lahir = Carbon::parse($data->tgl_lahir);
                    return $tgl_lahir->diffInYears($now) . ' Tahun';
                })
                ->addColumn('foto', function ($data) {
                    $url = asset("img/avatar/$data->foto");
                    return '<img alt="image" src="' . $url . '" border="1" width="100" class="img-rounded" align="center">';
                })
                ->rawColumns(['foto', 'action'])
                ->make(true);

            return $datatable;
        }

        //call view
        return view('ktp', [
            "title" => "KTP"
        ]);
    }

    //export excel
    public function export_excel()
    {
        return Excel::download(new KTPExport, 'data_ktp_' . time() . '.xlsx');
    }

    //export csv
    public function export_csv()
    {
        return Excel::download(new KTPExport, 'data_ktp_' . time() . '.csv');
    }

    //export pdf
    public function export_pdf()
    {
        return Excel::download(new KTPExport, 'data_ktp_' . time() . '.pdf');
    }

    //import csv file
    public function import()
    {
        $import = Excel::import(new KTPImport, request()->file('file'));

        if ($import) {
            return response()->json(['success' => 'File berhasil di import!']);
        } else {
            return response()->json(['error' => 'File gagal di import!']);
        }
    }

    //Cek NIK pada database 
    public function cek_nik($nik)
    {
        $data = KTP::where('nik', $nik)->exists();
        if ($data) {
            return response()->json(['error' => 'NIK ditemukan pada sistem.']);
        } else {
            return response()->json(['success' => 'NIK tidak ditemukan pada sistem.']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //menambah data untuk api
    public function store(Request $request, KTP $ktp)
    {
        $input = $request->all();

        $ktp->storeData($input);
        return response()->json(['success' => 'Data Berhasil Disimpan']);
    }

    //menambah data
    public function simpan(Request $request, KTP $ktp)
    {
        $input = $request->all();

        //simpan foto ke storage
        if ($request->foto !== null) {
            $input['foto'] = time() . '.' . $request->file('foto')->getClientOriginalExtension();
            $request->foto->move(public_path('img/avatar'), $input['foto']);
        }

        $ktp->storeData($input);
        return response()->json(['success' => 'Data Berhasil Disimpan']);
    }

    public function show()
    {
        $ktp = KTP::all();
        return response()->json(['success' => $ktp]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KTP  $ktp
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $ktp = new KTP;
        $data = $ktp->findData($id);

        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KTP  $ktp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ktp = new KTP;
        $input = $request->all();
        $data = $ktp->find($id);

        if ($data->foto != $request->foto) {
            if ($data->foto != "avatar-1.png" && $data->foto != "avatar-2.png" && $data->foto != "avatar-3.png" && $data->foto != "avatar-4.png" && $data->foto != "avatar-5.png" && $data->foto != "default.png") {
                unlink("img/avatar/" . $data->foto);

                $input['foto'] = time() . '.' . $request->file('foto_baru')->getClientOriginalExtension();
                $request->foto_baru->move(public_path('img/avatar'), $input['foto']);
            } else {
                $input['foto'] = time() . '.' . $request->file('foto_baru')->getClientOriginalExtension();
                $request->foto_baru->move(public_path('img/avatar'), $input['foto']);
            }
        }
        $ktp->updateData($id, $input);

        return response()->json(['success' => 'Data KTP Berhasil dirubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KTP  $ktp
     * @return \Illuminate\Http\Response
     */

    //menghapus data berdasarkan id 
    public function destroy($id)
    {
        $data = new KTP;
        $foto = KTP::find($id);

        if ($foto->foto != "avatar-1.png" && $foto->foto != "avatar-2.png" && $foto->foto != "avatar-3.png" && $foto->foto != "avatar-4.png" && $foto->foto != "avatar-5.png" && $foto->foto != "default.png") {
            unlink("img/avatar/" . $foto->foto);
        }
        $data->deleteData($id);
        return response()->json(['success' => 'Data KTP Berhasil Dihapus!']);
    }
}
