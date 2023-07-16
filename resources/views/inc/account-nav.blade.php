<div class="account-nav">
  <ul class="list-group">
    @role('admin')
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'dashboard' ? 'active': ''}}">
      <a href="{{route('account.dashboard')}}" class="account-nav-link">
        <i class="fas fa-chart-line"></i> ダッシュボード
      </a>
    </li>
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'view-all-users' ? 'active': ''}}">
      <a href="{{route('account.viewAllUsers')}}" class="account-nav-link">
        <i class="fas fa-users"></i> すべてのユーザーを見る
      </a>
    </li>
    @endrole
    @role('author')
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'author-section' ? 'active': ''}}">
      <a href="{{route('account.authorSection')}}" class="account-nav-link">
        <i class="fas fa-chart-line"></i> 作成者セクション
    </li>
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'post' && request()->segment(3) == 'create' ? 'active': ''}}">
      <a href="{{route('post.create')}}" class="account-nav-link">
        <i class="fas fa-plus-square"></i> 求人情報の作成
    </li>
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'job-application' ? 'active': ''}}">
      <a href="{{route('jobApplication.index')}}" class="account-nav-link">
        <i class="fas fa-bell"></i> 求人アプリケーション
    </li>
    @endrole
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'overview' ? 'active': ''}}">
      <a href="{{route('account.index')}}" class="account-nav-link">
        <i class="fas fa-user-shield"></i> ユーザーアカウント
      </a>
    </li>
    @role('user')
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'become-employer' ? 'active': ''}}">
      <a href="{{route('account.becomeEmployer')}}" class="account-nav-link">
        <i class="fas fa-user-shield"></i> 雇用主になる
      </a>
    </li>
    @endrole
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'change-password' ? 'active': ''}}">
      <a href="{{route('account.changePassword')}}" class="account-nav-link">
        <i class="fas fa-fingerprint"></i> パスワードの変更
      </a>
    </li>    
    <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'my-saved-jobs' ? 'active': ''}}">
      <a href="{{route('savedJob.index')}}" class="account-nav-link">
        <i class="fas fa-stream"></i> 保存した仕事
      </a>
    </li>   
     <li class="list-group-item list-group-item-action {{ request()->segment(2) == 'deactivate' ? 'active': ''}}">
      <a href="{{route('account.deactivate')}}" class="account-nav-link">
        <i class="fas fa-folder-minus"></i> アカウントの停止
      </a>
    </li>    
  </ul>
</div>