<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diag;
use App\Models\Village;
use App\Models\School;
use App\Models\Treatment;
use App\Models\Dentalrecord;
use App\Models\Dentistguest;
use App\Models\User;
use Auth;
use Hash;

class GuestController extends Controller
{
    public function show($year)
    {
        $records = Dentalrecord::whereYEAR('tanggalkunjungan', $year)->get();
        $all = count($records);
        $men = count(Dentalrecord::where('jeniskelamin', 'Laki-laki')->whereYEAR('tanggalkunjungan', $year)->get());
        $women = count(Dentalrecord::where('jeniskelamin', 'Perempuan')->whereYEAR('tanggalkunjungan', $year)->get());

        $villages = Village::get();
        if (count($villages)):
            foreach ($villages as $village):
                $id = $village->id;
                $recorddesa[$id][1] = count(Dentalrecord::where('jeniskelamin', 'Laki-laki')->where('village_id', $village->id)->whereYEAR('tanggalkunjungan', $year)->get());
                $recorddesa[$id][2] = count(Dentalrecord::where('jeniskelamin', 'Perempuan')->where('village_id', $village->id)->whereYEAR('tanggalkunjungan', $year)->get());
            endforeach;
        else:
            $recorddesa = [];
        endif;
        
        $schools = School::get();
        if (count($schools)):
            foreach ($schools as $school):
                $id = $school->id;
                $recordsekolah[$id][1] = count(Dentalrecord::where('jeniskelamin', 'Laki-laki')->where('school_id', $school->id)->whereYEAR('tanggalkunjungan', $year)->get());
                $recordsekolah[$id][2] = count(Dentalrecord::where('jeniskelamin', 'Perempuan')->where('school_id', $school->id)->whereYEAR('tanggalkunjungan', $year)->get());
            endforeach;
        else:
            $recordsekolah = [];
        endif;
        $recordallschool = count(Dentalrecord::where('school_id', '!=', null)->whereYEAR('tanggalkunjungan', $year)->get());

        
        $treatments = Treatment::get();
        if (count($treatments)):
            foreach ($treatments as $treatment):
                $id = $treatment->id;
                $recordtindakan[$id][1] = count(Dentalrecord::where('jeniskelamin', 'Laki-laki')->where('treatment_id', $treatment->id)->whereYEAR('tanggalkunjungan', $year)->get());
                $recordtindakan[$id][2] = count(Dentalrecord::where('jeniskelamin', 'Perempuan')->where('treatment_id', $treatment->id)->whereYEAR('tanggalkunjungan', $year)->get());
            endforeach;
        else:
            $recordtindakan = [];
        endif;
        
        $diags = Diag::where('onoff', 1)->get();
        if (count($diags)):
            foreach ($diags as $diag):
                $id = $diag->id;
                $recorddiagnosa[$id] = count(Dentalrecord::where('diag_id', $diag->id)->whereYEAR('tanggalkunjungan', $year)->get());
            endforeach;
        else:
            $recorddiagnosa = [];
        endif;

        return view('guest.record', [
            'tahun' => $year,
            'records' => $records,
            'all' => $all,
            'men' => $men,
            'women' => $women,
            'diags' => $diags,
            'recorddiagnosa' => $recorddiagnosa,
            'treatments' => $treatments,
            'recordtindakan' => $recordtindakan,
            'villages' => $villages,
            'recorddesa' => $recorddesa,
            'schools' => $schools,
            'recordsekolah' => $recordsekolah,
            'recordallschool' => $recordallschool,
            'dentistguests' => Dentistguest::where('cektahun', 1)->orderBy('tahun', 'desc')->get()
        ]);
    }

    public function setting()
    {
        return view('guest.setting', [
            'dentistguests' => Dentistguest::where('cektahun', 1)->orderBy('tahun', 'desc')->get(),
            'guests' => Dentistguest::orderBy('tahun', 'desc')->get(),
            'guestaccount' => User::where('position', 'dentistguest')->firstOrFail()
        ]);
    }
    
    public function permission(Request $request)
    {
        for ($i = date('Y'); $i >= date('Y')-4 ; $i--) :
            $tahun = 'tahun'.$i ;
            $cektahun = $request->$tahun;
            $tahun = Dentistguest::where('tahun', $i)->first();
            if($tahun):
                if ($cektahun):
                    Dentistguest::where('tahun', $i)->update([
                        'cektahun' => $cektahun
                    ]);
                else:
                    Dentistguest::where('tahun', $i)->update([
                        'cektahun' => 0
                    ]);
                endif;
            else:
                if ($cektahun):
                    Dentistguest::create([
                        'tahun' => $i,
                        'cektahun' => $cektahun
                    ]);
                else:
                    Dentistguest::create([
                        'tahun' => $i,
                        'cektahun' => 0
                    ]);
                endif;
            endif;
        endfor;
        return redirect()->route('dentist.guest.setting')->with('hakakses', 'Hak akses telah diubah');

    }

    public function password(Request $request)
    {
        $request->validate([
            'password' => 'nullable',
            'expired' => 'date',
        ]);

        if($request->password):
            User::where('position', 'dentistguest')->update([
                'password' => Hash::make($request -> password),
                'expired' => $request->expired
            ]);
            return redirect()->route('dentist.guest.setting')->with('password', 'Password dan tanggal expired telah diubah');
        else:
            User::where('id', 2)->update([
                'expired' => $request->expired
            ]);
            return redirect()->route('dentist.guest.setting')->with('password', 'Tanggal expired telah diubah');
        endif;
    }
}
