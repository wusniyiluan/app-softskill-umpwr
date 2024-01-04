<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\pengguna;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Attribute\AsController;

class HalamanController extends Controller
{ 
    function utama(){
    //halaman utama
        return view("halaman/utama");
    }
   function index(){
    //halaman login

        return view("halaman/index");

    }
    function login(Request $request)
     //request login
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required',
        ],[
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',

        ]);

        $infologin = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($infologin)){
            //kalau otentikasi sukses
            return redirect('dashboard')->with('success', 'Berhasil Login');
        }else{
            //kalau otentikasi gagal
            return redirect('halaman/index')->withErrors('Username atau Password yang dimasukkan tidak benar');
        }
        
    }
    function logout(){
        //logout
        Auth::logout();
        return redirect('softskill/ump')->with('success', 'Berhasil Logout');
    }

    public function profile()
    {
        // Mengambil data pengguna yang telah login
        $user = Auth::user();

        // Tampilkan halaman profil dengan data pengguna
        return view('profile', compact('user'));
    }
    
    function register()
    {
        //halaman registrasi peserta
        return view("halaman/register");
    }
    function create(Request $request)
    {
        //request registrasi peserta

        $request->validate([
            'user_role'=>'required',
            'username'=>['required', 'string', 'max:255', 'unique:pengguna,username'],
            'email'=>['required'],
            'password'=>'required|min:6',
        ],[
            'user_role'=>'Userrole wajib diisi angka 1',
            'username.required' => 'Username wajib diisi',
            'username.username' => 'Masukkan nama yang benar',
            'username.unique' => 'username sudah di gunakan,
            Silahkan masukkan username yang lain ',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Minimal password adalah 6 karakter',

        ]);

        $data =[
            'email'=>$request->email,
            'user_role'=>$request->user_role,
            'username' => $request->username,
            'password' => Hash::make($request->password)
            
        ];
        pengguna::create($data);

        $inforegister = [
            'email'=>$request->email,
            'user_role'=>$request->user_role,
            'username' => $request->username,
            'password' => $request->password,
            
        ];

        if(Auth::attempt($inforegister)){
            //kalau otentikasi sukses
            return redirect('halaman/index')->with('success', 'Berhasil Registrasi');
        }else{
            //kalau otentikasi gagal
            return redirect('register')->withErrors('Username atau Password yang dimasukkan tidak benar');
        }
    }
    function fasilitator()
    {
        //halaman registrasi fasilitator
        return view("halaman/fasilitator");
    }
    function create1(Request $request)
    {   //request registrasi fasilitator

        $request->validate([
            'user_role'=>'required',
            'username'=>['required', 'string', 'max:255', 'unique:pengguna,username'],
            'email'=>['required'],
            'password'=>'required|min:6',
        ],[
            'user_role'=>'Userrole wajib diisi angka 2',
            'username.required' => 'Username wajib diisi',
            'username.username' => 'Masukkan nama yang benar',
            'username.unique' => 'username sudah di gunakan,
            Silahkan masukkan username yang lain ',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Minimal password adalah 6 karakter',

        ]);

        $data =[
            'email'=>$request->email,
            'user_role'=>$request->user_role,
            'username' => $request->username,
            'password' => Hash::make($request->password)
            
        ];
        pengguna::create($data);

        $inforegister = [
            'email'=>$request->email,
            'user_role'=>$request->user_role,
            'username' => $request->username,
            'password' => $request->password,
            
        ];

        if(Auth::attempt($inforegister)){
            //kalau otentikasi sukses
            return redirect('halaman/index')->with('success', 'Berhasil Registrasi');
        }else{
            //kalau otentikasi gagal
            return redirect('register')->withErrors('Username atau Password yang dimasukkan tidak benar');
        }

    }
    function superadmin()
    {
        //halaman registrasi superadmin
        return view("halaman/superadmin");
    }
    function create2(Request $request)
    {   //request registrasi superadmin

        $request->validate([
            'user_role'=>'required',
            'username'=>['required', 'string', 'max:255', 'unique:pengguna,username'],
            'email'=>['required'],
            'password'=>'required|min:6',
        ],[
            'user_role'=>'Userrole wajib diisi angka 3',
            'username.required' => 'Username wajib diisi',
            'username.username' => 'Masukkan nama yang benar',
            'username.unique' => 'username sudah di gunakan,
            Silahkan masukkan username yang lain ',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Minimal password adalah 6 karakter',

        ]);

        $data =[
            'email'=>$request->email,
            'user_role'=>$request->user_role,
            'username' => $request->username,
            'password' => Hash::make($request->password)
            
        ];
        pengguna::create($data);

        $inforegister = [
            'email'=>$request->email,
            'user_role'=>$request->user_role,
            'username' => $request->username,
            'password' => $request->password,
            
        ];

        if(Auth::attempt($inforegister)){
            //kalau otentikasi sukses
            return redirect('halaman/index')->with('success', 'Berhasil Registrasi');
        }else{
            //kalau otentikasi gagal
            return redirect('register')->withErrors('Username atau Password yang dimasukkan tidak benar');
        }

    }
   

}
?>
<?php
