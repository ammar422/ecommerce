<?php

namespace App\Http\Controllers\Admin\Apis;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VendorRequest;
use App\Http\Traits\ApiGeneral;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorApiController extends Controller
{
    use ApiGeneral;
    public function index()
    {
        $vendors = Vendor::selection()->get();
        return response()->json($vendors);
    }


    public function store(Request $request)
    {

        // return $request;
        // $logoPath = uploadImage('vendors', $request->logo);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'google_map_address' => $request->location,
            'active' => $request->active,
            'mainCategory_id' => $request->Category_id,
            // 'logo' => $logoPath,
        ];
        $vendor =  Vendor::create($data);
        if ($vendor)
            return $this->returnSuccessMessage('Vendor ' . $data['name'] . ' saved successfuly');

        return $this->returnError('sorry cant svae right now please try agien later');
    }
}
