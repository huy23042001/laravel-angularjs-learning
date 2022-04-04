@extends('_layout_admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Sua thong tin nhân viên</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Nhân viên
            </div>
            <div class="card-body">
                <form method="post" action='/admin/nhanvien/update'>
                	@csrf
                        <input type="hidden"
                                   id="id" value="{{$nhanvien->id}}" 
                                   name="id">
                        <div class="form-group">
                            <label for="ten_nhanvien">Ten NV</label>
                            <input type="text" class="form-control"
                                   id="ten_nhanvien" 
                                   name="ten_nhanvien" value="{{$nhanvien->ten_nhanvien}}">
                        </div>
                         
                        <div class="form-group">
                            <label for="quequan">Que quan</label>
                            <input type="text" class="form-control"
                                   id="quequan" 
                                   name="quequan" value="{{$nhanvien->quequan}}">
                        </div>

                        <div class="form-group">
                            <label for="ngaysinh">Ngày sinh</label>
                            <input type="text" class="form-control"
                                   id="ngaysinh" 
                                   name="ngaysinh" value="{{$nhanvien->ngaysinh}}">
                        </div>
                        <div class="form-group">
                            <label for="gioitinh">Giới tính</label>
                            <input type="text" class="form-control"
                                   id="gioitinh" 
                                   name="gioitinh" value="{{$nhanvien->gioitinh}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control"
                                   id="email" 
                                   name="email" value="{{$nhanvien->email}}">
                        </div>

                        <div class="form-group">
                            <label for="sdt">Số ĐT</label>
                            <input type="text" class="form-control"
                                   id="sdt" 
                                   name="sdt" value="{{$nhanvien->sdt}}">
                        </div>

                        <div class="form-group">
                            <label for="capbac">Cấp bậc</label>
                            <input type="text" class="form-control"
                                   id="capbac" 
                                   name="capbac" value="{{$nhanvien->capbac}}">
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
