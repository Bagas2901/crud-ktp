<?php

namespace Database\Factories;

use App\Models\KTP;
use Illuminate\Database\Eloquent\Factories\Factory;

class KTPFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KTP::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nik' => $this->generateUniqueCode(),
            'nama' => $this->faker->name(),
            'tmp_lahir' => $this->faker->randomElement(['Jakarta', 'Semarang','Bandung', 'Bogor','Surabaya', 'Yogyakarta','Solo', 'Kab. Semarang']),
            'tgl_lahir' => $this->faker->dateTimeBetween($startDate = '-65 years', $endDate = '-17 years'),
            'jk' => $this->faker->randomElement(['l', 'p']),
            'gol_darah' => $this->faker->randomElement(['a', 'b', 'ab', 'o']),
            'alamat' => 'Jl. Mana Saja Rt '. random_int(01, 10) .' Rw ' . random_int(01, 10) .'',
            'agama' => $this->faker->randomElement(['Islam', 'Katolik', 'Kristen', 'Hindu', 'Budha', 'Konghucu', 'Kepercayaan Lain']),
            'status' => $this->faker->randomElement(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']),
            'pekerjaan' => $this->faker->randomElement(['Pelajar/Mahasiswa', 'Karyawan Swasta', 'Belum/Tidak Bekerja', 'Pegawai Negeri Sipil', 'Tentara Nasional Indonesia', 'Kepolisian RI']),
            'kewarganegaraan' => $this->faker->randomElement(['WNA', 'WNI']),
            'berlaku' => 'Seumur Hidup',
            'foto' => $this->faker->randomElement(['avatar-1.png', 'avatar-2.png', 'avatar-3.png', 'avatar-4.png', 'avatar-5.png']),
        ];
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(1000000000000000, 9999999999999999);
        } while (KTP::where("nik", "=", $code)->first());
  
        return $code;
    }
}
