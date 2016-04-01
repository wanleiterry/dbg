<?php
namespace App\Services;

use App\Models\Company;

class CompanyService {

    protected $offset = 0;
    protected $limit = 20;

    public function __construct(Company $company)
    {
        $this->model = $company;
    }

    public function get()
    {
        $company = $this->model->leftJoin('user', 'company.user_id', '=', 'user.id')
                    ->select('company.id', 'company.name', 'company.email as cEmail', 'company.telephone', 'company.address',
                        'user.mobile', 'user.email as uEmail', 'user.realname')
                    ->first();//dd($company);
        return $company;
    }

    public function put($params)
    {
    	$company = $this->model->select('id')->first();
    	if($company) {
    		$upd = array();
	    	if(isset($params['name'])) {
	    		$upd['name'] = $params['name'];
	    	}
	    	if(isset($params['email'])) {
	    		$upd['email'] = $params['email'];
	    	}
	    	if(isset($params['telephone'])) {
	    		$upd['telephone'] = $params['telephone'];
	    	}
	    	if(isset($params['address'])) {
	    		$upd['address'] = $params['address'];
	    	}
	        if(Company::where('id', $company->id)->update($upd)) {
	            return array('status' => true);
	        } else {
	            return array('status' => false, 'result' => '修改失败');
	        }
    	} else {
    		return array('status' => false, 'result' => '公司不存在');
    	}
    }

}