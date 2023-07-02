<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mailsetting;


class MailSettingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('role_or_permission:Mail access|Mail edit', ['only' => ['index']]);
        // $this->middleware('role_or_permission:Mail edit', ['only' => ['update']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->can('Mail access')){
            $mail= Mailsetting::find(1);

            return view('setting.setting.mail',['mail'=>$mail]);
        }else{
            abort(403);
        }
    }

    public function update(Request $request, Mailsetting $mailsetting)
    {

        $data = $request->validate([
            'mail_transport'  =>'required',
            'mail_host'       =>'required',
            'mail_port'       =>'required',
            'mail_username'   =>'required',
            'mail_password'   =>'required',
            'mail_encryption' =>'required',
            'mail_from'       =>'required',
        ]);

        $mailsetting->update($data);
        return redirect()->back()->withSuccess('Mail updated !!!');
    }

}
