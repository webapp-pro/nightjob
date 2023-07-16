<?php

namespace App\Http\Controllers;

use App\Models\BusinessCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BusinessCategoryController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required'
        ]);
        BusinessCategory::create([
            'category_name' => $request->category_name
        ]);
        Alert::toast('追加成功!', 'success');
        return redirect()->route('account.dashboard');
    }

    public function edit(BusinessCategory $bucategory)
    {
        return view('business-category.edit', compact('bucategory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required'
        ]);
        $category = BusinessCategory::find($id);
        $category->update([
            'category_name' => $request->category_name
        ]);
        Alert::toast('更新成功!', 'success');
        return redirect()->route('account.dashboard');
    }

    public function destroy($id)
    {
        $bucategory = BusinessCategory::find($id);
        $bucategory->delete();
        Alert::toast('削除成功!', 'success');
        return redirect()->route('account.dashboard');
    }
}
