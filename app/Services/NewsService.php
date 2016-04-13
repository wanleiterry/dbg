<?php
namespace App\Services;

use App\Models\News;

class NewsService {

    protected $offset = 0;
    protected $limit = 20;

    public function __construct(News $news)
    {
        $this->model = $news;
    }

    public function getList($params)
    {
        $offset = isset($params['offset']) ? $params['offset'] : $this->offset;
        $limit = isset($params['limit']) ? $params['limit'] : $this->limit;
        $data['_count'] = $this->model->count();
        $news = $this->model->skip($offset)->take($limit)->get();
        foreach ($news as $n) {
            $n->pic = env('PIC_DOMAIN') . $n->pic;
        }
        $data['data'] = $news;
        return $data;
    }

    public function get($id)
    {
        $news = $this->model->where('id', $id)->first();
        $news->pic = env('PIC_DOMAIN') . $news->pic;
        return $news;
    }

    public function post($params)
    {
        if(!isset($params['title'])) {
            return array('status' => false, 'result' => '参数错误');
        }
        $ins['title'] = $params['title'];
        $ins['pic'] = isset($params['pic']) ? $params['pic'] : '';
        $ins['content'] = isset($params['content']) ? $params['content'] : '';
        $ins['desc'] = isset($params['desc']) ? $params['desc'] : '';
        if(News::create($ins)) {
            return array('status' => true);
        } else {
            return array('status' => false, 'result' => '创建失败');
        }
    }

    public function updateNews($id, $params)
    {
    	$upd = array();
    	if(isset($params['title'])) {
    		$upd['title'] = $params['title'];
    	}
//     	if(isset($params['pic'])) {
//     		$upd['pic'] = $params['pic'];
//     	}
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
    			$extension = $file->getClientOriginalExtension();
    			$newName = str_random(8).$extension;
    			if($file->move('uploads/pictures', $newName)) {
    				$upd['pic'] = $newName;
    			}
    		} else {
    			return array('status' => false, 'result' => '所上传的文件无效');
    		}
    	}
        if(News::where('id', $id)->update($upd)) {
            return array('status' => true);
        } else {
            return array('status' => false, 'result' => '修改失败');
        }
    }

    public function remove($id)
    {
        if($this->model->where('id', $id)->delete()) {
            return array('status' => true);
        } else {
            return array('status' => false, 'result' => '删除失败');
        }
    }

}