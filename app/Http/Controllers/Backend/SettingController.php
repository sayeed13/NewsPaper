<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SettingController extends Controller
{
    public function socialindex()
    {
        $socialLinks = DB::table('social')->first();
        return view('backend.setting.social', compact('socialLinks'));
    }

    public function seoindex()
    {
        $seo = DB::table('seo')->first();
        return view('backend.setting.seo', compact('seo'));
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

    public function updateSeo(Request $request, $id)
    {
        $data = array();
        $data['meta_author'] = $request->meta_author;
        $data['meta_title'] = $request->meta_title;
        $data['meta_keywords'] = $request->meta_keywords;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['google_verification'] = $request->google_verification;
        $data['alexa_analytics'] = $request->alexa_analytics;

        DB::table('seo')->where('id', $id)->update($data);

        return Redirect()->route('seo');
    }
}
