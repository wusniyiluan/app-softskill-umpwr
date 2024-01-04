<?php
namespace App\Http\Controllers;
use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    // Menampilkan semua data peserta
    public function index(Request $request)
    {
        $prodiOptions = Peserta::select('prodi')->distinct()->get();;
        $selectedProdi = $request->input('prodi'); 

        $tahunOptions = Peserta::distinct('tahun')->pluck('tahun');
        $selectedTahun = $request->input('tahun');
        
        $levelOptions = Peserta::distinct('level')->pluck('level');
        $selectedLevel = $request->input('level');

        $search = $request->input('search'); // Dapatkan inputan dari form pencarian

        $data = Peserta::query();
        if ($search) {
            $data->where('nama_lengkap', 'LIKE', '%' . $search . '%');
        }
    
        if ($selectedProdi) {
            $data->where('prodi', $selectedProdi);
        }
        
        if ($selectedTahun) {
            $data->where('tahun', $selectedTahun);
        }
    
        if ($selectedLevel) {
            $data->where('level', $selectedLevel);
        }

       
        $data = $data->get();
    
        return view('peserta.datapeserta', compact('data', 'tahunOptions', 'levelOptions', 'prodiOptions', 'selectedTahun',
         'selectedLevel', 'selectedProdi', 'search'));
    }

    // Menampilkan form untuk menambahkan data peserta
    public function tambahpeserta(){
    return view ('peserta.tambahdata');
    }

    public function insertdata(Request $request)
    {
        //Proses Validasi
        $request->validate ([
            'NIM' => 'required',
            'nama_lengkap' => 'required',
            'prodi' => 'required',
            'level' => 'required',
            'tahun' => 'required',
        ]); 
        $data = [
            'NIM' => $request->NIM,
            'nama_lengkap' => $request->nama_lengkap,
            'prodi' => $request->prodi,
            'level' => $request->level,
            'tahun' => $request->tahun,

        ];
        //Memasukan ke tabel mahasiswa
        Peserta::create($data);
        //Fasilitator::create($request->all());

        return redirect()->route('peserta.datapeserta')->with('success', 'Data Berhasil Di Tambahkan.');
    }


    // Menampilkan data peserta berdasarkan ID tertentu
    public function tampilkandata($id)
    {
        $peserta = Peserta::findOrFail($id); // Mencari data peserta berdasarkan ID
        return view('peserta.tampilkandata', compact('peserta')); // Mengirim data ke tampilan tampilkandata.blade.php
        //$data = Peserta::findOrFail($id); // Mencari data peserta berdasarkan ID
        //dd($data); // Tampilkan data peserta dalam bentuk debug (dd: dump and die)
    }
    
     //fungsi menampilkan data
     public function editdata($id)
     {
         $data = Peserta::find($id);
         return view('peserta.editdata', compact('data'));
     }

    public function updatedata(Request $request, $id)
    {
        $request->validate([
            'NIM' => 'required',
            'nama_lengkap' => 'required',
            'prodi' => 'required',            
            'level' => 'required|integer',
            'tahun' => 'required|integer',

        ]);
        $data = Peserta::find($id);
        $data->update($request->all());

        return redirect()->route('peserta.datapeserta')->with('success', 'Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $data = Peserta::find($id);
        $data->delete();

        return redirect()->route('peserta.datapeserta')->with('success', 'Data Berhasil Di Hapus');
    }
}
