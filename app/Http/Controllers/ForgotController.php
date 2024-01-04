<?php

namespace App\Http\Controllers;

use App\Models\pengguna;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class ForgotController extends Controller
{
    function forgot()
    {
        //halaman forgot password
        return view("halaman/forgot");
    }
    function create3(Request $request)
    {


        $request->validate([
            'email' => "required|email|exists:pengguna",

        ],[
            'email.required' => 'Email wajib diisi',
        ]);

        $token = Str::random(64);

        DB::table('token')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send("emails.forgot", ['token' => $token], function ($massage) use ($request) {
            $massage->to($request->email);
            $massage->subject('Reset Password');
        });

        return redirect("forgot")->with('success', 'Email sudah di kirim');

    }

    function reset($token)
    {
        return view('halaman/newpass', compact('token'));
    }

    function passwordpost(Request $request)
    {
        $request->validate([
            'email' => "required|email|exists:pengguna",
            'password' => "required|string|min:6|confirmed",
            'password_confirmation' => "required"
        ]);

        $updatepassword = DB::table('token')
            ->where([
                'email' => $request->email,
                'token' => $request->token,
            ])->first();

        if (!$updatepassword) {
            return redirect()->to(route("reset.password"))->with('error', 'invalid');
        }

        pengguna::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        //DB::table('token')->where(['email' => $request->email])->delete();

        return redirect("/halaman/index")->with('success', 'Password sudah diganti');

    }
    // halaman form new password
    /*function newpass()
    {
        return view('halaman/newpass');
    }*/
}
;
?>