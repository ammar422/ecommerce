<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vendor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MainCategorie;
use App\Http\Traits\ApiGeneral;
use App\Http\Controllers\Controller;
use App\Notifications\VendorCreated;
use App\Http\Requests\Admin\VendorRequest;
use Illuminate\Support\Facades\Notification;

class VendorController extends Controller
{
    use ApiGeneral;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $vendors = Vendor::with('category')->selection()->paginate(RouteServiceProvider::PAGINATION_COUNT);
        $vendors = Vendor::with('category')->selection()->paginate(PAGINATION_COUNT);
        return view('admin.vendors.allVendors', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $main_Categories = MainCategorie::defaultMainCategory()->select(['id', 'name'])->get();
            return view('admin.vendors.addVendor', compact('main_Categories'));
        } catch (\Exception $ex) {
            $ex->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendorRequest $request)
    {
        try {
            $vendor = Vendor::create($request->validated());
            if ($vendor) {
                return $this->returnSuccessMessage("Vendor Saved Successfuly", 300, null, ['data' => $vendor, 'email' => 'email sent succefualy']);
            } else
                return $this->returnError("sorru cant save right now please tray agien later");
        } catch (\Exception $ex) {
            return $this->returnError($ex->getMessage(), 909);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendor $vendor)
    {
        $Categories = MainCategorie::defaultMainCategory()->select(['id', 'name'])->get();
        return view('admin.vendors.editVendor', compact('vendor', 'Categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VendorRequest $request, Vendor $vendor)
    {
        // return  $request;

        $updated = $vendor->update($request->validated());
        if ($updated) {
            return redirect()->route('vendor.index')->with(['success' => 'vendor updated successfuly']);
        }
        return redirect()->route('vendor.index')->with(['error' => 'somthing went wrong try agien later']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $vendor = Vendor::find($request->id);
        if ($vendor) {
            $vendor->delete();
            return $this->returnSuccessMessage("the vendor is deleted susseccfuly", 3000, $request->id);
        } else
            return $this->returnError("some thing went wrong plz try agien");
    }


    public function changeStatus(string $id)
    {
        $vendor = Vendor::find($id);
        if ($vendor->active == 'not active')
            $vendor->update([
                'active' => '1'
            ]);
        else
            $vendor->update(['active' => '0']);
        return redirect()->route('vendor.index')->with(['success' => 'the status of vendor ' . $vendor->name . ' changed successfuly']);
    }
}
