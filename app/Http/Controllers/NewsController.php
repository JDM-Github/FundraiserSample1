<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Services\NewsService;

class NewsController extends Controller
{
    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    // ---------------------------------------------------------------------------------
    // GET
    // ---------------------------------------------------------------------------------
    public function create()
    {
        return view('news.create');
    }
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }




    // ---------------------------------------------------------------------------------
    // POST
    // ---------------------------------------------------------------------------------
    public function store(Request $request)
    {
        $this->newsService->createNews($request->all());
        return redirect()->route('dashboard');
    }

    public function update(Request $request, $id)
    {
        $this->newsService->updateNews($id, $request->all());
        return redirect()->route('dashboard');
    }

    public function destroy(News $news)
    {
        $this->newsService->destroyNews($news->id);
        return redirect()->route('dashboard');
    }
}
