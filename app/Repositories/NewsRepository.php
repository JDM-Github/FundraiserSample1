<?php

namespace App\Repositories;

use App\Models\News;

class NewsRepository
{
    public function create(array $data)
    {
        return News::create($data);
    }

    public function update($id, array $data)
    {
        $news = News::findOrFail($id);
        $news->update($data);
        return $news;
    }

    public function delete($id)
    {
        return News::destroy($id);
    }

    public function getAll()
    {
        return News::all();
    }

    public function getAllActive()
    {
        return News::active()->get();
    }
}
