<?php

namespace App\Http\Controllers;

use App\Models\HomeSlider;
use App\Models\HomeSetting;
use App\Models\HomeSection4;
use Illuminate\Http\Request;

class HomeSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homeSetting = HomeSetting::with('homeSliders', 'homeSection4s')->first();
        // dd($homeSetting->toArray());
        return view('home_setting.index', compact('homeSetting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //Validation
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_1' => 'nullable|file|mimes:mp4,avi,mov|max:2048',
            'section_1_images' => 'nullable|array',
            'section_1_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        //Checf First Data Home
        $homeSetting = HomeSetting::first();
        if ($homeSetting) {
            $homeSetting->update($request->all());
        } else {
            $homeSetting = HomeSetting::create($request->all());
        }

        if($request->hasFile('logo')) {
            //Delete old logo
            $homeSetting->clearMediaCollection('logo');
            $homeSetting->addMediaFromRequest('logo')->toMediaCollection('logo');
        }

        if($request->hasFile('favicon')) {
            $homeSetting->clearMediaCollection('favicon');
            $homeSetting->addMediaFromRequest('favicon')->toMediaCollection('favicon');
        }

        if($request->hasFile('video_1')) {
            $homeSetting->clearMediaCollection('video_1');
            $homeSetting->addMediaFromRequest('video_1')->toMediaCollection('video_1');
        }

        // section_2_banner
        if($request->hasFile('section_2_banner')) {
            $homeSetting->clearMediaCollection('section_2_banner');
            $homeSetting->addMediaFromRequest('section_2_banner')->toMediaCollection('section_2_banner');
        }

        if($request->hasFile('section_4_banner')) {
            $homeSetting->clearMediaCollection('section_4_banner');
            $homeSetting->addMediaFromRequest('section_4_banner')->toMediaCollection('section_4_banner');
        }

        if($request->has('section_4_blocks')) {
            $blocks = $request->input('section_4_blocks', []);
            foreach ($blocks as $index => $block) {
                $title = $block['title'] ?? null;
                $subtitle = $block['subtitle'] ?? null;

                // Simpan data dasar (opsional)
                $section = HomeSection4::create([
                    'home_setting_id' => $homeSetting->id,
                    'title' => $title,
                    'subtitle' => $subtitle,
                ]);

                // Tambah file ke media library jika ada
                if ($request->hasFile("section_4_blocks.$index.file")) {
                    $section->addMediaFromRequest("section_4_blocks.$index.file")
                            ->toMediaCollection('section_4_files'); // gunakan nama collection sesuai config
                }
            }
        }

        //Insert Slider section 1
        if($request->has('section_1_images')) {
            foreach ($request->section_1_images as $image) {
                $homeslider = HomeSlider::create([
                    'home_setting_id' => $homeSetting->id,
                ]);

                $homeslider->addMediaFromRequest('section_1_images')->toMediaCollection('section_1_images');
            }
        }



        return redirect()->route('home_setting.index')->with('success', 'Home Setting created successfully');
    }
}
