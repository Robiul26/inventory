<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::where('status', 1)->get();
        return view('backend.pages.setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.setting.create-edit');
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
            "logo" => "required|image|mimes:jpg,png,jpeg,gif",
            "favicon" => "required|image|mimes:jpg,png,jpeg,gif",
            "banner_img" => "nullable|image|mimes:jpg,png,jpeg,gif",
            "title" => "required",
            "email" => "required",
            "phone" => "required",
            "mobile" => "required",

        ]);

        $setting = new setting();
        $setting->title = $request->title;
        $setting->description = $request->description;
        $setting->address = $request->address;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->mobile = $request->mobile;
        $setting->facebook = $request->facebook;
        $setting->youtube = $request->youtube;
        $setting->twitter = $request->twitter;
        $setting->linkedin = $request->linkedin;
        $setting->keyword = $request->keyword;
        $setting->status = 1;
        // Logo
        if ($request->file('logo')) {
            $file = $request->file('logo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('storage/uploads/setting'), $filename);
            $setting->logo = $filename;
        }
        // Favicon
        if ($request->file('favicon')) {
            $file = $request->file('favicon');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('storage/uploads/setting'), $filename);
            $setting->favicon = $filename;
        }
        // Banner-image
        if ($request->file('banner_img')) {
            $file = $request->file('banner_img');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('storage/uploads/setting'), $filename);
            $setting->banner_img = $filename;
        }
        $setting->save();

        return redirect()->back()->with('success', 'Data Save success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Setting::find($id);
        return view('backend.pages.setting.create-edit', compact('data'));
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
            "image" => "nullable|image|mimes:jpg,png,jpeg,gif",
            "slug" => "nullable",

        ]);

        $setting = Setting::find($id);
        $setting->title = $request->title;
        $setting->description = $request->description;
        $setting->address = $request->address;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->mobile = $request->mobile;
        $setting->facebook = $request->facebook;
        $setting->youtube = $request->youtube;
        $setting->twitter = $request->twitter;
        $setting->linkedin = $request->linkedin;
        $setting->keyword = $request->keyword;
        $setting->status = 1;
        // Logo
        if ($request->file('logo')) {
            $image_path = public_path() . '/storage/uploads/setting/' . $setting->logo;
            if (file_exists($image_path))
                unlink($image_path);

            $file = $request->file('logo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('storage/uploads/setting'), $filename);
            $setting->logo = $filename;
        } else {
            unset($setting->logo);
        }
        // Favicon
        if ($request->file('favicon')) {
            $image_path = public_path() . '/storage/uploads/setting/' . $setting->favicon;
            if (file_exists($image_path))
                unlink($image_path);

            $file = $request->file('favicon');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('storage/uploads/setting'), $filename);
            $setting->favicon = $filename;
        } else {
            unset($setting->favicon);
        }
        // Banner image
        if ($request->file('banner_img')) {
            $image_path = public_path() . '/storage/uploads/setting/' . $setting->banner_img;
            if (file_exists($image_path))
                unlink($image_path);

            $file = $request->file('banner_img');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('storage/uploads/setting'), $filename);
            $setting->banner_img = $filename;
        } else {
            unset($setting->banner_img);
        }

        $setting->update();

        return redirect()->back()->with('success', 'Data Save success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Setting::find($id);
        $logo_image_path = public_path() . '/storage/uploads/setting/' . $data->logo;
        $favicon_image_path = public_path() . '/storage/uploads/setting/' . $data->favicon;
        $banner_image_path = public_path() . '/storage/uploads/setting/' . $data->banner;

        // unlink logo
        if (file_exists($logo_image_path))
            unlink($logo_image_path);

        // unlink favicon
        if (file_exists($favicon_image_path))
            unlink($favicon_image_path);

        // unlink banner image
        if (file_exists($banner_image_path))
            unlink($banner_image_path);
        $data->delete();

        return redirect()->back()->with('success', 'Data Deleted success!');
    }
}
