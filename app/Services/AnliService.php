<?php
namespace App\Services;

use App\Models\Anli;

class AnliService {

    protected $offset = 0;
    protected $limit = 20;

    public function __construct(Anli $anli)
    {
        $this->model = $anli;
    }

    public function getList($params)
    {
    	$offset = isset($params['offset']) ? $params['offset'] : $this->offset;
    	$limit = isset($params['limit']) ? $params['limit'] : $this->limit;
        $anlis = $this->model->leftJoin('category', 'anli.category_id', '=', 'category.id')
        			->select('anli.id', 'category.name as cate_name', 'anli.title', 'anli.pic', 'anli.content', 'anli.created_at', 'anli.updated_at')
        			->skip($offset)
			        ->take($limit)
			        ->get();
        return $anlis;
    }

    public function get($id)
    {
        $anli = $this->model->leftJoin('category', 'anli.category_id', '=', 'category.id')
        			->select('anli.id', 'category.name as cate_name', 'anli.title', 'anli.pic', 'anli.content', 'anli.created_at', 'anli.updated_at')
        			->where('anli.id', $id)
        			->first();
        return $anli;
    }

    public function post($params)
    {
		if(!isset($params['title'])) {
			return array('status' => false, 'result' => '未设置标题');
		}
		if(!isset($params['category_id'])) {
			return array('status' => false, 'result' => '未设置分类');
		}
		$ins['title'] = $params['title'];
		$ins['category_id'] = $params['category_id'];
		$ins['pic'] = isset($params['pic']) ? $params['pic'] : '';
		$ins['content'] = isset($params['content']) ? $params['content'] : '';
		if($this->model->create($ins)) {
			return array('status' => true);
		} else {
			return array('status' => false, 'result' => '创建失败');
		}
    }

    public function put($id, $params)
    {
    	$upd = array();
    	if(isset($params['title'])) {
    		$upd['title'] = $params['title'];
    	}
    	if(isset($params['category_id'])) {
    		$upd['category_id'] = $params['category_id'];
    	}
    	if(isset($params['pic'])) {
    		$upd['pic'] = $params['pic'];
    	}
    	if(isset($params['content'])) {
    		$upd['content'] = $params['content'];
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