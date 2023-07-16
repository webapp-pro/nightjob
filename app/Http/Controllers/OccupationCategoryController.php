<?php

namespace App\Http\Controllers;

use App\Models\OccupationCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OccupationCategoryController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required'
        ]);
        OccupationCategory::create([
            'category_name' => $request->category_name
        ]);
        Alert::toast('追加成功!', 'success');
        return redirect()->route('account.dashboard');
    }

    public function edit(OccupationCategory $occategory)
    {
        return view('occupation-category.edit', compact('occategory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required'
        ]);
        $category = OccupationCategory::find($id);
        $category->update([
            'category_name' => $request->category_name
        ]);
        Alert::toast('更新成功!', 'success');
        return redirect()->route('account.dashboard');
    }

    public function destroy($id)
    {
        $occategory = OccupationCategory::find($id);
        $occategory->delete();
        Alert::toast('削除成功!', 'success');
        return redirect()->route('account.dashboard');
    }
}
