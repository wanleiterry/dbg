<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\CompanyService;

class CompanyController extends Controller
{

    public function __construct(CompanyService $companyService) {
		$this->companyService = $companyService;
    }

    public function getCompany()
    {
        $result = $this->companyService->get();
        return Response::json($result, 200);
    }

    public function putCompany(Request $request)
    {
        $result = $this->companyService->put($request->all());
        return Response::json($result, 200);
    }
   
}
