<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LangRequest;
use App\Models\Language;


class LanguagesController extends Controller
{
    public function ShowAllLangs()
    {
        try {
            $langs = Language::select()->paginate(PAGINATION_COUNT);
            return view('admin.languages.allLanguages', compact('langs'));
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }


    }

    public function addNewLangs()
    {
        try {
            return view('admin.languages.addLanguage');
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function stroeLanguage(LangRequest $request)
    {
        try {
            Language::create($request->validated());
            return redirect()->route('addNewLangs')->with(['success' => 'The New Language Add Successfuly']);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function deleteLanguage($lagn_id)
    {

        try {
            $language = Language::find($lagn_id);
            if (!$language) {
                return redirect()->route('ShowAllLangs')->with(['error' => 'This Language Is Not Found']);
            } else {
                $language->delete();
                return redirect()->route('ShowAllLangs')
                    ->with(['success' => 'The Language deleted succefuly']);
            }
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }

    public function editeLanguage($lagn_id)
    {
        try {
            $language = Language::find($lagn_id);
            if (!$language) {
                return redirect()->route('ShowAllLangs')->with(['error' => 'This Language Is Not Found']);
            } else {
                $language = Language::select()->find($lagn_id);
                return view('admin.languages.editLanguage', compact('language'));
            }
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
    public function updateLanguage(LangRequest $request,$id)
    {
        try {
            $language = Language::find($id);
            if (!$language) {
                return redirect()->route('ShowAllLangs')->with(['error' => 'This Language Is Not Found']);
            } else
                $language->update($request->all());
            return redirect()->route('ShowAllLangs')->with(['success' => 'This Language Is edited successfuly']);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
