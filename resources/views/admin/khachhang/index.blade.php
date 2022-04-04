@extends('_layout_admin')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Danh sach san pham</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        
        <div class="card mb-4">
            <div class="card-header" style="display: flex; justify-content: space-between">
                <div>
                    <i class="fas fa-table me-1"></i>
                    Nha cung cap
                </div>
                <div>
                    <a href="/admin/khachhang/add" class="btn btn-primary">Thêm</a>
                </div>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>TT</th>
                            <th>Ten</th>
                            <th>Dia chi</th>
                            <th>Email</th>
                            <th>Sđt</th>
                            <th>note</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>TT</th>
                            <th>Ten</th>
                            <th>Dia chi</th>
                            <th>Email</th>
                            <th>Sđt</th>
                            <th>note</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    	@php 
                    		$tt=1;
                    	@endphp
                    	@foreach($kh as $sp)
                        <tr>
                            <td>{{$tt++}}</td>
                            <td>{{$sp->ten_kh}}</td>
                            <td>{{$sp->dia_chi}}</td>
                            <td>{{$sp->email}}</td>
                            <td>{{$sp->sdt}}</td>
                            <td>{{$sp->note}}</td>
                            <td><a href="/admin/khachhang/{{$sp->id}}/show" class="btn btn-info">Edit</a></td>
                            <td><a onclick="return confirm('Ban co muon xoa that khong?');" href="/admin/khachhang/{{$sp->id}}/delete" class="btn btn-danger">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@stop
