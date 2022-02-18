<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Nowe_user;
use App\Models\NoweUserType;
use App\Models\NoweUserRoleAssign;
use Hash;
use Session;
use DB;

class loginProcessController extends Controller
{
    public function __construct(){
        
    }

    public function index()
    {
        return view("login");
    }

    public function loginProcess(Request $request)
    {
        $loginProcess = Auth::attempt(["email" => $request->email, 'password' => $request->password ]);
        
        if(Auth::check())
        {
            if(Auth::user()->user_is_active)
            {
                // Auth::logout();
                $data = DB::select("SELECT *
                            FROM nowe_user_role_assign
                            JOIN `nowe_user_type` ON `nowe_user_type`.`user_type_id` = nowe_user_role_assign.`user_type_id`
                            LEFT JOIN `partner_organization` ON `partner_organization`.`partner_organization_id` = nowe_user_role_assign.`partner_organization_id`
                            LEFT JOIN `com_country_district` ON `com_country_district`.`country_district_id` = nowe_user_role_assign.`country_district_id`
                            LEFT JOIN `com_country` ON nowe_user_role_assign.country_id = com_country.cont_id
                            WHERE nowe_user_role_assign.user_id = ?",[Auth::user()->user_id]);


                $userRole = array();
                foreach($data as $row)
                {
                    $userRole[] = (array) $row;
                }

                Session::put("user_data", Auth::user());
                
                if(!empty($userRole))
                {
                    foreach ($userRole as $key => $value) {
                    
                        if($value['user_type_id'] == 1)
                        {
                            Session::put("user_role", $value);
                            return redirect('admin');
                        }
                        else if($value['user_type_id'] == 2){
                            
                            Session::put("user_role", $value);
                            return redirect('partner');
                        }
                        else if($value['user_type_id'] == 3)
                        {
                            Session::put("user_role", $value);
                            return redirect('district');
                        }

                    }
                }
                else
                {
                    return redirect()->route("login")->with(array("message"=>"Your Account has Not Active Kindly Contact admin ! . . . ", "class" => "danger"));
                }
            }
            else
            {
                return redirect()->route("login")->with(array("message"=>"Your Account has Not Active Kindly Contact admin ! . . . ", "class" => "danger"));
            }
        }
        else
        {
            return redirect()->route("login")->with(array("message"=>"Login Crediential Wrong", "class" => "danger"));
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route("login")->with(array("message"=>"Logout Successfully", "class" =>"info"));
    }
}
