@extends('_layout_admin')
@section('content')
	
<main>
    <div class="container-fluid px-4">
        <a href="/admin/LoaiSP/add" class='btn btn-info'>add</a>
		<table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>TT</th>
                        <th>Name</th>
                        <th>Detect</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>TT</th>
                        <th>Name</th>
                        <th>Detect</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
                <tbody>
                	@php 
                		$tt=1;
                	@endphp
                	@foreach($loaisps as $loai)
                    <tr>
                        <td>{{$tt++}}</td>
                        <td>{{$loai->tenloai}}</td>
                        <td align="right">{{$loai->Delet}}</td>
                        <td><a href="/admin/LoaiSP/{{$loai->id}}/show" class="btn btn-info">Edit</a></td>
                        <td><a onclick="return confirm('ban co muon xoa that khong?');" href="/admin/LoaiSP/{{$loai->id}}/destroy" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           </div>
	</main>

@stop