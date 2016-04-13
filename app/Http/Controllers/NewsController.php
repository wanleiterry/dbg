<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\NewsService;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Redirect;

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
//         return Response::json($result, 200);
        if($result['status']) {
        	return Redirect::to('/admin/news_list.html');
        }
        return Redirect::to('/admin/404.html?error=' . $result['result']);
    }

    public function updateNews($id, Request $request)
    {
        $result = $this->newsService->updateNews($id, $request->all());
        if($result['status']) {
        	return Redirect::to('/admin/news_list.html');
        }
        return Response::json($result, 200);
    }

    public function delNews($id) {
        $result = $this->newsService->remove($id);
        return Response::json($result, 200);
    }

}