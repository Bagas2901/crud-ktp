<?php

namespace App\Imports;

use App\Models\KTP;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KTPImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new KTP([
            'nik'               => $row['nik'],
            'nama'              => $row['nama'], 
            'tmp_lahir'         => $row['tmp_lahir'], 
            'tgl_lahir'         => $row['tgl_lahir'], 
            'jk'                => $row['jk'], 
            'gol_darah'         => $row['gol_darah'], 
            'alamat'            => $row['alamat'], 
            'agama'             => $row['agama'], 
            'status'            => $row['status'], 
            'pekerjaan'         => $row['pekerjaan'], 
            'kewarganegaraan'   => $row['kewarganegaraan'], 
            'berlaku'           => $row['berlaku'], 
            'foto'              => $row['foto'],
        ]);
    }
}
