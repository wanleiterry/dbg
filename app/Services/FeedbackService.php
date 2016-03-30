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
        $feedback = $this->model->get();
    }

    public function get($id)
    {
        $feedback = $this->model->where('id', $id)->first();
    }

    public function post($params)
    {

    }

    public function put($params)
    {

    }

}