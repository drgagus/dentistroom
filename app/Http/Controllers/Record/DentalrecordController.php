<?php

namespace App\Http\Controllers\Record;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diag;
use App\Models\Village;
use App\Models\School;
use App\Models\Treatment;
use App\Models\Dentalrecord;
use App\Models\Dentistguest;
use Auth;

class DentalrecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('record.create', [
            'diags' => Diag::where('onoff', 1)->get(),
            'treatments' => Treatment::get(),
            'villages' => Village::get(),
            'schools' => School::get(),
            'dentistguests' => Dentistguest::where('cektahun', 1)->orderBy('tahun', 'desc')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggalkunjungan' => 'required|date',
            'norm' => 'max:10',
            'nama' => 'required|max:50',
            'jeniskelamin' => 'required|max:20',
            'tanggallahir' => 'required|date',
            'village_id' => 'required',
            'school_id' => 'nullable',
            'pasien' => 'required',
            'diag_id' => 'required',
            'treatment_id' => 'required',
            'obat' => 'max:255',
            'catatan' => 'max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $usia = $this->usia($request->tanggallahir, $request->tanggalkunjungan);
        if ($request->file('image')):
            $filephoto = request()->file('image');
            $file = $filephoto->storeAs("images/record", "image-{$filephoto->getMtime()}.{$filephoto->getClientOriginalExtension()}");
        else:
            $file = null ;
        endif;

        Dentalrecord::create([
            'tanggalkunjungan' => $request->tanggalkunjungan,
            'norm' => $request->norm,
            'nama' => $request->nama,
            'jeniskelamin' => $request->jeniskelamin,
            'tanggallahir' => $request->tanggallahir,
            'umurtahun' => $usia['tahun'],
            'umurbulan' => $usia['bulan'],
            'umurhari' => $usia['hari'],
            'village_id' => $request->village_id,
            'school_id' => $request->school_id,
            'pasien' => $request->pasien,
            'diag_id' => $request->diag_id,
            'treatment_id' => $request->treatment_id,
            'obat' => $request->obat,
            'catatan' => $request->catatan,
            'image' => $file,
            'user_id' => Auth::user()->id
        ]);
        return redirect()->route('dentist.record.year', ['year' => date('Y')])->with('status', 'Data berhasil diinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($year)
    {
        $records = Dentalrecord::whereYEAR('tanggalkunjungan', $year)->orderby('tanggalkunjungan', 'asc')->get();
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

        return view('record.record', [
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Dentalrecord::where('id',$id)->where('user_id', Auth::user()->id)->firstOrFail();
        return view('record.edit', [
            'record' => $record,
            'villages' => Village::get(),
            'schools' => School::get(),
            'diags' => Diag::get(),
            'treatments' => Treatment::get(),
            'dentistguests' => Dentistguest::where('cektahun', 1)->orderBy('tahun', 'desc')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggalkunjungan' => 'required|date',
            'norm' => 'max:10',
            'nama' => 'required|max:50',
            'jeniskelamin' => 'required|max:20',
            'tanggallahir' => 'required|date',
            'village_id' => 'required',
            'school_id' => 'nullable',
            'pasien' => 'required',
            'diag_id' => 'required',
            'treatment_id' => 'required',
            'obat' => 'max:255',
            'catatan' => 'max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $record = Dentalrecord::where('id',$id)->where('user_id', Auth::user()->id)->firstOrFail();
        $usia = $this->usia($request->tanggallahir, $request->tanggalkunjungan);
        if ($request->file('image')):
            $filephoto = request()->file('image');
            $file = $filephoto->storeAs("images/record", "image-{$filephoto->getMtime()}.{$filephoto->getClientOriginalExtension()}");
            
            $oldimage = $record->image;
            if($oldimage):
                \Storage::delete($oldimage);
            endif;

            Dentalrecord::where('id',$id)->where('user_id',Auth::user()->id)->update([
                'tanggalkunjungan' => $request->tanggalkunjungan,
                'norm' => $request->norm,
                'nama' => $request->nama,
                'tanggallahir' => $request->tanggallahir,
                'umurtahun' => $usia['tahun'],
                'umurbulan' => $usia['bulan'],
                'umurhari' => $usia['hari'],
                'jeniskelamin' => $request->jeniskelamin,
                'village_id' => $request->village_id,
                'school_id' => $request->school_id,
                'pasien' => $request->pasien,
                'diag_id' => $request->diag_id,
                'treatment_id' => $request->treatment_id,
                'obat' => $request->obat,
                'catatan' => $request->catatan,
                'image' => $file,
                'user_id' => Auth::user()->id
            ]);
            return redirect()->route('dentist.record.year', ['year' => date('Y')])->with('status', 'Data berhasil diubah');
        else:
            Dentalrecord::where('id',$id)->where('user_id',Auth::user()->id)->update([
                'tanggalkunjungan' => $request->tanggalkunjungan,
                'norm' => $request->norm,
                'nama' => $request->nama,
                'tanggallahir' => $request->tanggallahir,
                'umurtahun' => $usia['tahun'],
                'umurbulan' => $usia['bulan'],
                'umurhari' => $usia['hari'],
                'jeniskelamin' => $request->jeniskelamin,
                'village_id' => $request->village_id,
                'school_id' => $request->school_id,
                'diag_id' => $request->diag_id,
                'treatment_id' => $request->treatment_id,
                'obat' => $request->obat,
                'catatan' => $request->catatan,
                'user_id' => Auth::user()->id
            ]);
            return redirect()->route('dentist.record.year', ['year' => date('Y', strtotime($request->tanggalkunjungan))])->with('status', 'Data berhasil diubah');
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Dentalrecord::where('id',$id)->where('user_id', Auth::user()->id)->firstOrFail();
        if ($record->image):
            \Storage::delete($record->image);
        endif;
        Dentalrecord::destroy($record->id);
        return redirect()->route('dentist.record.year', ['year' => date('Y', strtotime($record->tanggalkunjungan))])->with('status', 'Data berhasil dihapus');
    }

    public function deletephoto($id)
    {
        $record = Dentalrecord::where('id',$id)->where('user_id', Auth::user()->id)->firstOrFail();
        if ($record->image):
            \Storage::delete($record->image);
            Dentalrecord::where('id',$id)->where('user_id',Auth::user()->id)->update([
                'image' => null
            ]);
            return redirect()->route('dentist.edit', ['id' => $id])->with('status', 'Foto berhasil dihapus');     
        else:
            return redirect()->route('dentist.edit', ['id' => $id])->with('status', 'Tidak ada foto yang dihapus');     
        endif;
    }

    public function usia ($tanggallahir, $tanggalkunjungan)
    {
        $tgl_lahir= date('d', strtotime($tanggallahir));
		$bln_lahir= date('m', strtotime($tanggallahir));
		$thn_lahir= date('Y', strtotime($tanggallahir));
    
        $tgl_today = date('d', strtotime($tanggalkunjungan));
		$bln_today= date('m', strtotime($tanggalkunjungan));
		$thn_today = date('Y', strtotime($tanggalkunjungan));

        if ($tgl_today >= $tgl_lahir) {
            $hari = $tgl_today - $tgl_lahir ; 
                if ($bln_today >= $bln_lahir) {
                    $bulan = $bln_today - $bln_lahir ;
                    $tahun = $thn_today - $thn_lahir ;
                }else if ($bln_today < $bln_lahir) {
                    $bulan = ($bln_today + 12 )  - $bln_lahir ;	
                    $tahun = ($thn_today - 1 ) - $thn_lahir ;
                }else{ 
                }
        }else if ($tgl_today < $tgl_lahir) {
            $hari = ($tgl_today + 30 )  - $tgl_lahir ;
                if (($bln_today-1) >= $bln_lahir) {
                    $bulan = ($bln_today-1) - $bln_lahir ;
                    $tahun = $thn_today - $thn_lahir ;
                }else if (($bln_today-1) < $bln_lahir) {
                    $bulan = ($bln_today+11) - $bln_lahir ;
                    $tahun = ($thn_today-1) - $thn_lahir ;
                }else{
                }
        }else{
        }

        $usia = [
                    'tahun' => $tahun, 
                    'bulan' => $bulan, 
                    'hari' => $hari
                ];
        return $usia;
    }
}
