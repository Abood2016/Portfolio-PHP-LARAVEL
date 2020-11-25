<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\settingRequest;
use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();
        return view('admin.setting.index', compact('settings'));
    }

    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('admin.setting.edit', compact('setting'));
    }

    public function update(settingRequest $request)
    {
        $setting = Setting::find($request->setting_id);

        $array = [];
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            if (File::exists(public_path('images/settings/') . $setting->image)) {
                File::delete(public_path('images/settings/') . $setting->image);
            }
            $file->move(public_path('images/settings/'), $filename);
            $array = ['image' => $filename] + $array;
        }

        if ($request->site_title != $setting->site_title) {
            $array['site_title'] = $request->site_title;
        }

        if ($request->job_title != $setting->job_title) {
            $array['job_title'] = $request->job_title;
        }

        if ($request->twitter_url != $setting->twitter_url) {
            $array['twitter_url'] = $request->twitter_url;
        }

        if ($request->facebook_url != $setting->facebook_url) {
            $array['facebook_url'] = $request->facebook_url;
        }

        if ($request->about != $setting->about) {
            $array['about'] = $request->about;
        }

        if ($request->location != $setting->location) {
            $array['location'] = $request->location;
        }
        if ($request->linkdin_url != $setting->linkdin_url) {
            $array['linkdin_url'] = $request->linkdin_url;
        }


        if (!empty($array)) {
            $setting->update($array);
        }

        return response()->json([
            'status' => true,
            'msg' => 'تم تحديث البيانات بنجاح',
        ]);
    }
}
