<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\FeedbackService;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class FeedbackController extends Controller {

    public function __construct(FeedbackService $feedbackService)
    {
        $this->feedbackService = $feedbackService;
    }

    public function getFeedbackList(Request $request)
    {
        $result = $this->feedbackService->getList($request->all());
        return Response::json($result, 200);
    }

    public function getFeedback($id)
    {
        $result = $this->feedbackService->get($id);
        return Response::json($result, 200);
    }

    public function postFeedback(Request $request)
    {
        $result = $this->feedbackService->post($request->all());
        return Response::json($result, 200);
    }

    public function putFeedback(Request $request)
    {
        $result = $this->feedbackService->put($request->all());
        return Response::json($result, 200);
    }

}