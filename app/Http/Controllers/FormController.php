<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use Illuminate\Support\Str;
use App\Services\Salesforce;

class FormController extends Controller
{
    private $salesforce;

    public function __construct(Salesforce $salesforce)
    {
        $this->salesforce = $salesforce;
    }


    public function index(Request $request, Submission $submission) 
    {
        return view('FORM_NAME_HERE');
    }

    public function submitFormData(Request $request) 
    {
        try {

            // Update the lead via Salesforce
            $salesforceData = [
                'City' => $request->city,
                'PostalCode' => $request->zip_code,
                'Street' => $request->street_name .', '. $request->street_name_two,
                'Date_of_Birth__c' => $request->dob_year.'-'.$request->dob_month.'-'.$request->dob_day,
                'Gender2__c' => $request->gender,
                'Ethnicity_New__c' => $request->ethnicity,
                'Primary_Insurance_ID__c' => $request->insurance_member_id,
                'PCP_First_name__c' => $request->doctor_first_name,
                'PCP_Last_Name__c' => $request->doctor_last_name,
                'PCP_City__c' => $request->doctor_city,
                'PCP_State__c' => $request->doctor_state,
                'Secondary_Insurance__c' => isset($request->medicare_id) ? 'Medicare' : null,
                'Secondary_Insurance_ID__c' => isset($request->medicare_id) ? $request->medicare_id : null,
                'Status' => 'Completed Intake',
            ];
            $this->salesforce->leadUpdate($salesforceData, $lead->salesforce_lead_id);

            $lead->save();

            return response(['success' => true], 200);

        } catch (\Exception $e) {
            report($e);
            return response(['message' => 'Unable to process your request at the moment. Please try again.'], 500);
        }
    }

 
}