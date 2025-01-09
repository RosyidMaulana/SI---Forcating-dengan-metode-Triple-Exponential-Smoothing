<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisatawan;

class PerhitunganControllers extends Controller
{
    public function perhitungan(){
        $data =  Wisatawan::all();
        // dd($data);
        $data[0]->jumlah_kunjungan;

        $alpha = 0.10;
        $data[0]->singleSmoothing = $data[0]->jumlah_kunjungan;
        $data[0]->doubleSmoothing = $data[0]->jumlah_kunjungan;
        $data[0]->tripleSmoothing = $data[0]->jumlah_kunjungan;

        $data[0]->aForcast = $data[0]->jumlah_kunjungan;
        $data[0]->bForcast = 0;
        $data[0]->cForcast = 0;
        $data[0]->resultForcasting = 0;
        $data[1]->resultForcasting = $data[0]->jumlah_kunjungan;

        // object penamPung error
        $data[0]->countError = 0;
        $data[1]->countError = $data[1]->jumlah_kunjungan - $data[1]->resultForcasting;

        // object penamPung abs error
        $data[0]->absError = 0;
        $data[1]->absError = abs( $data[1]->countError);

        // object PE dari mape
        $data[0]->percentageError = 0;
        $data[1]->percentageError = abs( $data[1]->countError) / $data[1]->jumlah_kunjungan * 100;
        $totalPercentageError = 0;



        // untuk perhitungan manual
        $masaForcasting = 1;

        $forcast= [];

        //mengetahui index terakhir / jumlah data
        $lastElement = count($data) - 1;

        $forcast = [
            (object)['bulan' => 'Januari'],
            (object)['bulan' => 'Februari'],
            (object)['bulan' => 'Maret'],
            (object)['bulan' => 'April'],
            (object)['bulan' => 'Mei'],
            (object)['bulan' => 'Juni'],
            (object)['bulan' => 'Juli'],
            (object)['bulan' => 'Agustus'],
            (object)['bulan' => 'September'],
            (object)['bulan' => 'Oktober'],
            (object)['bulan' => 'November'],
            (object)['bulan' => 'Desember'],
        ];


        for ($i = 0; $i < count($data); $i++) {

            if ($i > 0){
                $data[$i]->singleSmoothing = ($alpha * $data[$i]->jumlah_kunjungan) + ((1 - $alpha) * $data[$i-1]->singleSmoothing);
                $data[$i]->doubleSmoothing = ($alpha * $data[$i]->singleSmoothing) + ((1 - $alpha) * $data[$i-1]->doubleSmoothing);
                $data[$i]->tripleSmoothing = ($alpha * $data[$i]->doubleSmoothing) + ((1 - $alpha) * $data[$i-1]->tripleSmoothing);

                $data[$i]->aForcast = ((3 * $data[$i]->singleSmoothing) - (3 * $data[$i]->doubleSmoothing)) + ($data[$i]->tripleSmoothing);

                // $data[$i]->bForcast = (($alpha / 2) * (1 - $alpha)**2) * (( (6 - (5 * $alpha)) * $data[$i]->singleSmoothing ) - ( (10 - (8 * $alpha)) * $data[$i]->doubleSmoothing ) + ( (4 - (3 * $alpha)) * $data[$i]->tripleSmoothing ));
                $data[$i]->bForcast = ($alpha / ( 2*((1-$alpha)**2)) ) * (( (6 - (5 * $alpha)) * $data[$i]->singleSmoothing ) - ( (10 - (8 * $alpha)) * $data[$i]->doubleSmoothing ) + ( (4 - (3 * $alpha)) * $data[$i]->tripleSmoothing ));

                $data[$i]->cForcast = ($alpha**2 / (1 - $alpha)**2) * ($data[$i]->singleSmoothing - (2 * ($data[$i]->doubleSmoothing)) + $data[$i]->tripleSmoothing);

                if ($i != ($lastElement)) {
                    $data[$i+1]->resultForcasting= $data[$i]->aForcast + ($data[$i]->bForcast * $masaForcasting) + ((0.5 * $data[$i]->cForcast) * ($masaForcasting**2));
                    $data[$i+1]->countError = $data[$i+1]->jumlah_kunjungan - $data[$i+1]->resultForcasting;
                    $data[$i+1]->absError = abs($data[$i+1]->countError);
                    $data[$i+1]->percentageError = $data[$i+1]->absError / $data[$i+1]->jumlah_kunjungan * 100;

                    $totalPercentageError += $data[$i+1]->percentageError;
                }
            }
        }


        for ($i=0; $i < 12; $i++) {
            $forcast[$i]->tahun = $data[$lastElement]->tahun + 1;
            $forcast[$i]->resultForcast = $data[$lastElement]->aForcast + ($data[$lastElement]->bForcast * ($i+1)) + ((0.5 * $data[$lastElement]->cForcast) * (($i+1)**2));

        }

        // hitung mape
        $MAPE = $totalPercentageError / $lastElement;


        return view('data-wisatawan', [
            'dataKebutuhan' => $data,
            'dataForcast' => $forcast,
            'mape' => $MAPE
        ]);

        // dd($data);
    }
}
