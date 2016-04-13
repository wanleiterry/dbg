<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\AnliService;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class AnliController extends Controller {

    public function __construct(AnliService $anliService)
    {
        $this->anliService = $anliService;
    }

    public function getAnliList(Request $request)
    {
        $result = $this->anliService->getList($request->all());
        return Response::json($result, 200);
    }

    public function getAnli($id)
    {
        $result = $this->anliService->get($id);
        return Response::json($result, 200);
    }

    public function postAnli(Request $request)
    {
        $result = $this->anliService->post($request->all());
//         return Response::json($result, 200);
        if($result['status']) {
        	return Redirect::to('/admin/case_list.html');
        }
        return Redirect::to('/admin/404.html?error=' . $result['result']);
    }

    public function updateAnli($id, Request $request)
    {
        $result = $this->anliService->updateAnli($id, $request->all());
        if($result['status']) {
        	return Redirect::to('/admin/case_list.html');
        }
        return Response::json($result, 200);
    }

    public function delAnli($id) {
        $result = $this->anliService->remove($id);
        return Response::json($result, 200);
    }

}