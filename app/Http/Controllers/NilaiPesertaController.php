<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NilaiPeserta;
use App\Models\Peserta;
use App\Models\Fasilitator;


class NilaiPesertaController extends Controller
{
    public function index(Request $request)
{
    $tahunOptions = NilaiPeserta::distinct('tahun')->pluck('tahun');
    $levelOptions = NilaiPeserta::distinct('level')->pluck('level');

    $selectedTahun = $request->input('tahun');
    $selectedLevel = $request->input('level');

    $query = NilaiPeserta::query();

    if ($selectedTahun) {
        $query->where('tahun', $selectedTahun);
    }

    if ($selectedLevel) {
        $query->where('level', $selectedLevel);
    }

    $nilaiPesertas = $query->with(['peserta', 'fasilitator'])->get();

    return view('nilai_peserta.index', compact('nilaiPesertas', 'tahunOptions', 'levelOptions', 'selectedTahun',
     'selectedLevel'));
}


    public function create()
    {
        $pesertaa = Peserta::all();
        $fasil = Fasilitator::all();
        $tahunOptions = NilaiPeserta::distinct('tahun')->pluck('tahun');
        $levelOptions = NilaiPeserta::distinct('level')->pluck('level');

        return view('nilai_peserta.create', compact('tahunOptions', 'levelOptions', 'pesertaa', 'fasil'));
    }

    public function store(Request $request)
{
    $nilaiPeserta = new NilaiPeserta;

    $nilaiPeserta->peserta_id = $request->input('peserta_id');
    $nilaiPeserta->fasilitator_id = $request->input('fasilitator_id');
    $nilaiPeserta->nilai_akhir = $request->input('nilai_akhir');
    $nilaiPeserta->presensi = $request->input('presensi');
    $nilaiPeserta->tahun = $request->input('tahun');
    $nilaiPeserta->level = $request->input('level');

    // Hitung konversi presensi
    $nilaiPeserta->presensi = $this->Presensi($nilaiPeserta->presensi);

    // Hitung total nilai
    $nilaiPeserta->total_nilai = ($nilaiPeserta->nilai_akhir + $nilaiPeserta->presensi) / 2;

    // Hitung konversi nilai
    $nilaiPeserta->konversi_nilai = $this->konversiNilai($nilaiPeserta->total_nilai);

    $nilaiPeserta->save();

    return redirect()->route('nilai_peserta.index')->with('success', 'Data nilai berhasil disimpan');
}
    private function Presensi($presensi)
    {
        return ($presensi / 4) * 100;
    }

    private function konversiNilai($totalNilai)
    {
        if ($totalNilai >= 46 && $totalNilai < 59) {
            return 'D';
        }elseif ($totalNilai >= 60 && $totalNilai < 69) {
            return 'C';
        } elseif ($totalNilai >= 70 && $totalNilai < 84) {
            return 'B';
        } elseif ($totalNilai >= 85 && $totalNilai <= 100) {
            return 'A';
        } else {
            return 'Tidak Valid';
        }
    }

    public function show($id)
    {
        $nilaiPeserta = NilaiPeserta::findOrFail($id);

        return view('nilai_peserta.view', compact('nilaiPeserta'));
    }

    public function edit($id)
    {
        $pesertaa = Peserta::all();
        $fasil = Fasilitator::all();
        $nilaiPeserta = NilaiPeserta::findOrFail($id);

        return view('nilai_peserta.edit', compact('nilaiPeserta', 'pesertaa', 'fasil'));
    }

    public function update(Request $request, $id)
    {
        $nilaiPeserta = NilaiPeserta::findOrFail($id);

        $validatedData = $request->validate([
            'peserta_id' => 'required',
            'fasilitator_id' => 'required',
            'nilai_akhir' => 'required',
            'presensi' => 'required',
            'tahun' => 'required',
            'level' => 'required',
        ]);

        $nilaiPeserta->update($validatedData);

        // Hitung konversi presensi
        $nilaiPeserta->presensi = $this->Presensi($nilaiPeserta->presensi);

        // Hitung total nilai
        $nilaiPeserta->total_nilai = ($nilaiPeserta->nilai_akhir + $nilaiPeserta->presensi)/2;

        // Hitung konversi nilai
        $nilaiPeserta->konversi_nilai = $this->konversiNilai($nilaiPeserta->total_nilai);
        $nilaiPeserta->save();

        return redirect()->route('nilai_peserta.view', $nilaiPeserta->id)->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $nilaiPeserta = NilaiPeserta::findOrFail($id);
        $nilaiPeserta->delete();

        return redirect()->route('nilai_peserta.index')->with('success', 'Data berhasil dihapus!');
    }
}

