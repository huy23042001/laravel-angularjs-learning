@extends('_layout_admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">sua thong tin san pham</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                San pham
            </div>
            <div class="card-body">
                <form method="post" action='/admin/billban/create'>
                	@csrf
                        <div class="form-group">
                            <label for="ncc">Khach hang</label>
                            <select name="kh" id="">
                                @foreach($kh as $n)
                                    <option value="{{$n->id}}" >{{$n->ten_kh}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="sname">Ngay dat</label>
                            <input type="text" class="form-control"
                                   id="sname" 
                                   name="date">
                        </div>

                        <div class="form-group">
                            <label for="sname">Trang thai</label>
                            <input type="text" class="form-control"
                                   id="sname" 
                                   name="status">
                        </div>

                        <div class="form-group">
                            <label for="sname">Note</label>
                            <input type="text" class="form-control"
                                   id="sname" 
                                   name="note">
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
