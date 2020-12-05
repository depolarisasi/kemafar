<?php

namespace App\Imports;

use App\Models\Pemilih;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Mail\UndanganMemilih;
use Illuminate\Support\Facades\Mail;

class PemilihImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            if ($row->filter()->isNotEmpty()) {
        $secret = mt_rand(1,1000).mt_rand(1,100).mt_rand(1,5).mt_rand(1,9).mt_rand(1,7); 
        $emailuser = $row['email'];
        $nama = $row['nama'];
        $checkpemilih = Pemilih::where('pemilih_npm',$row['npm'])
        ->orWhere('pemilih_email',$row['email'])->first();
        
        if(empty($checkpemilih)){
            $insert = new Pemilih();
            $insert->insertOrIgnore([
                'pemilih_npm'                               => $row['npm'],
                'pemilih_nama'                 => $row['nama'],
                'pemilih_email'                  => $row['email'],
                'pemilih_angkatan'                  => $row['angkatan'],
                'pemilih_pilihan'                   => null,
                'pemilih_secretcode'              => $secret, 

            ]); 

            
        } 

             
 
            }


        }
    }
}
