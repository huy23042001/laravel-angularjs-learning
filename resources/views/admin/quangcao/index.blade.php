@extends('_layout_admin')
@section('content')
	
<main>
    <div class="container-fluid px-4">
        <a href="/admin/quang_cao/add" class='btn btn-info'>add</a>
		<table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>TT</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Note</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>TT</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Note</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
                <tbody>
                	@php 
                		$tt=1;
                	@endphp
                	@foreach($quangcao as $qc)
                    <tr>
                        <td>{{$tt++}}</td>
                        <td><img src="/upload/quangcao/{{$qc->image}}" style='width:100px'></td>
                        <td>{{$qc->tittle}}</td>
                        <td>{{$qc->note}}</td>
                        
                        <td><a href="/admin/quang_cao/{{$qc->id}}/show" class="btn btn-info">Edit</a></td>
                        <td><a onclick="return confirm('ban co muon xoa that khong?');" href="/admin/quang_cao/{{$qc->id}}/destroy" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           </div>
	</main>

@stop