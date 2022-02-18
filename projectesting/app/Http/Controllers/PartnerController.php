<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoweUserRoleAssign;
use Session;
use Auth;
use App\Models\ComCountry;
use DB;

class PartnerController extends Controller
{
    public function __construct(){
        return $this->middleware("partner");
    }

    public function index()
    {
        
        $userRole = NoweUserRoleAssign::join("nowe_user_type", "nowe_user_type.user_type_id","=", 'nowe_user_role_assign.user_type_id')
            ->leftJoin("partner_organization","partner_organization.partner_organization_id","=", "nowe_user_role_assign.partner_organization_id")
            ->leftJoin("com_country", 'com_country.cont_id', "=", "nowe_user_role_assign.country_id")
            ->where("user_id", Auth::user()->user_id)->get()->toArray();

        $rolesName = array();
        foreach ($userRole as $key => $value) {
            $roles = array();

            foreach ($userRole as $key1 => $value1) { 
                if($value['user_type_id'] == $value1['user_type_id']){
                    $roles[] = array(
                        "user_role_assign_id" => $value1['user_role_assign_id'],
                        "user_id" => $value1['user_id'],
                        "user_type_id" => $value1['user_type_id'],
                        "partner_organization_id" => $value1['partner_organization_id'],
                        "country_id" => $value1['country_id'],
                        "country_district_id" => $value1['country_district_id'],
                        "cont_id" => $value1['cont_id'],
                        "cont_name" => $value1['cont_name'],
                        "partner_organization_name" => $value1['partner_organization_name']
                    );
                }

            }

            $rolesName[$value['user_type_id']] = array(
                $value['user_type_id'] => $value['user_type'],
                "roles" => $roles,
            ); 
        }
        return view('partner/index', compact('rolesName'));
    }

    public function changeRole($country_id, $partner_organization_id, $user_type_id)
    {
        $changeRole = NoweUserRoleAssign::join("nowe_user_type", "nowe_user_type.user_type_id","=", 'nowe_user_role_assign.user_type_id')
            ->join("partner_organization","partner_organization.partner_organization_id","=", "nowe_user_role_assign.partner_organization_id")
            ->join("com_country", 'com_country.cont_id', "=", "nowe_user_role_assign.country_id")
            ->leftJoin("com_country_district", 'com_country_district.country_district_id', "=", "nowe_user_role_assign.country_district_id")
            ->where('nowe_user_role_assign.user_type_id','=',$user_type_id)
            ->where('nowe_user_role_assign.country_id','=',$country_id)
            ->where('partner_organization.partner_organization_id','=',$partner_organization_id)
            ->where("user_id", Auth::user()->user_id)->first()->toArray();
            
            Session::put("user_role", $changeRole);

            if(session('user_role')['user_type_id'] == 1)
            {
                return redirect("/admin");
            }
            else if(session('user_role')['user_type_id'] == 2)
            {
                return redirect("/partner");
            }
            else if(session('user_role')['user_type_id'] == 3)
            {
                return redirect("/district");
            } 
    }

    public function changeRoleInUsManager($user_type_id)
    {
        $changeRole = NoweUserRoleAssign::join("nowe_user_type", "nowe_user_type.user_type_id","=", 'nowe_user_role_assign.user_type_id')
            ->where('nowe_user_role_assign.user_type_id','=',$user_type_id)
            ->where("user_id", Auth::user()->user_id)->first()->toArray();

            Session::put("user_role", $changeRole);

            if(session('user_role')['user_type_id'] == 1)
            {
                return redirect("/admin");
            }
            else if(session('user_role')['user_type_id'] == 2)
            {
                return redirect("/partner");
            }
            else if(session('user_role')['user_type_id'] == 3)
            {
                return redirect("/district");
            } 
    }

}
