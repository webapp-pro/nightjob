<?php

namespace App\Http\Controllers;

use App\Models\LocationCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LocationCategoryController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required'
        ]);
        LocationCategory::create([
            'category_name' => $request->category_name
        ]);
        Alert::toast('追加成功!', 'success');
        return redirect()->route('account.dashboard');
    }

    public function edit(LocationCategory $locategory)
    {
        return view('location-category.edit', compact('locategory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required'
        ]);
        $category = LocationCategory::find($id);
        $category->update([
            'category_name' => $request->category_name
        ]);
        Alert::toast('更新成功!', 'success');
        return redirect()->route('account.dashboard');
    }

    public function destroy($id)
    {
        $locategory = LocationCategory::find($id);
        $locategory->delete();
        Alert::toast('削除成功!', 'success');
        return redirect()->route('account.dashboard');
    }
}
