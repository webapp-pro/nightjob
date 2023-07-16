@extends('layouts.account')

@section('content')
<div class="account-layout  border">
    <div class="account-hdr bg-primary text-white border">
        ダッシュボード
    </div>
    <div class="account-bdy p-3">
        <div class="row mb-3">
            <div class="col-xl-4 col-sm-6 py-2">
                <div class="card dashboard-card text-white h-100 shadow">
                    <div class="card-body primary-bg">
                        <div class="rotate">
                            <i class="fas fa-users fa-4x"></i>
                        </div>
                        <h6 class="text-uppercase">応募者</h6>
                        <h1 class="">{{$dashCount['user']}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 py-2">
                <div class="card dashboard-card text-white  h-100 shadow">
                    <div class="card-body bg-secondary">
                        <div class="rotate">
                            <i class="fas fa-building fa-4x"></i>
                        </div>
                        <h6 class="text-uppercase">総募集公告</h6>
                        <h1 class="">{{$dashCount['post']}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 py-2">
                <div class="card dashboard-card text-white h-100 shadow">
                    <div class="card-body bg-info">
                        <div class="rotate">
                            <i class="fas fa-user-tie fa-4x"></i>
                        </div>
                        <h6 class="text-uppercase">雇用主</h6>
                        <h1 class="">{{$dashCount['author']}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 py-2">
                <div class="card dashboard-card text-white h-100 shadow">
                    <div class="card-body bg-danger">
                        <div class="rotate">
                            <i class="fas fa-star-of-life fa-4x"></i>
                        </div>
                        <h6 class="text-uppercase">ライブ投稿</h6>
                        <h1 class="">{{$dashCount['livePost']}}</h1>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 py-2">
                <div class="card dashboard-card text-white h-100 shadow">
                    <div class="card-body bg-warning">
                        <div class="rotate">
                            <i class="fas fa-industry fa-4x"></i>
                        </div>
                        <h6 class="text-uppercase">職種</h6>
                        <h1 class="">{{$occupationCategories->count()}}</h1>
                    </div>
                </div>
            </div>
        </div>

        <section class="dashboard-authors my-5">
            <div class="row my-4">
                <div class="col-lg-12 col-md-8 col-sm-12">
                    <h4 class="card-title text-secondary">作成者の管理 (求人登録者) </h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>No</th>
                                    <th>名前</th>
                                    <th>Eメール</th>
                                    <th>会社名</th>
                                    <th>アクション</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentAuthors as $author)
                                @if ($author->company)
                                <tr>
                                    <td>{{$author->id}}</td>
                                    <td>{{$author->name}}</td>
                                    <td>{{$author->email}}</td>
                                    <td>{{$author->company->title}}</td>
                                    <td>
                                        <a href="{{route('account.employer',['employer'=>$author->company])}}"
                                            class="btn primary-btn">会社を見る</a>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button class="btn primary-outline-btn disabled">登録作成者数 ({{ $recentAuthors->total()}}) </button>

                    <div class="d-flex justify-content-center mt-4 custom-pagination">
                        {{ $recentAuthors->links() }}
                    </div>
                </div>
            </div>
            <!--/row-->
        </section>
        <hr>

        <section class="dashboard-company">
            <h4 class="card-title text-secondary">事項を管理</h4>
            <div class="row my-4">
                <div class="col-sm-12 col-md-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#locategories-tab" role="tab"
                                data-toggle="tab">地域</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#occategories-tab" role="tab" data-toggle="tab">職種</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#bucategories-tab" role="tab" data-toggle="tab">業種</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#spcategories-tab" role="tab" data-toggle="tab">こだわり</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#roles-tab" role="tab" data-toggle="tab">ロール</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#permissions-tab" role="tab" data-toggle="tab">権限</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#role-have-permission-tab" role="tab"
                                data-toggle="tab">ロールに該当する権限</a>
                        </li>

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <br>
                        <div role="tabpanel" class="tab-pane active" id="locationcategories-tab">
                            <div class="mb-3">
                                <form action="{{route('locategory.store')}}" method="POST">
                                    @csrf
                                    <label for="">新地域追加</label>
                                    <div class="d-flex">
                                        <input type="text" class="form-control" placeholder="地域名" name="category_name">
                                        <button class="btn secondary-btn">追加</button>
                                    </div>
                                    @error('locategory_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </form>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>No</th>
                                            <th>地域名</th>
                                            <th>編集・削除</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($locationCategories as $locategory)
                                        <tr>
                                            <td>{{$locategory->id}}</td>
                                            <td>{{$locategory->category_name}}</td>
                                            <td><a class="btn secondary-btn"
                                                    href="{{route('locategory.edit',['locategory'=>$locategory])}}">編集</a>
                                                <form action="{{route('locategory.destroy',['id'=>$locategory->id])}}"
                                                    id="locategoryDestroyForm" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button id="locategoryDestroyBtn" class="btn danger-btn">削除</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="occategories-tab">
                            <div class="mb-3">
                                <form action="{{route('occategory.store')}}" method="POST">
                                    @csrf
                                    <label for="">新職種を追加</label>
                                    <div class="d-flex">
                                        <input type="text" class="form-control" placeholder="職種名" name="category_name">
                                        <button class="btn secondary-btn">追加</button>
                                    </div>
                                    @error('category_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </form>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>No</th>
                                            <th>職種名</th>
                                            <th>編集・削除</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($occupationCategories as $occategory)
                                        <tr>
                                            <td>{{$occategory->id}}</td>
                                            <td>{{$occategory->category_name}}</td>
                                            <td><a class="btn secondary-btn"
                                                    href="{{route('occategory.edit',['occategory'=>$occategory])}}">編集</a>
                                                <form action="{{route('occategory.destroy',['id'=>$occategory->id])}}"
                                                    id="occategoryDestroyForm" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button id="occategoryDestroyBtn" class="btn danger-btn">削除</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="bucategories-tab">
                            <div class="mb-3">
                                <form action="{{route('bucategory.store')}}" method="POST">
                                    @csrf
                                    <label for="">新業種を追加</label>
                                    <div class="d-flex">
                                        <input type="text" class="form-control" placeholder="業種名" name="category_name">
                                        <button class="btn secondary-btn">追加</button>
                                    </div>
                                    @error('category_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </form>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>No</th>
                                            <th>業種名</th>
                                            <th>編集・削除</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($businessCategories as $bucategory)
                                        <tr>
                                            <td>{{$bucategory->id}}</td>
                                            <td>{{$bucategory->category_name}}</td>
                                            <td><a class="btn secondary-btn"
                                                    href="{{route('bucategory.edit',['bucategory'=>$bucategory])}}">編集</a>
                                                <form action="{{route('bucategory.destroy',['id'=>$bucategory->id])}}"
                                                    id="bucategoryDestroyForm" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button id="bucategoryDestroyBtn" class="btn danger-btn">削除</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="spcategories-tab">
                            <div class="mb-3">
                                <form action="{{route('spcategory.store')}}" method="POST">
                                    @csrf
                                    <label for="">新だわりを追加</label>
                                    <div class="d-flex">
                                        <input type="text" class="form-control" placeholder="こだわり名"
                                            name="category_name">
                                        <button class="btn secondary-btn">追加</button>
                                    </div>
                                    @error('category_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </form>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>No</th>
                                            <th>こだわり名</th>
                                            <th>編集・削除</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($specialityCategories as $spcategory)
                                        <tr>
                                            <td>{{$spcategory->id}}</td>
                                            <td>{{$spcategory->category_name}}</td>
                                            <td><a class="btn secondary-btn"
                                                    href="{{route('spcategory.edit',['spcategory'=>$spcategory])}}">編集</a>
                                                <form action="{{route('spcategory.destroy',['id'=>$spcategory->id])}}"
                                                    id="spcategoryDestroyForm" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button id="spcategoryDestroyBtn" class="btn danger-btn">削除</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="roles-tab">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>No</th>
                                            <th>ロール</th>
                                            <th>編集・削除</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($roles as $index=>$role)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{$role}}</td>
                                            <td><a class="btn secondary-btn" href="">編集</a>
                                                <form action="" class="d-inline"><button type="submit"
                                                        class="btn danger-btn">削除</button></form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="permissions-tab">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>No</th>
                                            <th>権限</th>
                                            <th>編集・削除</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($permissions as $index=>$permission)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{$permission}}</td>
                                            <td><a class="btn secondary-btn" href="">編集</a>
                                                <form action="" class="d-inline"><button type="submit"
                                                        class="btn danger-btn">削除</button></form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="role-have-permission-tab">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>No</th>
                                            <th>ロール</th>
                                            <th>権限</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($rolesHavePermissions as $index=>$role)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>
                                                {{$role->name}}
                                            </td>
                                            <td>
                                                @if($role->permissions->count() == 0)
                                                <span class="badge badge-primary">basic auth permissions</span>
                                                @else
                                                @foreach ($role->permissions as $permission)
                                                <span class="badge badge-primary">{{$permission->name}}</span>
                                                @endforeach
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endSection

@push('js')
<script>
$(document).ready(function() {
    //delete category 
    $(document).on('click', '#locategoryDestroyBtn', function() {
        e.preventDefault();
        if (window.confirm('本当に削除しますか？')) {
            $('#locategoryDestroyForm').submit();
        }
    })

    $(document).on('click', '#occategoryDestroyBtn', function() {
        e.preventDefault();
        if (window.confirm('本当に削除しますか？')) {
            $('#occategoryDestroyForm').submit();
        }
    })
    $(document).on('click', '#bucategoryDestroyBtn', function() {
        e.preventDefault();
        if (window.confirm('本当に削除しますか？')) {
            $('#bucategoryDestroyForm').submit();
        }
    })
    $(document).on('click', '#spcategoryDestroyBtn', function() {
        e.preventDefault();
        if (window.confirm('本当に削除しますか？')) {
            $('#spcategoryDestroyForm').submit();
        }
    })
    // $(document).on('click', '.nav-item', function() {
    //     $('.tab-pane.active').removeClass('active')
    //     var id = $(this).find('a').attr('href')
    //     $(id).addClass('active')
    //     $('.nav-item.active').removeClass('active')
    //     $(this).addClass('active')
    // })

})
</script>
@endpush