<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function initialize_elfinder($value = '') {
    $CI = & get_instance();
    $CI->load->helper('path');
    $opts = array(
        //'debug' => true, 
        'roots' => array(
            array(
                'driver' => 'LocalFileSystem',
                'path' => base_url('file_manager_dir'),
                'URL' => base_url('file_manager_dir')
            // more elFinder options here
            )
			
        )
    );

    return $opts;
}

if (!function_exists('tanggalan')) {

    function tanggalan($tanggal) {
        $getyear = substr($tanggal, 0, 4);
        $getmonth = substr($tanggal, 5, 2);
        $getdate = substr($tanggal, 8, 2);

        switch ($getmonth) {
            case "01":
                $bulan = "Januari";
                break;

            case "02":
                $bulan = "Februari";
                break;

            case "03":
                $bulan = "Maret";
                break;

            case "04":
                $bulan = "April";
                break;

            case "05":
                $bulan = "Mei";
                break;

            case "06":
                $bulan = "Juni";
                break;

            case "07":
                $bulan = "Juli";
                break;

            case "08":
                $bulan = "Agustus";
                break;

            case "09":
                $bulan = "September";
                break;

            case "10":
                $bulan = "Oktober";
                break;

            case "11":
                $bulan = "November";
                break;

            case "12":
                $bulan = "Desember";
                break;

            default:
                $bulan = "";
                break;
        }

        $hasil = $getdate . ' ' . $bulan . ' ' . $getyear;

        return $hasil;
    }

}
 