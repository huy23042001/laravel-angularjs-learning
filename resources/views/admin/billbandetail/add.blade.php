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
                <form method="post" action='/admin/billbandetail/create'>
                	@csrf
                        <div class="form-group">
                            <label for="ncc">Ma don hang</label>
                            <select name="bill" id="">
                                @foreach($bill as $n)
                                    <option value="{{$n->id}}" >{{$n->id}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="ncc">San pham</label>
                            <select name="sp" id="">
                                @foreach($sp as $n)
                                    <option value="{{$n->id}}">{{$n->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sname">So luong</label>
                            <input type="text" class="form-control"
                                   id="sname" 
                                   name="quan">
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
