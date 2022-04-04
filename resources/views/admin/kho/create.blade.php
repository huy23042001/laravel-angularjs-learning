@extends('_layout_admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Thêm kho</h1>
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
                <form method="post" action='/admin/kho/create'>
                	@csrf
                        <input type="hidden"
                                   id="id" value="" 
                                   name="id">
                        <div class="form-group">
                            <label for="sanpham">Sản phẩm</label>
                            <select name="sanpham" id="sanpham">
                                @foreach($sanpham as $sp)
                                    <option value="{{$sp->id}}">
                                        {{$sp->name}}
                                    </option>
                                @endforeach
                            </select>
                            <!-- <label for="id_sp">Mã sản phẩm</label>
                            <input type="text" class="form-control"
                                   id="id_sp" 
                                   name="id_sp" value=""> -->
                        </div>
                         
                        <div class="form-group">
                            <label for="sl">Số lượng</label>
                            <input type="number" class="form-control"
                                   id="sl" 
                                   name="sl" value="" style="width: 100px;">
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
