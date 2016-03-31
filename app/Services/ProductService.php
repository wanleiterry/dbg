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
    	$offset = isset($params['offset']) ? $params['offset'] : $this->offset;
    	$limit = isset($params['limit']) ? $params['limit'] : $this->limit;
        $products = Product::skip($offset)->take($limit)->get();//dd($products);
        return $products;
    }

    public function get($id)
    {
        $product = Product::where('id', $id)->first();dd($product);
        return $product;
    }

    public function post($params)
    {
		if(!isset($params['name'])) {
			return array('status' => false, 'result' => '参数错误');
		}
		$ins['name'] = $params['name'];
		$ins['pic'] = isset($params['pic']) ? $params['pic'] : '';
		$ins['content'] = isset($params['content']) ? $params['content'] : '';
		$ins['desc'] = isset($params['desc']) ? $params['desc'] : '';
		if(Product::create($ins)) {
			return array('status' => true);
		} else {
			return array('status' => false, 'result' => '创建失败');
		}
    }

    public function put($id, $params)
    {
		if(Product::where('id', $id)->update($params)) {
			return array('status' => true);
		} else {
			return array('status' => false, 'result' => '修改失败');
		}
    }

}