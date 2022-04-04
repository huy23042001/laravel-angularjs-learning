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
                <form method="post" action='/admin/billban/update'>
                	@csrf
                        <input name="id" value="{{$bill->id}}" hidden>

                        <div class="form-group">
                            <label for="ncc">khach hang</label>
                            <select name="kh" id="">
                                @foreach($kh as $n)
                                    <option value="{{$n->id}}" {{$n->id==$bill->id_kh?'selected':''}}>{{$n->ten_kh}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sname">Ngay dat</label>
                            <input type="text" class="form-control"
                                   id="sname" 
                                   name="date" value="{{$bill->date_order}}">
                        </div>

                        <div class="form-group">
                            <label for="sname">Trạng thái</label>
                            <input type="text" class="form-control"
                                   id="sname" 
                                   name="status" value="{{$bill->status}}">
                        </div>

                        <div class="form-group">
                            <label for="sname">Note</label>
                            <input type="text" class="form-control"
                                   id="sname" 
                                   name="note" value="{{$bill->note}}">
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
