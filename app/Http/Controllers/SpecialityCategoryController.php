<?php

namespace App\Http\Controllers;

use App\Models\SpecialityCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SpecialityCategoryController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required'
        ]);
        SpecialityCategory::create([
            'category_name' => $request->category_name
        ]);
        Alert::toast('追加成功!', 'success');
        return redirect()->route('account.dashboard');
    }

    public function edit(SpecialityCategory $spcategory)
    {
        return view('speciality-category.edit', compact('spcategory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required'
        ]);
        $category = SpecialityCategory::find($id);
        $category->update([
            'category_name' => $request->category_name
        ]);
        Alert::toast('更新成功!', 'success');
        return redirect()->route('account.dashboard');
    }

    public function destroy($id)
    {
        $spcategory = SpecialityCategory::find($id);
        $spcategory->delete();
        Alert::toast('削除成功!', 'success');
        return redirect()->route('account.dashboard');
    }
}
