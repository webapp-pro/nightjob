@extends('layouts.account')

@section('content')
<div class="account-layoutborder">
    <div class="account-hdr bg-primary text-white border ">
        ユーザーアカウント
    </div>
    <div class="account-bdy border py-3">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-12 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="{{asset('images/user-profile.png')}}" class="img-radius"
                                        alt="User-Profile-Image"> </div>
                                <h6 class="f-w-600">{{auth()->user()->name}}</h6>
                                @role('user')
                                <p>ユーザー</p>
                                @endrole
                                @role('admin')
                                <p>作成者 (求人情報の登録者) <i class="fas fa-pen-square"></i></p>
                                @endrole
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">情報</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">名前</p>
                                        <h6 class="text-muted f-w-400">{{auth()->user()->name}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">メールアドレス</p>
                                        <h6 class="text-muted f-w-400">{{auth()->user()->telephone}}</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">性別</p>
                                        <h6 class="text-muted f-w-400">@if(auth()->user()->gender == 0) 男性
                                            @elseif(auth()->user()->gender == 1) 女性 @endif</h6>
                                    </div> -->
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">生年月日</p>
                                        <h6 class="text-muted f-w-400">{{auth()->user()->birthday}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">電話番号</p>
                                        <h6 class="text-muted f-w-400">{{auth()->user()->telephone}}</h6>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Eメール</p>
                                        <h6 class="text-muted f-w-400">{{auth()->user()->gender}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">現職</p>
                                        <h6 class="text-muted f-w-400">{{auth()->user()->current_job}}</h6>
                                    </div>
                                </div> -->
                                <!-- <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">住所(番地)</p>
                                        <h6 class="text-muted f-w-400">{{auth()->user()->street}}</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">居住県</p>
                                        <h6 class="text-muted f-w-400">{{auth()->user()->province}}</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">教育程度</p>
                                        <h6 class="text-muted f-w-400">{{auth()->user()->education}}</h6>
                                    </div>
                                </div> -->
                                <!-- <h3>{{auth()->user()->title}}</h3>
                                <h5>{{auth()->user()->overview}}</h5> -->
                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">アカウント</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">パスワード</p>
                                        <a href="{{route('account.changePassword')}}"
                                            class="btn primary-outline-btn">パスワードを変更</a>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">ログアウト</p>
                                        <a href="{{route('account.logout')}}" class="btn btn-outline-dark">ログアウト</a>
                                    </div>
                                </div>
                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="facebook" data-abc="true"><i
                                                class="mdi mdi-facebook feather icon-facebook facebook"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="twitter" data-abc="true"><i
                                                class="mdi mdi-twitter feather icon-twitter twitter"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                            data-original-title="instagram" data-abc="true"><i
                                                class="mdi mdi-instagram feather icon-instagram instagram"
                                                aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endSection

@push('css')
<style>
.user-card-full {
    overflow: hidden;
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
    border: none;
    margin-bottom: 30px
}

.m-r-0 {
    margin-right: 0px
}

.m-l-0 {
    margin-left: 0px
}

.user-card-full .user-profile {
    border-radius: 5px 0 0 5px
}

.bg-c-lite-green {
    background: linear-gradient(to right, #185A91, #3498DA)
}

.user-profile {
    padding: 20px 0
}

.card-block {
    padding: 1.25rem
}

.m-b-25 {
    margin-bottom: 25px
}

.img-radius {
    border-radius: 5px
}

h6 {
    font-size: 16px
}

.card .card-block p {
    line-height: 25px
}

@media only screen and (min-width: 1400px) {
    p {
        font-size: 16px
    }
}

.card-block {
    padding: 1.25rem
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.m-b-20 {
    margin-bottom: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.card .card-block p {
    line-height: 25px
}

.m-b-10 {
    margin-bottom: 10px
}

.text-muted {
    color: #919aa3 !important
}

.b-b-default {
    border-bottom: 1px solid #e0e0e0
}

.f-w-600 {
    font-weight: 600
}

.m-b-20 {
    margin-bottom: 20px
}

.m-t-40 {
    margin-top: 20px
}

.p-b-5 {
    padding-bottom: 5px !important
}

.m-b-10 {
    margin-bottom: 10px
}

.m-t-40 {
    margin-top: 20px
}
</style>
@endpush