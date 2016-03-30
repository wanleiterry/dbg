<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\FeedbackService;
use Illuminate\Http\Request;

class FeedbackController extends Controller {

    public function __construct(FeedbackService $feedbackService)
    {
        $this->feedbackService = $feedbackService;
    }

    public function getFeedbackList(Request $request)
    {
        $result = $this->feedbackService->getList($request->all());
    }

    public function getFeedback($id)
    {
        $result = $this->feedbackService->get($id);
    }

    public function postFeedback(Request $request)
    {
        $result = $this->feedbackService->post($request->all());
    }

    public function putFeedback(Request $request)
    {
        $result = $this->feedbackService->put($request->all());
    }

}