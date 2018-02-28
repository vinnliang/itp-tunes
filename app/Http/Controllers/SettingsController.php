<?php

namespace App\Http\Controllers;
use App\Setting;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
      $settings = Setting::find('maintenance_mode');

      return view('settings',
      [
        'settings' => $settings
      ]);
    }

    public function toggle()
    {
      $settingValue = Setting::find('maintenance_mode')->value;
      if( $settingValue == '0')
      {
          // $setting = Setting::find('maintenance_mode');
          // $setting->value = '1';
          // //dd($setting);
          // $setting->save();
          // //dd($setting);
          DB::table('settings')
            ->where('id', 'maintenance_mode')
            ->update(['value' => 1]);
          return redirect('/');
      }
      else
      {
          // $setting = Setting::find('maintenance_mode');
          // $setting->value == 0;
          // $setting->save();
          //dd($setting);
          DB::table('settings')
            ->where('id', 'maintenance_mode')
            ->update(['value' => 0]);
          return redirect('/');
      }
    }
}
