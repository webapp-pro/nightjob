@extends('layouts.account')

@section('content')
<div class="account-layout border">
  <div class="account-hdr bg-primary text-white border " >
    こだわり編集
  </div>
  <div class="account-bdy p-3">
    @if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif
      <div class="row mb-3">
        <div class="col-12">
          <p class="alert alert-primary">こだわり名を変更しようとしています : {{$spcategory->category_name}}</p>
          <form action="{{route('spcategory.update',['id'=>$spcategory->id])}}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
              <label for="">こだわり選択</label>
              <input type="text" placeholder="カテゴリー名を編集" name="category_name" class="form-control @error('category_name') input-error @enderror">
            </div>
            <div class="d-flex">
              <button type="submit" class="btn secondary-btn mr-3">更新</button>
              <a href="{{route('account.dashboard')}}" class="btn primary-outline-btn">キャンセル</a>
            </div>
          </form>
        </div>
      </div>
  </div>
</div>
@endsection