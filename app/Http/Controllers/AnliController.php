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
        return Response::json($result, 200);
    }

    public function putAnli($id, Request $request)
    {
        $result = $this->anliService->put($id, $request->all());
        return Response::json($result, 200);
    }

}