<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Support\Str;
use App\Models\MainCategorie;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CategoryDeleted;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\Admin\MainCategoriesRequest;
use Illuminate\Notifications\Notification as NotificationsNotification;

class MainCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            //code...

            $defualtLang = get_default_language();
            $categories = MainCategorie::where('translation_lang', $defualtLang)->with('vendors')->selection();
            return view('admin.mainCategories.allMainCategories', compact('categories'));
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            return view('admin.mainCategories.addMainCategory');
        } catch (\Exception $ex) {
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MainCategoriesRequest $request)
    {

        try {
            DB::beginTransaction();
            //code...
            // begin store Defalut Category
            $main_categories = collect($request->category);
            $filter_main_categories = $main_categories->filter(function ($items) {
                return $items['abbr'] == get_default_language();
            })->all();
            $defalut_MainCategory = array_values($filter_main_categories)[0];
            if ($request->has('photo')) {
                $imagePath = uploadImage('mainCategories', $request->photo);
            }
            $defalut_MainCategory_id = MainCategorie::insertGetId([
                'name' => $defalut_MainCategory['name'],
                'translation_lang' => $defalut_MainCategory['abbr'],
                'translation_of' => 0,
                'slug' => $defalut_MainCategory['name'],
                'photo' => $imagePath,
                'active' => $request->active,
                'emailcreator' => Auth::user()->email,
            ]);

            // end store Defalut Category

            $not_main_categories = $main_categories->filter(function ($items) {
                return $items['abbr'] !== get_default_language();
            });

            if (isset($not_main_categories) && $not_main_categories->count()) {
                $categories_Array = [];
                foreach ($not_main_categories as $category) {
                    $categories_Array = [
                        'name' => $category['name'],
                        'translation_lang' => $category['abbr'],
                        'translation_of' => $defalut_MainCategory_id,
                        'slug' => $category['name'],
                        'photo' => $imagePath,
                        'active' => $request->active,
                        'emailcreator' => Auth::user()->email,
                    ];
                    MainCategorie::insert($categories_Array);
                }
            }
            DB::commit();
            return redirect()->route('MainCategory.show')->with(['success' => 'New Category saved successfuly']);
        } catch (\Exception $e) {
            //Exception $e;
            DB::rollBack();
            return redirect()->route('MainCategory.add')->with(['error' => 'CAN\'T saved try agien']);
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
    public function edit(string $categoryId)
    {
        try {

            $category = MainCategorie::with('translatedCatrgories')->selection()->find($categoryId);

            if (!$category) {
                return redirect()->route('MainCategory.show')->with(['error' => 'this Category is not found ']);
            }
            return view('admin.mainCategories.editCategory', compact('category'));
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MainCategoriesRequest $request, string $id)
    {
        try {

            $category = MainCategorie::find($id);

            if (!$category) {
                return redirect()->route('MainCategory.show')->with(['error' => 'this Category is not found ']);
            }

            if ($request->has('photo')) {
                $imagePath = uploadImage('mainCategories', $request->photo);
                MainCategorie::where('id', $id)->update([
                    'photo' => $imagePath
                ]);
            }
            $mainCatg = array_values($request->category)[0];
            MainCategorie::where('id', $id)
                ->update([
                    'name' => $mainCatg['name'],
                    'active' => $request->active,

                ]);
            return redirect()->route('MainCategory.show')->with(['success' => ' Category updated successfuly']);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = MainCategorie::find($id);
        $vendors = $category->vendors();
        if (isset($vendors) && $vendors->count() > 0) {
            return redirect()->route('MainCategory.show')->with(['error' => 'this Category can\'t be deleted']);
        }
        $image = Str::after($category->photo, 'ecommerce');
        unlink(base_path() . $image);
        $category->delete();
        return redirect()->route('MainCategory.show')->with(['success' => 'this Category is deleted successfuly']);
    }


    public function cahngeStatus($id)
    {

        // try {
        $category = MainCategorie::find($id);
        $status = $category->active ==  'active' ? 0 : 1;
        $category->update(['active' => $status]);
        return redirect()->route('MainCategory.show')->with(['success' => 'the status of category ' . $category->name . ' changed successfuly']);
        // } catch (\Exception $ex) {
        return redirect()->route('MainCategory.show')->with(['error' => 'cant\'t change status  ! try agien']);
        // return $ex->getMessage();
        // }
    }
}
