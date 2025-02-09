<?php

namespace App\Services;

use App\Helpers\NewsHelper;
use App\Repositories\NewsRepository;

class NewsService
{
    protected $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function createNews(array $data)
    {
        $data['slug'] = NewsHelper::generateUniqueSlug($data['headline']);
        return $this->newsRepository->create($data);
    }

    public function updateNews($id, array $data)
    {
        $data['slug'] = NewsHelper::generateUniqueSlug($data['headline']);
        return $this->newsRepository->update($id, $data);
    }

    public function destroyNews($id)
    {
        return $this->newsRepository->delete($id);
    }

    public function getAll()
    {
        return $this->newsRepository->getAll();
    }

    public function getAllActive()
    {
        return $this->newsRepository->getAllActive();
    }
}
?>