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
    	$data['_count'] = $this->model->count();
        $products = $this->model->skip($offset)->take($limit)->get();
		foreach ($products as $p) {
			$p->pic = env('PIC_DOMAIN') . $p->pic;
		}
        $data['data'] = $products;
        return $data;
    }

    public function get($id)
    {
        $product = $this->model->where('id', $id)->first();
		$product->pic = env('PIC_DOMAIN') . $product->pic;
        return $product;
    }

    public function post($params)
    {
		if(!isset($params['name'])) {
			return array('status' => false, 'result' => '参数错误');
		}
		$ins['name'] = $params['name'];
// 		$ins['pic'] = isset($params['pic']) ? $params['pic'] : '';
		$ins['content'] = isset($params['content']) ? $params['content'] : '';
		$ins['desc'] = isset($params['desc']) ? $params['desc'] : '';
		if(isset($params['myFile'])) {
			$file = $params['myFile'];
			if($file->isValid()) {
				$targetFolder = env('PIC_DOMAIN');
				$extension = $file->getClientOriginalExtension();
				$newName = str_random(8).$extension;
				if($file->move('uploads/pictures', $newName)) {
					$ins['pic'] = $newName;
				}
			} else {
				return array('status' => false, 'result' => '所上传的文件无效');
			}
		}
		if($this->model->create($ins)) {
			return array('status' => true);
		} else {
			return array('status' => false, 'result' => '创建失败');
		}
    }

    public function updateProduct($id, $params)
    {
    	$upd = array();
    	if(isset($params['name'])) {
    		$upd['name'] = $params['name'];
    	}
    	if(isset($params['content'])) {
    		$upd['content'] = $params['content'];
    	}
    	if(isset($params['desc'])) {
    		$upd['desc'] = $params['desc'];
    	}
    	if(isset($params['myFile'])) {
    		$file = $params['myFile'];
    		if($file->isValid()) {
    			$targetFolder = env('PIC_DOMAIN');
//     			$clientName = $file->getClientOriginalName();
    			$extension = $file->getClientOriginalExtension();
				$newName = str_random(8).$extension;
    			if($file->move('uploads/pictures', $newName)) {
    				$upd['pic'] = $newName;
    			}
    		} else {
    			return array('status' => false, 'result' => '所上传的文件无效');
    		}
    	}
		if($this->model->where('id', $id)->update($upd)) {
			return array('status' => true);
		} else {
			return array('status' => false, 'result' => '修改失败');
		}
    }

	public function remove($id) {
		if($this->model->where('id', $id)->delete()) {
			return array('status' => true);
		} else {
			return array('status' => false, 'result' => '删除失败');
		}
	}

}