<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoweUserRoleAssign;
use App\Models\ComDistrictLocation;
use App\Models\ComBeneficiaryType;
use App\Models\ComBeneficiary;
use Session;
use Auth;
use DB;
use Carbon\Carbon;

class DistrictController extends Controller
{
    public function __construct(){
        return $this->middleware("district");
    }

    public function index()
    {
        $userRole = NoweUserRoleAssign::join("nowe_user_type", "nowe_user_type.user_type_id","=", 'nowe_user_role_assign.user_type_id')
            ->leftJoin("com_country", 'com_country.cont_id', "=", "nowe_user_role_assign.country_id")
            ->leftJoin("partner_organization","partner_organization.partner_organization_id","=", "nowe_user_role_assign.partner_organization_id")
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

        
        return view('district/index', compact('rolesName'));
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

    public function AddNoweFamily()
    {
        $userRole = NoweUserRoleAssign::join("nowe_user_type", "nowe_user_type.user_type_id","=", 'nowe_user_role_assign.user_type_id')
            ->leftJoin("com_country", 'com_country.cont_id', "=", "nowe_user_role_assign.country_id")
            ->leftJoin("partner_organization","partner_organization.partner_organization_id","=", "nowe_user_role_assign.partner_organization_id")
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

        $CitiesAndVillages = ComDistrictLocation::where('country_district_id',session('user_role')['country_district_id'])->get()->toArray();

        $beneficiary = ComBeneficiaryType::all()->toArray();

        $beneficiaryList = ComBeneficiary::join("com_beneficiary_type", "com_beneficiary_type.beneficiary_type_id", "=", "com_beneficiary.beneficiary_type_id")
                        ->join("com_country_district", "com_country_district.country_district_id", "=", "com_beneficiary.country_district_id")
                        // ->join("com_district_location", "com_district_location.district_location_id", "=", "com_district_location.district_location_id")
                        ->where("com_beneficiary.added_by",Session::get("user_data")->user_id)->get()->toArray();
                        
        return view("district/addNoweFamily", compact('rolesName', 'CitiesAndVillages', 'beneficiary', "beneficiaryList"));
    }


    public function InsertNoweFamily(Request $request)
    {
        $fileUpload = $request->file('image')->storeAs("public/images", $request->file('image')->getClientOriginalName());

        $AddData = ComBeneficiary::create([
                        "beneficiary_type_id"           => $request->beneficiary_type,
                        "first_name"                    => $request->first_name,
                        "middle_name"                   => $request->middle_name,
                        "last_name"                     => $request->last_name,
                        "gender"                        => $request->gender,
                        "country_district_id"           => Session::get('user_role')['country_district_id'],
                        "eligible_for_zakat"            => $request->eligible_for_zakat,
                        "why_eligible_for_zakat"        => $request->why_eligible_for_zakat,
                        "country_identification_number" => $request->identification_number,
                        "date_of_birth"                 => $request->date_of_birth,
                        "complete_address"              => $request->complete_address,
                        "contact_number"                  => $request->contact_name,
                        "email"                         => $request->email,
                        "district_location_id"          => $request->district_location_id,
                        "photo"                         => $request->file('image')->getClientOriginalName(),
                        "added_on"                      => NOW(),
                        "added_by"                      => Session::get('user_data')->user_id,
                    ]);

        if($AddData)
        {
            return redirect('/district/AddNoweFamily')->with(array("message" => "Beneficiary/Widow/Orphan has been added Successfully", "class" => "info"));
        }
        else
        {
            return redirect('/district/AddNoweFamily')->with(array("message" => "Beneficiary/Widow/Orphan has not been added try again later", "class" => "danger"));
        }
    }

    public function EditNoweFamily($id){

        $editData = ComBeneficiary::where("beneficiary_id", $id)->first()->toArray();

        return redirect('/district/AddNoweFamily')->with(array(
            "data" => $editData
        ));  

    }

    public function UpdateNoweFamily(Request $request, $id) 
    {   
        $Update = ComBeneficiary::where("beneficiary_id",$id)->update([
                        "beneficiary_type_id"           => $request->beneficiary_type,
                        "first_name"                    => $request->first_name,
                        "middle_name"                   => $request->middle_name,
                        "last_name"                     => $request->last_name,
                        "gender"                        => $request->gender,
                        "country_district_id"           => Session::get('user_role')['country_district_id'],
                        "eligible_for_zakat"            => $request->eligible_for_zakat,
                        "why_eligible_for_zakat"        => $request->why_eligible_for_zakat,
                        "country_identification_number" => $request->identification_number,
                        "date_of_birth"                 => $request->date_of_birth,
                        "complete_address"              => $request->complete_address,
                        "contact_number"                  => $request->contact_name,
                        "email"                         => $request->email,
                        "district_location_id"          => $request->district_location_id,
                        "added_by"                      => Session::get('user_data')->user_id,
                    ]);

        if($Update)
        {
            return redirect('/district/AddNoweFamily')->with(array("message" => "Beneficiary/Widow/Orphan has been Updated Successfully", "class" => "info"));
        }
        else
        {
            return redirect('/district/AddNoweFamily')->with(array("message" => "Beneficiary/Widow/Orphan has not been Updated try again later", "class" => "danger"));
        }
    }



}
