@extends('_layout_admin')
@section('content')
	
<main>
    <div class="container-fluid px-4">
        <a href="/admin/phan_hoi/add" class='btn btn-info'>add</a>
		<table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>TT</th>
                        <th>Tài Khoản</th>
                        <th>Sản phẩm</th>
                        <th>Level</th>
                        <th>Note</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>TT</th>
                        <th>Tài Khoản</th>
                        <th>Sản phẩm</th>
                        <th>Level</th>
                        <th>Note</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
                <tbody>
                	@php 
                		$tt=1;
                	@endphp
                	@foreach($phanhoi as $p)
                    <tr>
                        <td>{{$tt++}}</td>
                        <td>{{$p->users->users_name}}</td>
                        <td>{{$p->sanpham->name}}</td>
                        <td>{{$p->level}}</td>
                        <td>{{$p->note}}</td>
                        <td><a href="/admin/phan_hoi/{{$p->id_phan_hoi}}/show" class="btn btn-info">Edit</a></td>
                        <td><a onclick="return confirm('ban co muon xoa that khong?');" href="/admin/phan_hoi/{{$p->id_phan_hoi}}/destroy" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           </div>
	</main>

@stop