<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VendorRequest;
use App\Models\MainCategorie;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
            Vendor::create($request->validated());
            return redirect()->route('Vendor.show')->with(['success' => 'Vendor ' . $request->name . ' is added successfuly']);
        } catch (\Exception $ex) {
            
            return redirect()->route('Vendor.add')->with(['error' =>  'cant saved try agien <br> ' . $ex->getMessage()]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
