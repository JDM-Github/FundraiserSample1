<?php
namespace App\Http\Controllers;
use App\Models\News;

class HomeController extends Controller
{
    public function dashboard()
    {
        $news = News::all();
        return view('dashboard', compact('news')); 
    }
}
