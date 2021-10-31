<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dentistguest;
use App\Models\Dentalrecord;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        for($i = date('Y'); $i >=  date('Y')-3 ; $i--  ):
            $kunjungan[$i] = Dentalrecord::whereYEAR('tanggalkunjungan', $i)->get();
        endfor;

        return view('home', [
            'dentistguests' => Dentistguest::where('cektahun', 1)->orderBy('tahun', 'desc')->get(),
            'kunjungan' => $kunjungan
        ]);
    }
}
