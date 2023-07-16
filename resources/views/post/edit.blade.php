@extends('layouts.account')

@section('content')
<div class="account-layout border">
    <div class="account-hdr bg-primary text-white border">
        求人情報の作成
    </div>
    <div class="account-bdy p-3">
        <div class="alert alert-primary">あなたの会社の詳細が自動的に添付されます。</div>
        <p class="text-primary mb-4">求人情報を作成するには、すべてのフィールドに入力してください。</p>
        <div class="row mb-3">
            <div class="col-sm-12 col-md-12">
                <form action="{{route('post.update',['post'=>$post])}}" id="postForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label style="display: block">職種</label>
                        <select id="multiple" class="js-states form-control" name="occategory[]" multiple>
                            @php
                            $selectedCategories = $post->occategory ? explode(',', $post->occategory) : [];
                            @endphp

                            @foreach($occategories as $occategory)
                            <option value="{{$occategory->id}}"
                                {{ in_array($occategory->id, $selectedCategories) ? 'selected' : '' }}>
                                {{$occategory->category_name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8">
                                <label style="display: block">業種</label>
                                <select id="multiple1" class="js-states form-control" name="bucategory[]" multiple>
                                    @php
                                    $selectedCategories = $post->bucategory ? explode(',', $post->bucategory) : [];
                                    @endphp

                                    @foreach($bucategories as $bucategory)
                                    <option value="{{$bucategory->id}}"
                                        {{ in_array($bucategory->id, $selectedCategories) ? 'selected' : '' }}>
                                        {{$bucategory->category_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">空席数</label>
                                <input type="number" class="form-control @error('vacancy_count') is-invalid @enderror"
                                    name="vacancy_count" value="{{ $post->vacancy_count }}" required>
                                @error('vacancy_count')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label style="display: block">こだわり</label>
                        <select id="multiple2" class="js-states form-control" name="spcategory[]" multiple>
                            @php
                            $selectedCategories = $post->spcategory ? explode(',', $post->spcategory) : [];
                            @endphp

                            @foreach($spcategories as $spcategory)
                            <option value="{{$spcategory->id}}"
                                {{ in_array($spcategory->id, $selectedCategories) ? 'selected' : '' }}>
                                {{$spcategory->category_name}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label style="display: block">地域</label>

                        <select id="multiple3" class="js-states form-control" name="locategory[]" multiple>
                            @php
                            $selectedCategories = $post->locategory ? explode(',', $post->locategory) : [];
                            @endphp

                            @foreach($locategories as $locategory)
                            <option value="{{$locategory->id}}"
                                {{ in_array($locategory->id, $selectedCategories) ? 'selected' : '' }}>
                                {{$locategory->category_name}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">月給</label>
                                <input type="text" placeholder="5万円～10万円"
                                    class="form-control @error('salary') is-invalid @enderror" name="salary"
                                    value="{{ $post->salary }}" required>
                                @error('salary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">採用締切日</label>
                                <input type="date" class="form-control @error('deadline') is-invalid @enderror"
                                    name="deadline"
                                    value="@php $date = new DateTime($post->deadline); echo date('Y-m-d',$date->getTimestamp());@endphp"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">該当分野の経験</label>
                                <select name="experience" class="form-control" value="{{ $post->experience }}">
                                    <option value="Internship">なし</option>
                                    <option value="1 year">1年以下</option>
                                    <option value="2 years">1年以上～3年以下</option>
                                    <option value="3 years">3年以上</option>
                                    <option value="More than 5+ year">5年以上</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">専門的なスキル <span class="text-info">( 複数ある場合は", "で区切ってください。 )</span></label>
                        <input type="text" placeholder="Skill1,Skill2 etc"
                            class="form-control @error('skills') is-invalid @enderror" name="skills"
                            value="{{$post->skills}}" required>
                    </div>

                    <div class="form-group">
                        <label for="">仕事内容（仕様） <small>Optional Field</small></label>
                        <input type="hidden" id="description" name="description" value="{{$post->description}}">
                        <div id="quillEditor" style="height:200px"></div>
                    </div>

                    <button type="button" id="postBtn" class="btn primary-btn">更新</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endSection

@push('css')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('js')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
$(document).ready(function() {
    var quill = new Quill('#quillEditor', {
        modules: {
            toolbar: [
                [{
                    'font': []
                }, {
                    'size': []
                }],
                ['bold', 'italic'],
                [{
                    list: 'ordered'
                }, {
                    list: 'bullet'
                }],
                ['link', 'blockquote', 'code-block', 'image'],
            ]
        },
        placeholder: '',
        theme: 'snow'
    });

    quill.pasteHTML('<?php echo $post->description ?>')

    const postBtn = document.querySelector('#postBtn');
    const postForm = document.querySelector('#postForm');
    const description = document.querySelector('#description');

    if (description.value) {
        quill.root.innerHTML = description.value;
    }

    postBtn.addEventListener('click', function(e) {
        e.preventDefault();
        description.value = quill.root.innerHTML

        postForm.submit();
    })
})
</script>
@endpush