@extends('layouts.account')

@section('content')
<div class="account-layout border">
  <div class="account-hdr bg-primary text-white border">
    求人応募
  </div>
  <div class="account-bdy p-3">
  <p class="alert alert-primary"><span class="text-capitalize"> ({{$applicant->name}})</span>というユーザーが{{$application->created_at}}にあなたのリスティング広告に応募しました。</p>
    <div class="row">
      <div class="col-sm-12 col-md-12 mb-5">
        <div class="card">
          <div class="card-header">
            ユーザープロフィール（申請者）
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-3">
                <img src="{{asset('images/user-profile.png')}}" class="img-fluid rounded-circle" alt="">
              </div>
              <div class="col-9">
                <h6 class="text-info text-capitalize">{{$applicant->name}}</h6>
                <p class="my-2"> 生年月日: {{$applicant->birthday}}</p>
                <p class="my-2"> 電話番号: {{$applicant->telephone}}</p>
                <p class="my-2"><i class="fas fa-envelope"></i> Eメール: {{$applicant->email}}</p>
                <a href="mailto:{{$applicant->email}}" class="btn primary-btn" title="click to send email">ユーザーに電子メールを送信する</a>
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
                <p class="h4 text-info text-capitalize">
                  {{$post->job_title}}
                </p>
                <h6 class="text-uppercase">
                  <a href="{{route('account.employer',['employer'=>$company])}}">{{$company->title}}</a>
                </h6>
                <p class="my-2"><i class="fas fa-map-marker-alt"></i> Location: {{$post->job_location}}</p>
                <p class="text-danger small">{{date('l, jS \of F Y',$post->deadlineTimestamp())}}, ({{ date('d',$post->remainingDays())}} 日 残った)</p>
              </div>
            </div>
            <div class="mb-3 d-flex justify-content-end">
              <div class="my-2">
                <a href="{{route('post.show',['job'=>$post])}}" class="secondary-link"><i class="fas fa-briefcase"></i> 求人を見る</a>
              </div>
            </div>
            <div class="mb-3 d-flex justify-content-end">
              <div class="small">
                <a href="{{route('jobApplication.index')}}" class="btn primary-outline-btn">戻る</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection