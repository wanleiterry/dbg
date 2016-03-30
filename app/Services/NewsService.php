<?php
namespace App\Services;

use App\Models\News;

class NewsService {

    protected $offset = 0;
    protected $limit = 20;

    public function __construct(News $news)
    {
        $this->model = $news;
    }

    public function getList($params)
    {
        $news = $this->model->get();
    }

    public function get($id)
    {
        $news = $this->model->where('id', $id)->first();
    }

    public function post($params)
    {

    }

    public function put($params)
    {

    }

}