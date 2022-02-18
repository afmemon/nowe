@extends("district/master/template")

@section("content")
<div class="page-header">
    <h1>
        
        {{ session('data') ? 'Update NOWE Families' : 'Add NOWE Families' }}
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            {{ session('user_role')['user_type'] }} 
            [ <b>Country Name : </b> {{ session('user_role')['cont_name'] }} <b>District : </b> {{session('user_role')['district_short_name']}} ]
        </small>
    </h1>
</div>

    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="widget-box">
                <div class="widget-header widget-header-blue widget-header-flat">
                    <h4 class="widget-title lighter">{{ session('data') ? 'Update Families' : "Add NOWE Families" }} </h4>
                </div>

                <div class="widget-body">
                    <div class="widget-main">
                        <div id="fuelux-wizard-container">
                            <div>
                                <ul class="steps">
                                    <li data-step="1" class="active">
                                        <span class="step">1</span>
                                        <span class="title">{{ session('data') ? "Update Family" : "Add NOWE Family" }}</span>
                                    </li>

                                    <li data-step="2">
                                        <span class="step">2</span>
                                        <span class="title">Alerts</span>
                                    </li>

                                    <li data-step="3">
                                        <span class="step">3</span>
                                        <span class="title">Payment Info</span>
                                    </li>

                                    <li data-step="4">
                                        <span class="step">4</span>
                                        <span class="title">Other Info</span>
                                    </li>
                                    
                                </ul>
                            </div>

                            <hr />

                            <div class="step-content pos-rel">
                                <div class="step-pane active" data-step="1">
                                    <div class="col-sm-12">
                                        <h3>All Fields Marked With An Asterisk <span style="color:red;">(*)</span> Are Required</h3>
                                        <p>&nbsp;</p>
                                        @if(session('message') && session('class'))
                                            <div class="alert alert-{{session('class')}} text-center">
                                                <button type="button" class="close" data-dismiss="alert">
                                                    <i class="ace-icon fa fa-times"></i>
                                                </button>
                                                <strong>
                                                    Message : 
                                                </strong>
                                                {{session('message')}}
                                                <br />
                                            </div>
                                        @endif

                                        @php
                                       /* echo "<pre>";
                                        print_r(session("data"));
                                        echo "</pre>";*/
                                        @endphp

                                        <form enctype="multipart/form-data" class="form-group" action="{{ session('data') ? '/district/UpdateNoweFamily/'.session("data")["beneficiary_id"] : '/district/InsertNoweFamily' }}" method="POST">
                                            @csrf
                                            {{ session('data') ? method_field('PUT') : '' }} 
                                            <label><b>Beneficiary Type : <span style="color:red;">*</span></b></label>
                                            <select class="form-control" required name="beneficiary_type">
                                                <option value="">-- Select Beneficiary Type --</option>
                                                @forelse($beneficiary as $key => $beneficiary) 
                                                    <option {{ session("data") && $beneficiary['beneficiary_type_id'] == session("data")['beneficiary_type_id'] ? 'selected' : '' }} value="{{ $beneficiary['beneficiary_type_id'] }}">{{ $beneficiary['beneficiary_type'] }}</option>
                                                @empty
                                                @endforelse
                                            </select>

                                            <br/>
                                            <label><b>First Name : <span style="color:red;">*</span></b></label>
                                            <input type="text" required class="form-control" name="first_name" placeholder="Enter Beneficiary First Name" value="{{ session("data") ? session("data")['first_name'] : '' }}" >

                                            <br/>
                                            <label><b>Middle Name : </b></label>
                                            <input type="text" class="form-control" name="middle_name" placeholder="Enter Beneficiary Middle Name" value="{{ session("data") ? session("data")['middle_name'] : '' }}">

                                            <br/>
                                            <label><b>Last Name : <span style="color:red;">*</span></b></label>
                                            <input type="text" required class="form-control" name="last_name" placeholder="Enter Beneficiary Last Name" value="{{ session("data") ? session("data")['last_name'] : '' }}">

                                            <br/>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <label><b>Gender : <span style="color:red;">*</span></b></label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="radio-inline"><input type="radio" required name="gender" {{ (session("data") && session("data")['gender'] == "Male") ? "checked" : "" }} value="Male"><b>Male</b></label>
                                                    <label class="radio-inline"><input type="radio" required name="gender" {{ (session("data") && session("data")['gender'] == "Female") ? "checked" : "" }} value="Female"><b>Female</b></label>
                                                </div>
                                            </div>

                                            <br/>
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <label><b>Eligible For Zakat : <span style="color:red;">*</span></b></label>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label class="radio-inline"><input type="radio" required name="eligible_for_zakat" {{ (session("data") && session("data")['eligible_for_zakat'] == "Yes") ? "checked" : "" }} value="Yes"><b>Yes</b></label>
                                                    <label class="radio-inline"><input type="radio" required name="eligible_for_zakat" {{ (session("data") && session("data")['eligible_for_zakat'] == "No") ? "checked" : "" }} value="No"><b>No</b></label>
                                                </div>
                                            </div>

                                            <br/>
                                            <label><b>Why Eligible For Zakat : </b></label>
                                            <textarea class="form-control" name="why_eligible_for_zakat" placeholder="Write Description" />{{ session("data") ? session("data")['why_eligible_for_zakat'] : ''  }}</textarea>

                                            <br/>
                                            <label><b>Identification Number : <span style="color:red;">*</span></b></label>
                                            <input type="number" class="form-control" required name="identification_number" value="{{ session('data')? session('data')['country_identification_number'] : '' }}" placeholder="Enter Beneficiary Identification Number">
                                            
                                            <br/>
                                            <label><b>Date of Birth : <span style="color:red;">*</span></b></label>
                                            <input type="date" class="form-control" required name="date_of_birth" value="{{ session('data')? session('data')['date_of_birth'] : '' }}" placeholder="Enter Beneficiary Date of Birthday">

                                            <br/>
                                            <label><b>Complete Address : <span style="color:red;">*</span></b></label>
                                            <textarea class="form-control" required name="complete_address" placeholder="Write Description" />{{ session('data') ? session('data')['complete_address'] : "" }}</textarea>

                                            <br/>
                                            <label><b>Contact Number : <span style="color:red;">*</span></b></label>
                                            <input type="number" class="form-control" required name="contact_name" value="{{ session('data') ? session('data')['contact_number'] : '' }}" placeholder="Enter Beneficiary Contact Number">

                                            <br/>
                                            <label><b>Email : </b></label>
                                            <input type="email" class="form-control" name="email" value="{{ session('data') ? session('data')['email'] : "" }}" placeholder="Enter Beneficiary Email">

                                            <br/>
                                            <label><b>City or Village : <span style="color:red;">*</span></b></label>
                                            <select class="form-control" required name="district_location_id">
                                                <option value="">-- Select City or Village --</option>
                                                @forelse($CitiesAndVillages as $key => $CityAndVillage)
                                                    <option {{ (session('data') && session('data')['district_location_id'] == $CityAndVillage['district_location_id'])? 'selected' : '' }} value="{{ $CityAndVillage['district_location_id'] }}">{{ $CityAndVillage['city_or_village'] }}</option>
                                                @empty
                                                @endforelse

                                            </select> 
                                            
                                            <br/>
                                            <label><b>Select Image: </b></label>
                                            <input type="file" name="image" class="form-control">
                                            <br/>
                                            <center>
                                                
                                            <input type="submit" name="submit" class="btn btn-primary" value="{{ session('data') ? 'Update Beneficiary' : 'Add New Beneficiary' }}">
                                            </center>

                                        </form>
                                    </div>
                                </div>

                                <div class="step-pane" data-step="2">
                                    Hello Step 2
                                </div>

                                <div class="step-pane" data-step="3">
                                    Hello Step 3
                                </div>

                                <div class="step-pane" data-step="4">
                                    Hello Step 4
                                </div>
                            </div>
                        </div>

                        <hr />
                        <div class="wizard-actions">
                            <button class="btn btn-prev">
                                <i class="ace-icon fa fa-arrow-left"></i>
                                Prev
                            </button>

                            <button class="btn btn-success btn-next" data-last="Finish">
                                Next
                                <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                            </button>

                        </div>

                    </div>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Full Name</th>
                            <th>Gender</th>
                            <th>Eligible For Zakat</th>
                            <th>Address</th>
                            <th>beneficiary_type</th>
                            <th>District Short Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @php
                        echo "<pre>";
                        print_r($beneficiaryList);
                        echo "</pre>";
                        @endphp --}}
                       @forelse($beneficiaryList as $key => $beneficiaryPrint)
                       <tr>
                            <td><img style="width:40px; height: 40px" src="{{ asset("storage/Images/".$beneficiaryPrint['photo'])}}"></td>
                            <td>{{ $beneficiaryPrint['first_name']." ".$beneficiaryPrint['middle_name']." ".$beneficiaryPrint['last_name'] }}</td>
                            <td>{{ $beneficiaryPrint['gender'] }}</td>
                            <td>{{ $beneficiaryPrint['eligible_for_zakat'] }}</td>
                            <td>{{ $beneficiaryPrint['complete_address'] }}</td>
                            <td>{{ $beneficiaryPrint['beneficiary_type'] }}</td>
                            <td>{{ $beneficiaryPrint['district_short_name'] }}</td>
                            <td><h4><a href="/district/EditNoweFamily/{{ $beneficiaryPrint['beneficiary_id'] }}"><i class="fas fa-edit text-info fs-3"></i></a></h4></td>
                           
                       </tr>
                       @empty
                       @endforelse
                    </tbody>
                </table>
                
            </div>

{{--             <div id="modal-wizard" class="modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div id="modal-wizard-container">
                            <div class="modal-header">
                                <ul class="steps">
                                    <li data-step="1" class="active">
                                        <span class="step">1</span>
                                        <span class="title">Validation states</span>
                                    </li>

                                    <li data-step="2">
                                        <span class="step">2</span>
                                        <span class="title">Alerts</span>
                                    </li>

                                    <li data-step="3">
                                        <span class="step">3</span>
                                        <span class="title">Payment Info</span>
                                    </li>

                                    <li data-step="4">
                                        <span class="step">4</span>
                                        <span class="title">Other Info</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="modal-body step-content">
                                <div class="step-pane active" data-step="1">
                                    <div class="center">
                                        <h4 class="blue">Step 1</h4>
                                    </div>
                                </div>

                                <div class="step-pane" data-step="2">
                                    <div class="center">
                                        <h4 class="blue">Step 2</h4>
                                    </div>
                                </div>

                                <div class="step-pane" data-step="3">
                                    <div class="center">
                                        <h4 class="blue">Step 3</h4>
                                    </div>
                                </div>

                                <div class="step-pane" data-step="4">
                                    <div class="center">
                                        <h4 class="blue">Step 4</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer wizard-actions">
                            <button class="btn btn-sm btn-prev">
                                <i class="ace-icon fa fa-arrow-left"></i>
                                Prev
                            </button>

                            <button class="btn btn-success btn-sm btn-next" data-last="Finish">
                                Next
                                <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                            </button>

                            <button class="btn btn-danger btn-sm pull-left" data-dismiss="modal">
                                <i class="ace-icon fa fa-times"></i>
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>

    {{-- <div class="col-sm-12">
        <h3>All Fields Marked With An Asterisk <span style="color:red;">(*)</span> Are Required</h3>
        <p>&nbsp;</p>
        <form class="form-group">
            <label><b>Beneficiary Type : <span style="color:red;">*</span></b></label>
            <select class="form-control" name="beneficiary_type">
                <option>-- Select Beneficiary Type --</option>
                <option>Name</option>
                <option>Name</option>
                <option>Name</option>
            </select>

            <br/>
            <label><b>First Name : <span style="color:red;">*</span></b></label>
            <input type="text" class="form-control" name="first_name" placeholder="Enter Beneficiary First Name">

            <br/>
            <label><b>Middle Name : </b></label>
            <input type="text" class="form-control" name="middle_name" placeholder="Enter Beneficiary Middle Name">

            <br/>
            <label><b>Last Name : <span style="color:red;">*</span></b></label>
            <input type="text" class="form-control" name="last_name" placeholder="Enter Beneficiary Last Name">

            <br/>
            <div class="row">
                <div class="col-sm-2">
                    <label><b>Gender : <span style="color:red;">*</span></b></label>
                </div>
                <div class="col-sm-4">
                    <label class="radio-inline"><input type="radio" name="gender" value="Male"><b>Male</b></label>
                    <label class="radio-inline"><input type="radio" name="gender" value="Female"><b>Female</b></label>
                </div>
            </div>

            <br/>
            <div class="row">
                <div class="col-sm-2">
                    <label><b>Eligible For Zakat : <span style="color:red;">*</span></b></label>
                </div>
                <div class="col-sm-4">
                    <label class="radio-inline"><input type="radio" name="eligible_for_zakat" value="Yes"><b>Yes</b></label>
                    <label class="radio-inline"><input type="radio" name="eligible_for_zakat" value="No"><b>No</b></label>
                </div>
            </div>

            <br/>
            <label><b>Why Eligible For Zakat : </b></label>
            <textarea class="form-control" name="why_eligible_for_zakat" placeholder="Write Description" /></textarea>

            <br/>
            <label><b>Identification Number : <span style="color:red;">*</span></b></label>
            <input type="number" class="form-control" name="identification_name" placeholder="Enter Beneficiary Identification Number">

            <br/>
            <label><b>Identification Number Holder : <span style="color:red;">*</span></b></label>
            <select class="form-control" name="identification_number_holder">
                <option>-- Identification Number Holder  --</option>
                <option>Name</option>
                <option>Name</option>
                <option>Name</option>
            </select>
            
            <br/>
            <label><b>Date of Birth : <span style="color:red;">*</span></b></label>
            <input type="date" class="form-control" name="date_of_birth" placeholder="Enter Beneficiary Identification Number">

            <br/>
            <label><b>Complete Address : <span style="color:red;">*</span></b></label>
            <textarea class="form-control" name="complete_address" placeholder="Write Description" /></textarea>

            <br/>
            <label><b>Contact Number : <span style="color:red;">*</span></b></label>
            <input type="number" class="form-control" name="contact_name" placeholder="Enter Beneficiary Contact Number">

            <br/>
            <label><b>Email : </b></label>
            <input type="email" class="form-control" name="email" placeholder="Enter Beneficiary Email">

            <br/>
            <label><b>City or Village : <span style="color:red;">*</span></b></label>
            <select class="form-control" name="identification_number_holder">
                <option>-- Select City or Village --</option>
                <option>Name</option>
                <option>Name</option>
                <option>Name</option>
            </select> 
            
            <br/>
            <label><b>Select Image: </b></label>
            <input type="file" name="image" class="form-control">

            <br/>
            <input type="submit" name="submit" value="Add New Beneficiary">

        </form>
    </div> --}}
	  
@stop