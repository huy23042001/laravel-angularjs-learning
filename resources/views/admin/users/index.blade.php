@extends('_layout_admin')
@section('content')
	
<main>
    <div class="container-fluid px-4">
        <a href="/admin/users/add" class='btn btn-info'>add</a>
		<table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>TT</th>
                        <th>User Name</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Detect</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>TT</th>
                        <th>User Name</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Detect</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
                <tbody>
                	@php 
                		$tt=1;
                	@endphp
                	@foreach($users as $u)
                    <tr>
                        <td>{{$tt++}}</td>
                        <td>{{$u->users_name}}</td>
                        <td>{{$u->full_name}}</td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->phone}}</td>
                        <td align="right">{{$u->Delet}}</td>
                        <td><a href="/admin/users/{{$u->id}}/show" class="btn btn-info">Edit</a></td>
                        <td><a onclick="return confirm('ban co muon xoa that khong?');" href="/admin/users/{{$u->id}}/destroy" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           </div>
	</main>

@stop