<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class ProductController extends Controller {

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getProductList(Request $request)
    {
        $result = $this->productService->getList($request->all());
        return Response::json($result, 200);
    }

    public function getProduct($id)
    {
        $result = $this->productService->get($id);
        return Response::json($result, 200);
    }

    public function postProduct(Request $request)
    {
        $result = $this->productService->post($request->all());
        return Response::json($result, 200);
    }

    public function putProduct($id, Request $request)
    {
        $result = $this->productService->put($id, $request->all());
        return Response::json($result, 200);
    }

    public function delProduct($id) {
        $result = $this->productService->remove($id);
        return Response::json($result, 200);
    }

}