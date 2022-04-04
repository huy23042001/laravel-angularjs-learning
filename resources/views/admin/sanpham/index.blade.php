@extends('_layout_admin')
@section('content')
	
        <main>
            
            <div class="container-fluid px-4">
            <form action="" id='category'>
                <p>Chon loai:
                    <select name="loaisp" id="loaisp">
                        @foreach($loaisp as $l)
                            <option value="{{$l->id}}">
                                {{$l->tenloai}}
                            </option>
                        @endforeach
                    </select>
                </p>
            </form>

            <a href="/admin/sanpham/add" class='btn btn-info'>add</a>
                
		<table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>TT</th>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Categories</th>
                        <th>Price</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>TT</th>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Categories</th>
                        <th>Price</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </tfoot>
                <tbody>
                	@php 
                		$tt=1;
                	@endphp
                	@foreach($sanpham as $sp)
                    <tr>
                        <td>{{$tt++}}</td>
                        <td><img src="/upload/sanpham/{{$sp->image}}" style='width:100px'></td>
                        <td>{{$sp->name}}</td>
                        <td>{{$sp->loaisp->tenloai}}</td>
                        <td align="right">{{number_format($sp->unit_price)}}</td>
                        <td><a href="/admin/sanpham/{{$sp->id}}/show" class="btn btn-info">Edit</a></td>
                        <td><a onclick="return confirm('ban co muon xoa that khong?');" href="/admin/sanpham/{{$sp->id}}/destroy" class="btn btn-danger">Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           </div>
	</main>
    <script>
function showcategory(){
    var selectBox = document.getElementById('loaisp');
    var userInput = selectBox.options[selectBox.selectedIndex].value;
    category.submit();
}
</script>
@stop