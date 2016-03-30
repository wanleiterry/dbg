<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller {

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function getNewsList(Request $request)
    {
        $result = $this->newsService->getList($request->all());
    }

    public function getNews($id)
    {
        $result = $this->newsService->get($id);
    }

    public function postNews(Request $request)
    {
        $result = $this->newsService->post($request->all());
    }

    public function putNews(Request $request)
    {
        $result = $this->newsService->put($request->all());
    }

}