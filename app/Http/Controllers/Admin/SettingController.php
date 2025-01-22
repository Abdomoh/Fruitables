<?php

namespace App\Http\Controllers\Admin;

use App\Traits\SlugTrait;
use Illuminate\Http\Request;
use App\Services\SettingService;
use App\Traits\TranslationTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class SettingController extends Controller
{
    use SlugTrait;
    use TranslationTrait;

    private $settingService;

    public function __construct(SettingService $settingService)
    {
        $this->settingService = $settingService;
    }
    public function index()
    {

        $setting = $this->settingService->getAllSetting();
        return view('dashboard.settings.index', compact('setting'));

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

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data= $this->settingService->updateSetting($request,$id);
        $data->save();
        $this->editTranslation($request, 'Setting', $data->id);
        return back()->with('update','تم تعديل البيانات بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
