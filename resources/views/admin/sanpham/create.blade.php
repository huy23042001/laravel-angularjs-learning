@extends('_layout_admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tao thong tin san pham</h1>
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
                <form method="post" action='/admin/sanpham/create'>
                	@csrf
                        <div class="form-group">
                            <label for="category">Loai SP</label>
                            <select name="category" >
                                @foreach($cat as $sp)
                                <option value="{{$sp->id}}">{{$sp->tenloai}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="brand">Nha cung cap</label>
                            <select name="brand" >
                                @foreach($brand as $sp)
                                <option value="{{$sp->id}}">{{$sp->ten_ncc}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sname">Ten SP</label>
                            <input type="text" class="form-control"
                                   id="name" 
                                   name="name" >
                        </div>

                        <div class="form-group">
                            <label for="quan">So luong</label>
                            <input type="text" class="form-control"
                                   id="name" 
                                   name="quan" >
                        </div>
                         
                        <div class="form-group">
                            <label for="description">Mo ta</label>
                            <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
                            <textarea id="description" name="description">
                                
                            </textarea>
                            <script>
                                    CKEDITOR.replace( 'description' );
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
