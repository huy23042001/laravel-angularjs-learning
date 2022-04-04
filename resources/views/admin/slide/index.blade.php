@extends('_layout_admin')
@section('content')
	
<main>
    <div class="container-fluid px-4">
        <a href="/admin/slide/add" class='btn btn-info'>add</a>
		<table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>TT</th>
                        <th>Link</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>TT</th>
                        <th>Link</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
                <tbody>
                	@php 
                		$tt=1;
                	@endphp
                	@foreach($slide as $s)
                    <tr>
                        <td>{{$tt++}}</td>
                        <td>{{$s->link}}</td>
                        <td><img src="/upload/slide/{{$s->image}}" style='width:100px'></td>
                        <td><a href="/admin/slide/{{$s->id_slide}}/show" class="btn btn-info">Edit</a></td>
                        <td><a onclick="return confirm('ban co muon xoa that khong?');" href="/admin/slide/{{$s->id_slide}}/destroy" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           </div>
	</main>

@stop