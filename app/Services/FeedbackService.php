<?php
namespace App\Services;

use App\Models\Feedback;

class FeedbackService {

    protected $offset = 0;
    protected $limit = 20;

    public function __construct(Feedback $feedback)
    {
        $this->model = $feedback;
    }

    public function getList($params)
    {
        $offset = isset($params['offset']) ? $params['offset'] : $this->offset;
        $limit = isset($params['limit']) ? $params['limit'] : $this->limit;
        $data['_count'] = $this->model->count();
        $feedbacks = $this->model->skip($offset)->take($limit)->get();
        $data['data'] = $feedbacks;
        return $data;
    }

    public function get($id)
    {
        $feedback = $this->model->where('id', $id)->first();
        return $feedback;
    }

    public function post($params)
    {
        if(!isset($params['name'])) {
            return array('status' => false, 'result' => '未设置姓名');
        }
        if(!isset($params['mobile'])) {
            return array('status' => false, 'result' => '未设置手机号');
        }
        if(!isset($params['qq'])) {
            return array('status' => false, 'result' => '未设置QQ');
        }
        if(!isset($params['email'])) {
            return array('status' => false, 'result' => '未设置邮箱');
        }
        if(!isset($params['title'])) {
            return array('status' => false, 'result' => '未设置标题');
        }
        if(!isset($params['content'])) {
            return array('status' => false, 'result' => '未设置内容');
        }

        $ins['name'] = $params['name'];
        $ins['mobile'] = $params['mobile'];
        $ins['qq'] = $params['qq'];
        $ins['email'] = $params['email'];
        $ins['title'] = $params['title'];
        $ins['content'] = $params['content'];
        if(Feedback::create($ins)) {
            return array('status' => true);
        } else {
            return array('status' => false, 'result' => '创建失败');
        }
    }

    public function put($id, $params)
    {
        if(Feedback::where('id', $id)->update($params)) {
            return array('status' => true);
        } else {
            return array('status' => false, 'result' => '修改失败');
        }
    }

}