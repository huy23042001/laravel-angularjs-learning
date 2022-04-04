@extends('_layout_admin')
@section('content')
	
<main>
    <div class="container-fluid px-4">
        <a href="/admin/news/add" class='btn btn-info'>add</a>
		<table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>TT</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>TT</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
                <tbody>
                	@php 
                		$tt=1;
                	@endphp
                	@foreach($news as $n)
                    <tr>
                        <td>{{$tt++}}</td>
                        <td>{{$n->title}}</td>
                        <td>{{$n->content}}</td>
                        <td><img src="/upload/news/{{$n->image}}" style='width:100px'></td>
                        <td><a href="/admin/news/{{$n->id_new}}/show" class="btn btn-info">Edit</a></td>
                        <td><a onclick="return confirm('ban co muon xoa that khong?');" href="/admin/news/{{$n->id_new}}/destroy" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           </div>
	</main>

@stop