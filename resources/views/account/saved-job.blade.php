@extends('layouts.account')

@section('content')
  <div class="account-layout border">
    <div class="account-hdr border bg-primary text-white shadow">
    保存されたジョブ
    </div>
    <div class="account-bdy p-3">
      <div class="my-2">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead class="bg-light small">
              <tr>
                <th>ポジション</th>
                <th>職務レベル</th>
                <th>会社名</th>
                <th>求人数</th>
                <th>応募前</th>
                <th>アクション</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
                @if($posts->count() >0)
                <tr>
                  <td><a href="{{route('post.show',['job'=>$post])}}">{{$post->job_title}}</a></td>
                  <td><a href="#">{{$post->job_level}}</a></td>
                  <td><a href="{{route('account.employer',['employer'=>$post->company])}}">{{substr($post->company->title,0,14)}}..</a></td>
                  <td>{{$post->vacancy_count}}</td>
                  <td>{{date('d/m/Y',$post->deadlineTimestamp())}}, {{date('d',$post->remainingDays()) }} 日数</td>
                  <td><form action="{{route('savedJob.destroy',['id'=>$post])}}" method="POST">
                    @csrf
                    @method("delete")
                    <button type="submit" href="#" class="btn secondary-outline-btn">保存解除</button>
                  </form></td>
                </tr>
                @else
                <tr>
                  <td>保存されている求人はありません。</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endSection
