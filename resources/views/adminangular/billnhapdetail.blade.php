@extends('_layout_admin')
@section('content')
<div ng-controller="bill">
    <button class="btn btn-primary" ng-click="openModal(-1, -1)">Create</button>
    <table class="table table-border">
        <thead>
            <tr>
            <th>TT</th>
            <th>Ma don hang</th>
            <th>San pham</th>
            <th>So luong</th>
            <th>Don vi</th>
            <th>Edit</th>
            <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="l in billdetails track by $index">
                <td>@{{$index+1}}</td>
                <td>@{{l.id_bill_nhap}}</td>
                <td>@{{l.sanpham.name}}</td>
                <td>@{{l.sl}}</td>
                <td>@{{l.don_vi}}</td>
                
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
                        <label for="ncc">Ma HD nhap:</label>
                        <div>
                            <input type="text" class="form-control" ng-model="bill.id_bill_nhap">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="vn">san pham:</label>
                        <div>
                            <select name="" id="nv"  ng-model="bill.id_sp">
                                <option ng-repeat = "s in products" value="@{{s.id}}" >@{{s.name}}</option>
                            </select>
        
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">so luong:</label>
                        <div>
                            <input type="text" class="form-control" ng-model="bill.sl">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">don vi:</label>
                        <div>
                            <input type="text" class="form-control" ng-model="bill.don_vi">
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
            url: 'http://127.0.0.1:8000/api/products'
        }).then((res)=>{
            $scope.products = res.data.sanphams;
            console.log(res.data.sanphams);
        }, (err)=>{

        });

       

        $http({
            method: "GET",
            url: 'http://127.0.0.1:8000/api/billnhapdetail'
        }).then((res)=>{
            $scope.billdetails = res.data;
            console.log(res.data);
        }, (err)=>{

        });

        
        $scope.openModal = (id, index)=>{
            console.log(id);
            if(id>=0){
                
                $scope.title = "cập nhật";
                $scope.selected = id;
                $scope.index = index;
                $scope.state = "update";
                $scope.bill = $scope.billdetails[index];
                $scope.bill.id_sp+="";
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
                    url: 'http://127.0.0.1:8000/api/billnhapdetail',
                    'content-type': 'application/json',
                    data: $scope.bill
                }).then((res)=>{
        
                    $scope.billdetails.push(res.data);
                    $("#updatemodal").modal('hide');
                }, (err)=>{
                    console.log(err);
                });
            } else{
                $http({
                    method: 'PUT',
                    url: 'http://127.0.0.1:8000/api/billnhapdetail/'+$scope.selected,
                    'content-type': 'application/json',
                    data: $scope.bill
                }).then((res)=>{
                    $scope.billdetails[$scope.index] = res.data;
                    $("#updatemodal").modal('hide');
                }, (err)=>{
                    console.log(err);
                });
            }
        }

        $scope.chooseSupp =(id)=>{
            console.log(id);
        }

        $scope.chooseStaff =(id)=>{
            console.log(id);
        }

        $scope.openConfirm =(id, index)=>{
            $("#deletemodal").modal('show');
            $scope.selected = id;
            $scope.index = index;
        }

        $scope.delete = ()=>{
            $http({
                method: 'DELETE',
                url: 'http://127.0.0.1:8000/api/billnhapdetail/'+$scope.selected,
            }).then((res)=>{
                $scope.billdetails.splice($scope.index, 1);
                $("#deletemodal").modal('hide');
            }, (err)=>{

            });
        }
    });
</script>
@stop