<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KTP extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nik',
        'nama',
        'tmp_lahir',
        'tgl_lahir',
        'jk',
        'gol_darah',
        'alamat',
        'agama',
        'status',
        'pekerjaan',
        'kewarganegaraan',
        'berlaku',
        'foto',

    ];

    public function storeData($input)
    {
    	return static::create($input);
    }

    public function collection()
    {
        return static::all();
    }

    public function findData($id)
    {
        return static::find($id);
    }

    public function updateData($id, $input)
    {
        return static::find($id)->update($input);
    }

    public function deleteData($id)
    {
        return static::find($id)->delete();
    }
}
