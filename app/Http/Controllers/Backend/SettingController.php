<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SettingController extends Controller
{
    public function index()
    {
        $socialLinks = DB::table('social')->first();
        return view('backend.setting.social', compact('socialLinks'));
    }

    public function updateSocial(Request $request, $id)
    {
        $data = array();
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['instagram'] = $request->instagram;
        $data['linkedin'] = $request->linkedin;

        DB::table('social')->where('id', $id)->update($data);

        return Redirect()->route('social');
    }
}
