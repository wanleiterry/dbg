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
        $news = $this->model->skip($offset)->take($limit)->get();
        return $news;
    }

    public function get($id)
    {
        $news = $this->model->where('id', $id)->first();
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

    public function put($id, $params)
    {
        if(Product::where('id', $id)->update($params)) {
            return array('status' => true);
        } else {
            return array('status' => false, 'result' => '修改失败');
        }
    }

}