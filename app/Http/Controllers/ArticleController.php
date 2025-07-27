<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Helpers\AuthHelper;
use App\Models\ArticleTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\ArticleDataTable;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ArticleDataTable $dataTable)
    {
        $pageTitle = trans('global-message.list_form_title',['form' => trans('article.title')] );
        $auth_user = AuthHelper::authSession();
        $assets = ['data-table'];
        $headerAction = '<a href="'.route('article.create').'" class="btn btn-sm btn-primary" role="button">Add New Article </a>';
        return $dataTable->render('global.datatable', compact('pageTitle','auth_user','assets', 'headerAction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('article.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'file' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $article = Article::create($request->all());

            if($request->has('tags')) {
                $tags = json_decode($request->tags);
                foreach ($tags as $key => $value) {
                    ArticleTag::create([
                        'article_id' => $article->id,
                        'name' => $value->value,
                    ]);
                }
            }

            if($request->hasFile('file')) {
                $article->addMediaFromRequest('file')->toMediaCollection('image');
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('errors', 'Article created failed');
        }

        return redirect()->route('article.index')->with('success', 'Article created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Article::findOrFail($id);


        return view('article.form', compact('data','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'file' => 'required',
        ]);

        $article = Article::findOrFail($id);
        $article->fill($request->all())->update();

        ArticleTag::where('article_id', $article->id)->delete();
        if($request->has('tags')) {
            $tags = json_decode($request->tags);
            foreach ($tags as $key => $value) {

                ArticleTag::create([
                    'article_id' => $article->id,
                    'name' => $value->value,
                ]);
            }
        }
        return redirect()->route('article.index')->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $status = 'errors';
        $message= __('global-message.delete_form', ['form' => __('article.title')]);

        if($article!='') {
            $article->delete();
            $status = 'success';
            $message= __('global-message.delete_form', ['form' => __('article.title')]);
        }

        if(request()->ajax()) {
            return response()->json(['status' => true, 'message' => $message, 'datatable_reload' => 'dataTable_wrapper']);
        }

        return redirect()->back()->with($status,$message);
    }
}
