<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\suppressionList; 
class SuppressionListController extends Controller
{ 

    public function getAllReversed()
    {	
        $err = array();
        $suppressions = suppressionList::getAll();
        foreach ($suppressions as $suppression){
            $suppression->phone = strrev($suppression->phone);
            //if we wanted to remove the 1 as well
            //$suppression->phone =substr($suppression->phone, 1);
        }
        $err['count'] = count($suppressions);
        $err['data'] = $suppressions;
        return $err;
    }
    
    public function getAll()
    {	
        $err = array();
        $suppressions = suppressionList::getAll();
        $err['count'] = count($suppressions);
        $err['data'] = $suppressions;
        return $err;
    }

    public function createSuppression(Request $request)
    {  
        $err = array();
        if ($request->phone == ''){
            return false;
        }
        //remove all symbols before storing
        $request->phone = preg_replace('/\D/', '', $request->phone); 
        //add the 1 to the beginning of the number
        $request->phone = '1'.$request->phone;  
        //reverse number
        $request->phone = strrev($request->phone); 
        $err['data'] = suppressionList::create($request);
        return $err;
    }

    public function updateSuppression(Request $request)
    {  
        $err = array();
        if ($request->phone == ''){
            return false;
        }
        //remove all symbols before storing
        $request->phone = preg_replace('/\D/', '', $request->phone);
        //add the 1 to the beginning of the number
        $request->phone = '1'.$request->phone; 
        //reverse number
        $request->phone = strrev($request->phone);
        $err['data'] = suppressionList::updatethis($request);
        return $err;
    }

    public function deleteSuppression(Request $request)
    {     
        return userColor::deletethis($request->id);
    }



     

   
}
