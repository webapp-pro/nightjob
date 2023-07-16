@extends('layouts.account')

@section('content')
  <div class="account-layout  border">
    <div class="account-hdr bg-primary text-white border">
    求人応募
    </div>
    <div class="account-bdy p-3">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <p class="mb-3 alert alert-primary"><strong>求人情報</strong>に応募してきたすべての応募者をリストアップします。</p>
          <div class="table-responsive pt-3">
            <table class="table table-hover table-striped small">
              <thead>
                <tr>
                  <th>#</th>
                  <th>応募者名</th>
                  <th>メールアドレス</th>
                  <th>職種名</th>
                  <th>応募日</th>
                  <th>アクション</th>
                </tr>
              </thead>
              <tbody>
                @if($applications && $applications->count())
                  @foreach($applications as $application)
                  <tr>
                    <td>1</td>
                    <td>{{$application->user->name}}</td>
                    <td><a href="mailto:{{$application->user->email}}">{{$application->user->email}}</a></td>
                    <td><a href="{{route('post.show',['job'=>$application->post->id])}}">{{substr($application->post->locategory_jp,0,14)}}...</a></td>
                    <td>{{$application->created_at}}</td>
                    <td><a href="{{route('jobApplication.show',['id'=>$application])}}" class="btn primary-outline-btn">見る</a>
                      <form action="{{route('jobApplication.destroy')}}" method="POST" class="d-inline-block">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="application_id" value="{{$application->id}}">
                        <button type="submit" class="btn danger-btn">削除</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                @else
                  <tr>
                    <td>応募がありません</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                @endif
              </tbody>
            </table>
          </div>
          <div class="d-flex justify-content-center mt-4 custom-pagination">
            {{ $applications && $applications->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endSection
