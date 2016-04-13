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
    	$data['_count'] = $this->model->count();
        $anlis = $this->model->leftJoin('category', 'anli.category_id', '=', 'category.id')
        			->select('anli.id', 'category.name as cate_name', 'anli.title', 'anli.pic', 'anli.content', 'anli.created_at', 'anli.updated_at')
        			->skip($offset)
			        ->take($limit)
			        ->get();
		foreach ($anlis as $anli) {
			$anli->pic = env('PIC_DOMAIN') . $anli->pic;
		}
		$data['data'] = $anlis;
        return $data;
    }

    public function get($id)
    {
        $anli = $this->model->leftJoin('category', 'anli.category_id', '=', 'category.id')
        			->select('anli.id', 'category.name as cate_name', 'anli.title', 'anli.pic', 'anli.content', 'anli.created_at', 'anli.updated_at')
        			->where('anli.id', $id)
        			->first();
		$anli->pic = env('PIC_DOMAIN') . $anli->pic;
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
// 		$ins['pic'] = isset($params['pic']) ? $params['pic'] : '';
		$ins['content'] = isset($params['content']) ? $params['content'] : '';
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

    public function updateAnli($id, $params)
    {
    	$upd = array();
    	if(isset($params['title'])) {
    		$upd['title'] = $params['title'];
    	}
    	if(isset($params['category_id'])) {
    		$upd['category_id'] = $params['category_id'];
    	}
//     	if(isset($params['pic'])) {
//     		$upd['pic'] = $params['pic'];
//     	}
    	if(isset($params['content'])) {
    		$upd['content'] = $params['content'];
    	}
    	if(isset($params['myFile'])) {
    		$file = $params['myFile'];
    		if($file->isValid()) {
    			$targetFolder = env('PIC_DOMAIN');
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