<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LangRequest;
use App\Http\Traits\ApiGeneral;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    use ApiGeneral;
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
            $lang =  Language::create($request->validated());
            if ($lang) {
                return $this->returnSuccessMessage("new language saved succeffuly");
                // return redirect()->route('languages.add')->with(['success' => 'The New Language Add Successfuly']);
            } else {
                return $this->returnError("sorry cant save right now please try afien later");
            }
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }


    public function editeLanguage($lang_id)
    {
        try {
            $language = Language::find($lang_id);
            if (!$language) {
                return redirect()->route('languages.show')->with(['error' => 'This Language Is Not Found']);
            } else {
                $language = Language::select()->find($lang_id);
                return view('admin.languages.editLanguage', compact('language'));
            }
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
    public function updateLanguage(LangRequest $request, $id)
    {
        try {
            $language = Language::find($id);
            if (!$language) {
                return $this->returnError('sorry cant save right now please try afien later');
                // return redirect()->route('languages.show')->with(['error' => 'This Language Is Not Found']);
            } else
                $language->update($request->all());
            return $this->returnSuccessMessage('This Language Is updated successfuly');
            // return redirect()->route('languages.show')->with(['success' => 'This Language Is edited successfuly']);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
    public function deleteLanguage(Request $request)
    {
       
        try {
             $language = Language::find($request->id);
            if (!$language) {
                return $this->returnError('This Language Is Not Found', 5001);
            } else {
                $language->delete();
                return $this->returnSuccessMessage('Language deleted successfauly',3000,$request->id);
            }
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
