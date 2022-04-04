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
                <form method="post" action='/admin/khachhang/update'>
                	@csrf
                        <input type="hidden"
                                   id="sid" value="{{$brand->id}}" 
                                   name="id">
                        <div class="form-group">
                            <label for="sname">Ten SP</label>
                            <input type="text" class="form-control"
                                   id="name" 
                                   name="name" value="{{$brand->ten_kh}}">
                        </div>
                        <div class="form-group">
                            <label for="sname">Dia chi</label>
                            <input type="text" class="form-control"
                                   id="sname" 
                                   name="add" value="{{$brand->dia_chi}}">
                        </div>
                        <div class="form-group">
                            <label for="sname">Email</label>
                            <input type="text" class="form-control"
                                   id="sname" 
                                   name="mail" value="{{$brand->email}}">
                        </div>
                        <div class="form-group">
                            <label for="sname">SDT</label>
                            <input type="text" class="form-control"
                                   id="sname" 
                                   name="phone" value="{{$brand->sdt}}">
                        </div>
                        <div class="form-group">
                            <label for="sname">Note</label>
                            <input type="text" class="form-control"
                                   id="sname" 
                                   name="note" value="{{$brand->note}}">
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
