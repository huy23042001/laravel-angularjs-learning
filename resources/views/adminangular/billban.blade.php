@extends('_layout_admin')
@section('content')
<div ng-controller="bill">
    <button class="btn btn-primary" ng-click="openModal(-1, -1)">Create</button>
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
            <tr ng-repeat="l in bills track by $index">
                <td>@{{$index+1}}</td>
                <td>@{{l.khach_hang.ten_kh}}</td>
                <td>@{{l.date_order}}</td>
                <td>@{{l.tong_tien}}</td>
                <td>@{{l.payment}}</td>
                <td>@{{l.status}}</td>
                <td>@{{l.note}}</td>
                <td><button class="btn btn-info" ng-click="openModal(l.id, $index)">update</button></td>
                <td><button class="btn btn-danger" ng-click="openConfirm(l.id, $index)">delete</button></td>
            </tr>
        </tbody>
    </table>

    <div class="modal fade" id="updatemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@{{title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="form-group">
                        <label for="name">Khach hang:</label>
                        <div>
                            <input type="text" class="form-control" ng-model="bill.id_kh">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Ngay ban:</label>
                        <div>
                            <input type="text" class="form-control" ng-model="bill.date_order">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Tinh trang:</label>
                        <div>
                            <input type="text" class="form-control" ng-model="bill.status">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Ghi chu:</label>
                        <div>
                            <input type="text" class="form-control" ng-model="bill.note">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" ng-click="save()">Save changes</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
               <p>bạn có muốn xóa không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" ng-click="delete()">Save changes</button>
            </div>
            </div>
        </div>
    </div>
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

        });
        $scope.reloaddata=function(){
            $http({
                url: 'http://127.0.0.1:8000/api/billban',
                method: 'GET'
            }).then((res)=>{
                $scope.bills = res.data;
                console.log(res.data);
            }, (err)=>{

            });
        }

        $scope.openModal = (id, index)=>{
            console.log(id);
            if(id>=0){
                $scope.title = "cập nhật";
                $scope.selected = id;
                $scope.index = index;
                $scope.state = "update";
                $scope.bill = $scope.bills[index];
                $scope.bill.id_kh = $scope.bills[index].id_kh;
            } else {
                $scope.title = "tạo";
                $scope.state = "create"
            }
            $("#updatemodal").modal('show');
        }

        $scope.save = ()=>{
            if($scope.state == "create"){
                $http({
                    method: 'POST',
                    url: 'http://127.0.0.1:8000/api/billban',
                    'content-type': 'application/json',
                    data: $scope.bill
                }).then((res)=>{
                    $scope.bills.push(res.data);
                    $("#updatemodal").modal('hide');
                }, (err)=>{

                });
            } else{
                $http({
                    method: 'PUT',
                    url: 'http://127.0.0.1:8000/api/billban/'+$scope.selected,
                    'content-type': 'application/json',
                    data: $scope.bill
                }).then((res)=>{
                    $scope.bills[$scope.index] = res.data;
                    $("#updatemodal").modal('hide');
                }, (err)=>{

                });
            }
        }

        $scope.openConfirm =(id, index)=>{
            $("#deletemodal").modal('show');
            $scope.selected = id;
            $scope.index = index;
        }

        $scope.delete = ()=>{
            $http({
                method: 'DELETE',
                url: 'http://127.0.0.1:8000/api/billban/'+$scope.selected,
            }).then((res)=>{
                $scope.bills.splice($scope.index, 1);
                $("#deletemodal").modal('hide');
            }, (err)=>{

            });
        }
    });
</script>
@stop