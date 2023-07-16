@extends('layouts.account')

@section('content')
<div class="account-layout border">
  <div class="account-hdr bg-primary text-white border">
  求人に応募
  </div>
  <div class="account-bdy p-3">
    <div class="row">
      <div class="col-sm-12 col-md-12 mb-5">
        <div class="card">
          <div class="card-header">
          マイプロフィール
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-3">
                <img src="{{asset('images/user-profile.png')}}" class="img-fluid rounded-circle" alt="">
              </div>
              <div class="col-9">
                <h6 class="text-info text-capitalize">{{auth()->user()->name}}</h6>
                <p class="my-2"><i class="fas fa-envelope"></i> Eメール: {{auth()->user()->email}}</p>
                <a href="{{route('account.index')}}">プロフィールを見る</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-12">
        <div class="card">
          <div class="card-header">
          主な仕事内容
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-3 d-flex align-items-center border p-3">
                <img src="{{asset($company->logo)}}" class="img-fluid" alt="">
              </div>
              <div class="col-9">
                <h6 class="text-uppercase">
                  <a href="{{route('account.employer',['employer'=>$company])}}">{{$company->title}}</a>
                </h6>
                <p class="my-2"><i class="fas fa-map-marker-alt"></i> 所在地: {{$post->locategory_jp}}</p>
                <p class="text-danger small">{{date('l, jS \of F Y',$post->deadlineTimestamp())}}, ({{ date('d',$post->remainingDays())}} days from now)</p>
              </div>
            </div>
            <div class="mb-3 d-flex justify-content-end">
              <div class="my-2">
                <a href="{{route('post.show',['job'=>$post])}}" class="secondary-link"><i class="fas fa-briefcase"></i> 仕事を見る</a>|
                <a href="{{route('savedJob.store',['id'=>$post->id])}}" class="secondary-link"><i class="fas fa-share-square"></i> 仕事を保存する</a>
              </div>
            </div>
            <div class="mb-3 d-flex justify-content-end">
              <div class="small">
                <a href="{{URL::previous()}}" class="btn primary-outline-btn">キャンセル</a>
                <form action="{{route('account.applyJob')}}" method="POST" class="d-inline-block">
                  @csrf
                  <input type="hidden" name="post_id" value="{{$post->id}}">
                  <button type="submit" class="btn primary-btn">応募を送る <i class="fas fa-chevron-right"></i></a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection