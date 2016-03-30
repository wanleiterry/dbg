<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller {

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getProductList(Request $request)
    {
        $result = $this->productService->getList($request->all());

    }

    public function getProduct($id)
    {
        $result = $this->productService->get($id);
    }

    public function postProduct(Request $request)
    {
        $result = $this->productService->post($request->all());
    }

    public function putProduct(Request $request)
    {
        $result = $this->productService->put($request->all());
    }

}