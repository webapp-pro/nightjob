<?php

namespace App\Http\Controllers;

use App\Events\PostViewEvent;
use App\Models\Company;
use App\Models\OccupationCategory;
use App\Models\BusinessCategory;
use App\Models\SpecialityCategory;
use App\Models\LocationCategory;
use App\Models\Post;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(20)->with('company')->get();
        $occategories = OccupationCategory::take(5)->get();
        $bucategories = BusinessCategory::take(5)->get();
        $spcategories = SpecialityCategory::take(5)->get();
        $locategories = LocationCategory::take(5)->get();
        $topEmployers = Company::latest()->take(3)->get();
        return view('home')->with([
            'posts' => $posts,
            'occategories' => $occategories,
            'bucategories' => $bucategories,
            'spcategories' => $spcategories,
            'locategories' => $locategories,
            'topEmployers' => $topEmployers
        ]);
    }

    public function create()
    {
        if (!auth()->user()->company) {
            Alert::toast('まず会社を設立する必要があります!', 'info');
            return redirect()->route('company.create');
        }
        $locategories = LocationCategory::all();
        $occategories = OccupationCategory::all();
        $bucategories = BusinessCategory::all();
        $spcategories = SpecialityCategory::all();
        return view('post.create', compact('locategories', 'occategories', 'bucategories', 'spcategories'));
    }

    public function store(Request $request)
    {
        $occategory = $request->occategory ? implode(",", $request->occategory) : "";
        $bucategory = $request->bucategory ? implode(",", $request->bucategory) : "";
        $spcategory = $request->spcategory ? implode(",", $request->spcategory) : "";
        $locategory = $request->locategory ? implode(",", $request->locategory) : "";
        $postData = array_merge(
            [
                'company_id' => auth()->user()->company->id],
                $request->all(),
            [
                'occategory' => $occategory,
                'bucategory' => $bucategory,
                'spcategory' => $spcategory,
                'locategory' => $locategory,
            ],
        );

        $post = Post::create($postData);
        if ($post) {
            Alert::toast('投稿が表示されました！', 'success');
            return redirect()->route('account.authorSection');
        }
        Alert::toast('投稿の掲載に失敗しました！', 'warning');
        return redirect()->back();
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        event(new PostViewEvent($post));
        $company = $post->company()->first();

        $similarPosts = Post::whereHas('company', function ($query) use ($company) {
            return $query->where('occategory', $company->occategory);
        })->where('id', '<>', $post->id)->with('company')->take(5)->get();
        //dd($company); exit();
        return view('post.show')->with([
            'post' => $post,
            'company' => $company,
            'similarJobs' => $similarPosts
        ]);
    }

    public function edit(Post $post)
    {
        $locategories = LocationCategory::all();
        $occategories = OccupationCategory::all();
        $bucategories = BusinessCategory::all();
        $spcategories = SpecialityCategory::all();
        //print_r($post); exit();
        return view('post.edit', compact('post','locategories', 'occategories', 'bucategories', 'spcategories'));
    }

    public function update(Request $request, $post)
    {
        $this->requestValidate($request);
        $occategory = $request->occategory ? implode(",", $request->occategory) : "";
        $bucategory = $request->bucategory ? implode(",", $request->bucategory) : "";
        $spcategory = $request->spcategory ? implode(",", $request->spcategory) : "";
        $locategory = $request->locategory ? implode(",", $request->locategory) : "";
        $postData = array_merge(
            [
                'company_id' => auth()->user()->company->id],
                $request->all(),
            [
                'occategory' => $occategory,
                'bucategory' => $bucategory,
                'spcategory' => $spcategory,
                'locategory' => $locategory,
            ],
        );
        
        // $getPost = Post::findOrFail($postData);
        //dd($postData); exit;

        $getPost = Post::findOrFail($post);
        $newPost = $getPost->update($postData);
        if ($newPost) {
            Alert::toast('投稿の更新に成功しました！', 'success');
            return redirect()->route('account.authorSection');
        }
        return redirect()->route('post.index');
    }

    public function destroy(Post $post)
    {
        if ($post->delete()) {
            Alert::toast('投稿の削除に成功しました！', 'success');
            return redirect()->route('account.authorSection');
        }
        return redirect()->back();
    }

    protected function requestValidate($request)
    {
        return $request->validate([
            'occategory' => 'required|array',
            'bucategory' => 'required|array',
            'vacancy_count' => 'required|int',
            'spcategory' => 'required|array',
            'locategory' => 'required|array',
            'salary' => 'required',
            'deadline' => 'required',
            'experience' => 'required',
            'skills' => 'required',
            'description' => 'required',
        ]);
    }
}
