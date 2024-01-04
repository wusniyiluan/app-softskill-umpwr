<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitator;
use Illuminate\Support\Facades\Crypt;

class FasilitatorController extends Controller
{
    // Menampilkan daftar fasilitator
    public function index(Request $request)
{
    // Mengambil data program studi unik dari tabel Fasilitator
    $programStudis = Fasilitator::select('Prodi')->distinct()->get(); // Fetch distinct program studies from the Fasilitator table

    // Mengambil nilai program studi yang dipilih dari input form
    $selectedProdi = $request->input('prodi'); 

    // Membuat instance query untuk model Fasilitator
    $data = Fasilitator::query();

    // Mengecek apakah terdapat parameter pencarian 'search' pada request
    if ($request->has('search')) {
        // Menambahkan kondisi ke query untuk mencocokkan Nama_Lengkap dengan nilai pencarian
        $data->where('Nama_Lengkap', 'LIKE', '%' . $request->search . '%');
    }

    // Mengecek apakah terdapat program studi yang dipilih
    if ($selectedProdi) {
        // Menambahkan kondisi ke query untuk mencocokkan Prodi dengan program studi yang dipilih
        $data->where('Prodi', $selectedProdi);
    }

    // Melakukan paginasi pada hasil query dengan 5 item per halaman
    $data = $data->paginate(5);

    // Menampilkan pesan jika data tidak ditemukan
    if ($data->isEmpty()) {
        return view('fasilitator.index')->with(['message' => 'Data tidak ditemukan.', 'programStudis' => $programStudis, 'selectedProdi' => $selectedProdi]);
    }

    // Mengambil data fasilitator berdasarkan ID
    return view('fasilitator.index', compact('data', 'programStudis', 'selectedProdi'));
}

    // Menampilkan formulir pembuatan fasilitator baru (CREATE DATA)
    public function create()
    {
        return view('fasilitator.create');
    }

    // Menyimpan data fasilitator baru ke dalam database
    public function insertdata(Request $request)
    {
        //Proses Validasi
        $request->validate([
            'NIDN' => 'required|numeric|unique:fasilitators,NIDN',
            'Nama_Lengkap' => 'required',
            'Prodi' => 'required',
        ], [
            'NIDN.required' => 'NIDN Wajib Diisi!',
            'NIDN.numeric' => 'NIDN Wajib Dalam Angka!',
            'NIDN.unique' => 'NIDN Yang Diinputkan Sama!',
            'Nama_Lengkap.required' => 'Nama Wajib Diisi!',
            'Prodi.required' => 'Prodi Wajib Diisi!',
        ]);
        //Membuat array $data yang berisi nilai dari input form yang diterima dari $request
        $data = [
            'NIDN' => $request->NIDN,
            'Nama_Lengkap' => $request->Nama_Lengkap,
            'Prodi' => $request->Prodi,
        ];
        // Memasukkan data ke dalam tabel fasilitators
        Fasilitator::create($data);

        //Fasilitator::create($request->all());
        // Redirect ke halaman index fasilitator dengan pesan sukses
        return redirect()->route('fasilitator.index')->with('success', 'Data Berhasil Di Tambahkan.');
    }

    // Menampilkan detail fasilitator (fungsi READ DATA)
    public function show($id)
    {
        $decryptID = Crypt::decryptString($id);
        // Mengambil data fasilitator berdasarkan ID, dan jika tidak ditemukan, menghasilkan HTTP 404 (Not Found)
        $fasilitator = Fasilitator::findOrFail($decryptID);
        //return view('fasilitator.show', compact('fasilitator'));
        return view('fasilitator.show', ['fasilitator' => $fasilitator]);
    }

    // Menampilkan formulir edit fasilitator (UPDATE DATA)
    public function edit($id)
    {
    
        $decryptID = Crypt::decryptString($id); // Mendekripsi ID yang diterima menggunakan metode decryptString dari Crypt
        $data = Fasilitator::find($decryptID); // Mencari data fasilitator berdasarkan ID yang telah didekripsi
        
        return view('fasilitator.edit', compact('data'));
    }

    // Mengupdate data fasilitator
    public function updatedata(Request $request, $id)
    {
        $request->validate([
            'NIDN' => 'required',
            'Nama_Lengkap' => 'required',
            'Prodi' => 'required',
        ]);
        // Mendapatkan data fasilitator yang akan diupdate berdasarkan ID
        $data = Fasilitator::find($id);
        $data->update($request->all()); // Mengupdate semua data dengan nilai dari input form

        return redirect()->route('fasilitator.index')->with('success', 'Data Berhasil Di Update');
    }

    // Menghapus data fasilitator (DELETE DATA)
    public function delete($id)
    {
        $data = Fasilitator::find($id);
        $data->delete();

        return redirect()->route('fasilitator.index')->with('success', 'Data Berhasil Di Hapus');
    }


}
