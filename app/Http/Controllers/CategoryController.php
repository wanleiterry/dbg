<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller {

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getCategoryList(Request $request)
    {
        $result = $this->categoryService->getList($request->all());
        return Response::json($result, 200);
    }

    public function getCategory($id)
    {
        $result = $this->categoryService->get($id);
        return Response::json($result, 200);
    }

    public function postCategory(Request $request)
    {
        $result = $this->categoryService->post($request->all());
        return Response::json($result, 200);
    }

    public function putCategory($id, Request $request)
    {
        $result = $this->categoryService->put($id, $request->all());
        return Response::json($result, 200);
    }

}