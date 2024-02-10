<?php

namespace App\Http\Traits;


trait ApiGeneral
{
    public function returnError($msg,$erreNum = 5000)
    {
        return response()->json([
            'status' => false , 
            'Error Number' => $erreNum ,
            'Message' => $msg ,
        ]);
    }
    public function returnSuccessMessage( $msg,$erreNum = 3000 )
    {
        return response()->json([
            'status' => true , 
            'Error Number' => $erreNum ,
            'Message' => $msg ,
        ]);
    }
    public function returnData($key , $value ,$msg ,$erreNum = 4000 )
    {
        return response()->json([
            'status' => true , 
            'Error Number' => $erreNum ,
            'Message' => $msg ,
            $key=$value
        ]);
    }
    
}
