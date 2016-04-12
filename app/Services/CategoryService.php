<?php
namespace App\Services;

use App\Models\Category;
use App\Models\Anli;

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
    	$data['_count'] = $this->model->count();
        $cates = $this->model->skip($offset)->take($limit)->get();//dd($cates);
        $data['data'] = $cates;
        return $data;
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

    public function remove($id) {
        if (Anli::where('category_id', $id)->count() > 0) {
            if ($this->model->where('id', $id)->delete()) {
                return array('status' => true);
            } else {
                return array('status' => false, 'result' => '删除失败');
            }
        } else {
            return array('status' => false, 'result' => '当前分类下有案例，不能删除');
        }
    }

}