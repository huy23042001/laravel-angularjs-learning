@extends('_layout_admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <a href="/admin/nhanvien/add" class='btn btn-info'>add</a>
        <h1 class="mt-4">Danh sach nhan vien</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Nhan vien
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>TT</th>
                            <th>Ho ten</th>
                            <th>Gioi tinh</th>
                            <th>Ngay sinh</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>TT</th>
                            <th>Ho ten</th>
                            <th>Gioi tinh</th>
                            <th>Ngay sinh</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    	@php 
                    		$tt=1;
                    	@endphp
                    	@foreach($nhanvien as $nv)
                        <tr>
                            <td>{{$tt++}}</td>
                            <td>{{$nv->ten_nhanvien}}</td>
                            <td>{{$nv->quequan}}</td>
                            <td>{{$nv->ngaysinh}}</td>
                            <td><a href="/admin/nhanvien/{{$nv->id}}/show" class="btn btn-info">Edit</a></td>
                            <td><a onclick="return confirm('Ban co muon xoa that khong?');" href="/admin/nhanvien/{{$nv->id}}/delete" class="btn btn-danger">Delete</a></td>
                        </tr>
                        @endforeach
                    </tbody>    
                </table>
            </div>
        </div>
    </div>
</main>

@stop
