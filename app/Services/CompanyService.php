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

    public function put($id, $params)
    {
        if(Company::where('id', $id)->update($params)) {
            return array('status' => true);
        } else {
            return array('status' => false, 'result' => '修改失败');
        }
    }

}