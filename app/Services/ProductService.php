<?php
namespace App\Services;

use App\Models\Product;

class ProductService {

    protected $offset = 0;
    protected $limit = 20;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function getList($params)
    {
        $products = $this->model->get();dd($products);
    }

    public function get($id)
    {
        $product = $this->model->where('id', $id)->first();dd($product);
    }

    public function post($params)
    {

    }

    public function put($params)
    {

    }

}