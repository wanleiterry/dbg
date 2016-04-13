<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Redirect;

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

    public function updateProduct($id, Request $request)
    {
        $result = $this->productService->updateProduct($id, $request->all());
        if($result['status']) {
//         	\View::addExtension('html', 'php');
//         	return view()->file('/admin/product_list.html');
        	return Redirect::to('/admin/product_list.html');
        }
        return Response::json($result, 200);
    }

    public function delProduct($id) {
        $result = $this->productService->remove($id);
        return Response::json($result, 200);
    }

}