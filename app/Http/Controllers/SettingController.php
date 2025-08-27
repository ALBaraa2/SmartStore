<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        // Load all settings from DB or config
        $settings = settings(); // helper (we’ll make it later)

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request, $section)
    {
        $data = $request->all();

        switch ($section) {
            case 'general':
                $request->validate([
                    'store_name' => 'required|string|max:255',
                    'store_email' => 'required|email|max:255',
                    'logo' => 'nullable|image|max:2048',
                ]);

                save_setting('store_name', $request->store_name);
                save_setting('store_email', $request->store_email);

                if ($request->hasFile('logo')) {
                    $path = $request->file('logo')->store('logos', 'public');
                    save_setting('logo', $path);
                }
                break;

            case 'payment':
                save_setting('paypal_enabled', $request->has('paypal_enabled'));
                save_setting('paypal_key', $request->paypal_key);
                break;

            // Add other sections (shipping, tax, notifications, appearance...)
        }

        return back()->with('success', ucfirst($section).' settings updated successfully!');
    }
}
