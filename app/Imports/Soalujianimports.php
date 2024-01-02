<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\SoalUjian;

class Soalujianimports implements ToModel
{
    protected $ujian_id;

    public function __construct($ujian_id)
    {
        $this->ujian_id = $ujian_id;
    }

    public function model(array $row)
    {
        return new SoalUjian([
            'ujian_id' => $this->ujian_id,
            'soal' => $row[0],
            'opsi_a' => $row[1],
            'opsi_b' => $row[2],
            'opsi_c' => $row[3],
            'opsi_d' => $row[4],
            'kunci_jawaban' => $row[5],
        ]);
    }
}
