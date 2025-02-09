<?php
namespace App\Http\Controllers;
use App\Models\News;
use App\Services\NewsService;

class HomeController extends Controller
{
    protected $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }


    // ---------------------------------------------------------------------------------
    // GET
    // ---------------------------------------------------------------------------------
    public function dashboard()
    {
        $user = auth()->user();

        if ($user->hasRole('admin') || $user->hasRole('super_admin')) {
            $news = $this->newsService->getAll();
        } else {
            $news = $this->newsService->getAllActive();
        }

        return view('dashboard', compact('news'));
    }
}
