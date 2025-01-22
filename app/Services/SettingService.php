<?php
namespace App\Services;
use App\Models\Setting;
use Illuminate\Http\Request;
class SettingService
{
    public function getAllSetting()
    {
        return Setting::orderBy('created_at','desc')->first();
    }
    public function createSetting(Request $request)
    {
        $input = $request->all();
        if ($image = $request->file('logo')) {
            $destintionPath = 'uploads/logo/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destintionPath, $profileImage);
            $input['logo'] = $profileImage;
        }
        $setting = Setting::firstOrCreate([],$input);
        return $setting;
    }
    public function updateSetting(Request $request,$id){
        $input = $request->all();
        if ($image = $request->file('logo')) {
            $destintionPath = 'logo/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destintionPath, $profileImage);
            $input['logo'] = $profileImage;
        }
        $setting = Setting::find($id);
        $setting->update($input);
        return $setting;
    }
}
