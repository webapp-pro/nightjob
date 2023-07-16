<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\LocationCategory;
use App\Models\OccupationCategory;
use App\Models\BusinessCategory;
use App\Models\SpecialityCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;


class CompanyController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->company) {
            Alert::toast('You already have a company!', 'info');
            return $this->edit();
        }
        $locategories = LocationCategory::all();
        return view('company.create', compact('locategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validateCompany($request);
        $company = new Company();
        if ($this->companySave($company, $request)) {
            Alert::toast('入力成功！求人情報を追加できるようになりました。', 'success');
            return redirect()->route('account.authorSection');
        }
        Alert::toast('入力失敗!', 'error');
        return redirect()->route('account.authorSection');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $company = auth()->user()->company;
        $locategories = LocationCategory::all();
        return view('company.edit', compact('company','locategories'));
    }


    public function update(Request $request, $id)
    {
        
        $this->validateCompanyUpdate($request);
        
        $company = auth()->user()->company;
        if ($this->companyUpdate($company, $request)) {
            Alert::toast('編集成功!', 'success');
            return redirect()->route('account.authorSection');
        }
        Alert::toast('編集失敗!', 'error');
        return redirect()->route('account.authorSection');
    }

    protected function validateCompany(Request $request)
    {
        return $request->validate([
            'title' => 'required',
            'description' => 'required',
            'logo' => 'sometimes|image',
            'locategory' => 'required',
            'website' => 'required',
            'cover_img' => 'sometimes|image'
        ]);
    }
    protected function validateCompanyUpdate(Request $request)
    {
        return $request->validate([
            'title' => 'required',
            'description' => 'required',
            'logo' => 'sometimes|image',
            'locategory' => 'required',
            'website' => 'required|string',
            'cover_img' => 'sometimes|image'
        ]);
    }
    protected function companySave(Company $company, Request $request)
    {
        
        $company->user_id = auth()->user()->id;
        $company->title = $request->title;
        $company->description = $request->description;
        $company->location_category_id = $request->locategory;
        $company->website = $request->website;
        
        // echo "<pre>";
        // var_dump($request->file('logo'));exit;

        //logo
        $fileNameToStore = $this->getFileName($request->file('logo'));
        $logoPath = $request->file('logo')->storeAs('public/companies/logos', $fileNameToStore);
        if ($company->logo) {
            Storage::delete('public/companies/logos/' . basename($company->logo));
        }
        $company->logo = 'storage/companies/logos/' . $fileNameToStore;

        //cover image
        if ($request->hasFile('cover_img')) {
            $fileNameToStore = $this->getFileName($request->file('cover_img'));
            $coverPath = $request->file('cover_img')->storeAs('public/companies/cover', $fileNameToStore);
            if ($company->cover_img) {
                Storage::delete('public/companies/cover/' . basename($company->cover_img));
            }
            $company->cover_img = 'storage/companies/cover/' . $fileNameToStore;
        } else {
            $company->cover_img = 'nocover';
        }

        if ($company->save()) {
            return true;
        }
        return false;
    }

    protected function companyUpdate(Company $company, Request $request)
    {
        $company->user_id = auth()->user()->id;
        $company->title = $request->title;
        $company->description = $request->description;
        $company->location_category_id = $request->locategory;
        $company->website = $request->website;

        //logo should exist but still checking for the name
        if ($request->hasFile('logo')) {
            $fileNameToStore = $this->getFileName($request->file('logo'));
            $logoPath = $request->file('logo')->storeAs('public/companies/logos', $fileNameToStore);
            if ($company->logo) {
                Storage::delete('public/companies/logos/' . basename($company->logo));
            }
            $company->logo = 'storage/companies/logos/' . $fileNameToStore;
        }

        //cover image 
        if ($request->hasFile('cover_img')) {
            $fileNameToStore = $this->getFileName($request->file('cover_img'));
            $coverPath = $request->file('cover_img')->storeAs('public/companies/cover', $fileNameToStore);
            if ($company->cover_img) {
                Storage::delete('public/companies/cover/' . basename($company->cover_img));
            }
            $company->cover_img = 'storage/companies/cover/' . $fileNameToStore;
        }
        // $company->cover_img = 'nocover';
        if ($company->save()) {
            return true;
        }
        return false;
    }
    protected function getFileName($file)
    {
        $fileName = $file->getClientOriginalName();
        $actualFileName = pathinfo($fileName, PATHINFO_FILENAME);
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        return $actualFileName . time() . '.' . $fileExtension;
    }

    public function destroy()
    {
        Storage::delete('public/companies/logos/' . basename(auth()->user()->company->logo));
        Storage::delete('public/companies/cover/' . basename(auth()->user()->company->cover_img));
        if (auth()->user()->company->delete()) {
            return redirect()->route('account.authorSection');
        }
        return redirect()->route('account.authorSection');
    }
}
