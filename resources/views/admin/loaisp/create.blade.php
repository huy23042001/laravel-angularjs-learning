@extends('_layout_admin')
@section('content')
    <main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Thêm loại sản phẩm</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Loai san pham
            </div>
            <div class="card-body">
                <form method="post" action='/admin/LoaiSP/create'>
                	@csrf
                        <input type="hidden"
                                   id="id" value="" 
                                   name="id">
                        <div class="form-group">
                            <label for="tenloai">Tên loại</label>
                            <input type="text" class="form-control"
                                   id="tenloai" 
                                   name="tenloai" value="">
                        </div>
                        <div class="form-group" style="width: 100px">
                            <label for="Delet">Trang thái</label>
                            <input type="text" class="form-control"
                                   id="Delet" 
                                   name="Delet" value="">
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