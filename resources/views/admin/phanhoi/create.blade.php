@extends('_layout_admin')
@section('content')
    <main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Thêm phản hồi mới</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Phản hồi
            </div>
            <div class="card-body">
                <form method="post" action='/admin/phan_hoi/create'>
                	@csrf
                    <input type="hidden"
                                   id="id_phan_hoi" value="" 
                                   name="id_phan_hoi">
                        <div class="form-group">
                            <label for="sanpham">Sản phẩm</label>
                            <select name="sanpham" id="sanpham" >
                                @foreach($sanphams as $s)
                                    <option value="{{$s->id}}">
                                        {{$s->name}}
                                    </option>
                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user">Tài khoản</label>
                            <select name="user" id="user" >
                                @foreach($users as $u)
                                    <option value="{{$u->id}}">
                                        {{$u->users_name}}
                                    </option>    
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>
                            <input type="number" class="form-control"
                                   id="level" 
                                   name="level" value="" style="width: 100px;">
                        </div>
                         
                        <div class="form-group">
                            <label for="note">Ghi chú</label>
                            <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
                            <textarea id="note" name="note">
                                
                            </textarea>
                            <script>
                                    CKEDITOR.replace( 'note' );
                            </script>
                            
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