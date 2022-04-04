@extends('_layout_admin')
@section('content')
<div ng-controller="bill">
    <table class="table table-border">
        <thead>
            <tr>
            <th>TT</th>
            <th>khach hang</th>
            <th>Ngay ban</th>
            <th>Tong tien</th>
            <th>Phuong thuc </th>
            <th>tinh trang</th>
            <th>ghi chu</th>
            <th>Edit</th>
            <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="l in loaisps">
                <td>@{{$index+1}}</td>
                <td>@{{l.tenloai}}</td>
                <td><button class="btn btn-info" ng-click="showmodal(l.id)">&nbsp;</button></td>
                <td><button class="btn btn-danger" ng-click="deleteClick(l.id)">&nbsp;</button></td>
            </tr>
        </tbody>
    </table>
</div>
@stop


@section('js')
<script>
    app.controller('bill', ($scope, $http)=>{
        $http({
            method: "GET",
            url: 'http://127.0.0.1:8000/api/billban'
        }).then((res)=>{
            $scope.bills = res.data;
            console.log(res.data);
        }, (err)=>{

        })
    });
</script>
@stop