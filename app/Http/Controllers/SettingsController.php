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
          $setting = Setting::find('maintenance_mode');
          $setting->value = '1';
          $setting->save();

          return redirect('/');
      }
      else
      {
          $setting = Setting::find('maintenance_mode');
          $setting->value = '0';
          $setting->save();

          return redirect('/');
      }
    }
}
