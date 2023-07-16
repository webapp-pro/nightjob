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
                <form action="{{ route('post.store') }}" id="postForm" method="POST">
                    @csrf
                    <div class="form-group">
                        <label style="display: block">職種</label>
                        <select id="multiple" class="js-states form-control" name="occategory[]" multiple>
                            @php
                            $selectedCategories = is_array(old('occategory')) ? implode(',', old('occategory')) : '';
                            @endphp
                            @foreach($occategories as $occategory)
                            <option value="{{$occategory->id}}"
                                {{ strpos($selectedCategories, $occategory->id) !== false ? 'selected' : '' }}>
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
                                    $selectedCategories = is_array(old('bucategory')) ? implode(',', old('bucategory'))
                                    : '';
                                    @endphp

                                    @foreach($bucategories as $bucategory)
                                    <option value="{{$bucategory->id}}"
                                        {{ strpos($selectedCategories, $bucategory->id) !== false ? 'selected' : '' }}>
                                        {{$bucategory->category_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">空席数</label>
                                <input type="number" class="form-control @error('vacancy_count') is-invalid @enderror"
                                    name="vacancy_count" value="{{ old('vacancy_count') }}" required>
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
                            $selectedCategories = is_array(old('spcategory')) ? implode(',', old('spcategory')) : '';
                            @endphp

                            @foreach($spcategories as $spcategory)
                            <option value="{{$spcategory->id}}"
                                {{ strpos($selectedCategories, $spcategory->id) !== false ? 'selected' : '' }}>
                                {{$spcategory->category_name}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label style="display: block">地域</label>
                        <select id="multiple3" class="js-states form-control" name="locategory[]" multiple>
                            @php
                            $selectedCategories = is_array(old('locategory')) ? implode(',', old('locategory')) : '';
                            @endphp

                            @foreach($locategories as $locategory)
                            <option value="{{$locategory->id}}"
                                {{ strpos($selectedCategories, $locategory->id) !== false ? 'selected' : '' }}>
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
                                    value="{{ old('salary') }}" required>
                                @error('salary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="">採用締切日</label>
                                <input type="date" class="form-control @error('deadline') is-invalid @enderror"
                                    name="deadline" value="{{ old('deadline') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">該当分野の経験</label>
                                <select name="experience" class="form-control" value="{{ old('experience') }}">
                                    <option value="なし">なし</option>
                                    <option value="1年以下">1年以下</option>
                                    <option value="1年以上～3年以下">1年以上～3年以下</option>
                                    <option value="3年以上">3年以上</option>
                                    <option value="5年以上">5年以上</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">専門的なスキル <span class="text-info">( I複数ある場合は", "で区切ってください。 )</span></label>
                        <input type="text" placeholder="Skill1,Skill2 etc"
                            class="form-control @error('skills') is-invalid @enderror" name="skills"
                            value="{{ old('skills') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="">仕事内容（仕様） <small>Optional Field</small></label>
                        <input type="hidden" id="description" name="description"
                            value="{{ old('description') }}">
                        <div id="quillEditor" style="height:200px"></div>
                    </div>

                    <button type="button" id="postBtn" class="btn primary-btn">作成</button>
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
        placeholder: 'Job Reqirement , Job Specifications etc ...',
        theme: 'snow'
    });


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
