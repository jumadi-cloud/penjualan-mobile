<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

class Helper
{
    public static function shout(string $string)
    {
        return strtoupper($string);
    }

    public static function tanggal_indo(string $tanggal,$cetak_hari = false)
    {
        $bulan = array (
            1 =>'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
       $hari = array ( 1 =>    'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu',
                'Minggu'
            );
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
        $anInt = intval($pecahkan[2]);
        $tgl_indo = $anInt . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
        if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo;
    }
    return $tgl_indo;
    }
}