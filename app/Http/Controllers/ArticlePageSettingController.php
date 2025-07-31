<?php

namespace App\Http\Controllers;

use App\Models\ArticlePageSetting;
use Illuminate\Http\Request;

class ArticlePageSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articlePageSettings = ArticlePageSetting::first();
        return view('article_page_setting.index', compact('articlePageSettings'));
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
        $articlePage = ArticlePageSetting::first();
        if ($articlePage) {
            $articlePage->update($request->all());
        } else {
            ArticlePageSetting::create($request->all());
        }
        return redirect()->route('article_page_setting.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ArticlePageSetting $articlePageSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ArticlePageSetting $articlePageSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ArticlePageSetting $articlePageSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ArticlePageSetting $articlePageSetting)
    {
        //
    }
}
