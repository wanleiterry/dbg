<?php
namespace App\Services;

use App\Models\Category;

class CategoryService {

    protected $offset = 0;
    protected $limit = 20;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function getList($params)
    {
    	$offset = isset($params['offset']) ? $params['offset'] : $this->offset;
    	$limit = isset($params['limit']) ? $params['limit'] : $this->limit;
        $cates = $this->model->skip($offset)->take($limit)->get();//dd($cates);
        return $cates;
    }

    public function get($id)
    {
        $cate = $this->model->where('id', $id)->first();//dd($cate);
        return $cate;
    }

    public function post($params)
    {
		if(!isset($params['name'])) {
			return array('status' => false, 'result' => '参数错误');
		}
		$ins['name'] = $params['name'];
		if($this->model->create($ins)) {
			return array('status' => true);
		} else {
			return array('status' => false, 'result' => '创建失败');
		}
    }

    public function put($id, $params)
    {
		if($this->model->where('id', $id)->update($params)) {
			return array('status' => true);
		} else {
			return array('status' => false, 'result' => '修改失败');
		}
    }

}