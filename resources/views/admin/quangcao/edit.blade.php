@extends('_layout_admin')
@section('content')
    <main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Sửa quảng cáo</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Quảng cáo
            </div>
            <div class="card-body">
                <form method="post" action='/admin/quang_cao/update'>
                	@csrf
                        <input type="hidden"
                                   id="id" value="{{$quangcao->id}}" 
                                   name="id">
                                   <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control"
                                   id="title" 
                                   name="title" value="{{$quangcao->tittle}}">
                        </div>
                        <div class="form-group">
                            <label for="note">Note</label>
                            <input type="text" class="form-control"
                                   id="note" 
                                   name="note" value="{{$quangcao->note}}">
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control"
                                   id="image" 
                                   name="image" value="{{$quangcao->image}}">
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