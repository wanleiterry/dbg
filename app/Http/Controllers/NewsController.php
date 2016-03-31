<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\NewsService;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class NewsController extends Controller {

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function getNewsList(Request $request)
    {
        $result = $this->newsService->getList($request->all());
        return Response::json($result, 200);
    }

    public function getNews($id)
    {
        $result = $this->newsService->get($id);
        return Response::json($result, 200);
    }

    public function postNews(Request $request)
    {
        $result = $this->newsService->post($request->all());
        return Response::json($result, 200);
    }

    public function putNews($id, Request $request)
    {
        $result = $this->newsService->put($id, $request->all());
        return Response::json($result, 200);
    }

}