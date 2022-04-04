@extends('_layout_admin')
@section('content')
    <main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Sửa tin</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tin
            </div>
            <div class="card-body">
                <form method="post" action='/admin/news/update'>
                	@csrf
                        <input type="hidden"
                                   id="id_new" value="{{$news->id_new}}" 
                                   name="id_new">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control"
                                   id="title" 
                                   name="title" value="{{$news->title}}">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <input type="text" class="form-control"
                                   id="content" 
                                   name="content" value="{{$news->content}}">
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