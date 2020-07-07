<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employee;
use App\employee_web_history;

class ApiController extends Controller
{
    public function getAllEmployees() {
        $employee = employee::get()->toJson(JSON_PRETTY_PRINT);
        $emp_web_history = employee_web_history::get()->toJson(JSON_PRETTY_PRINT);
        //dd($emp_web_history);
        return response($employee,200);    

    }
  
    public function createEmployee(Request $request) {
        $employee = new employee;
        $employee->emp_id = $request->emp_id;
        $employee->emp_name = $request->emp_name;
        $employee->ip_address = $request->ip_address;
        $employee->save();

        return response()->json([
            "message" => "employee record created"
        ], 201);

    }
  
    public function getEmployee($ip_address) {
        if (employee::where('ip_address', $ip_address)->exists()) {
            $employee = employee::where('ip_address', $ip_address)->get()->toJson(JSON_PRETTY_PRINT);
            return response($employee, 200);
          } else {
            return response()->json([
              "message" => "employee not found"
            ], 404);
        }    
    }
  
    public function deleteEmployee ($ip_address) {
        if(employee::where('ip_address', $ip_address)->exists()) {
            $employee = employee::find($ip_address);
            $employee->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "employee not found"
            ], 404);
          }    
    }  

    public function create_emp_web_history(Request $request) {

       if ($request->isMethod('POST')) 
       {
          $request_data = $request->All();
   
          $ip_address = employee::where('ip_address', '=', $request_data['ip_address'])->get();

          if (!$ip_address->isEmpty()) 
          {
            $emp_web_history = new employee_web_history;
            $emp_web_history->ip_address = $request->ip_address;
            $emp_web_history->url = $request->url;
            $emp_web_history->date = $request->date;
            $emp_web_history->save();

            return response()->json([
                "message" => "employee web history record created"
            ], 201);
          }
          else 
          {
            return response()->json([
                "message" => "employee with IP Address not found"
              ], 404);
          }
       }
    }
  
    public function get_emp_web_history($ip_address) 
    {
      if (employee_web_history::where('ip_address', $ip_address)->exists()) 
      {
          $emp_web_history = employee_web_history::where('ip_address', $ip_address)->get()->toJson(JSON_PRETTY_PRINT);
          return response($emp_web_history, 200);
      } 
      else 
      {
          return response()->json([
            "message" => "emp_web_history not found"
          ], 404);
      }    
    }
  
    public function delete_emp_web_history($ip_address) {
       // Delete all the web search history data mapped with ip_address.
       if(employee_web_history::where('ip_address', $ip_address)->exists()) 
       {
          $emp_web_history = employee_web_history::where('ip_address', $ip_address);
          $emp_web_history->delete();

          return response()->json([
            "message" => "records deleted"
          ], 202);
        } 
        else 
        {
          return response()->json([
            "message" => "emp_web_history not found"
          ], 404);
        } 
    }  

}
