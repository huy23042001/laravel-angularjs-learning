@extends('_layout_admin')
@section('content')
    <main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Sửa thông tin người dùng</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                User
            </div>
            <div class="card-body">
                <form method="post" action='/admin/users/update'>
                	@csrf
                        <input type="hidden"
                                   id="id" value="{{$user->id}}" 
                                   name="id">
                        <div class="form-group">
                            <label for="users_name">Username</label>
                            <input type="text" class="form-control"
                                   id="users_name" 
                                   name="users_name" value="{{$user->users_name}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control"
                                   id="password" 
                                   name="password" value="{{$user->password}}">
                        </div>
                        <div class="form-group">
                            <label for="full_name">Họ tên</label>
                            <input type="text" class="form-control"
                                   id="full_name" 
                                   name="full_name" value="{{$user->full_name}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control"
                                   id="email" 
                                   name="email" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Điện thoại</label>
                            <input type="text" class="form-control"
                                   id="phone" 
                                   name="phone" value="{{$user->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ</label>
                            <input type="text" class="form-control"
                                   id="address" 
                                   name="address" value="{{$user->address}}">
                        </div>
                        <div class="form-group" style="width: 100px">
                            <label for="Delet">Trang thái</label>
                            <input type="text" class="form-control"
                                   id="Delet" 
                                   name="Delet" value="{{$user->Delet}}">
                        </div>
 
                        <button type="submit" value="cmd" name="cmd" class="btn bg-success">
                            Save
                        </button>
                        
                    </form>
            </div>
        </div>
    </div>
</main>
@stop