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
            <th>Edit</th>
            <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="l in billdetails track by $index">
                <td>@{{$index+1}}</td>
                <td>@{{l.id_bill_ban}}</td>
                <td>@{{l.sanpham.name}}</td>
                <td>@{{l.sl}}</td>
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
                        <label for="name">Ma don hang:</label>
                        <div>
                            <input type="text" class="form-control" ng-model="bill.id_bill_ban">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">San pham:</label>
                        <div>
                            <select  id="name" ng-model = "bill.id_sp">
                                <option ng-repeat = "p in products" value="@{{p.id}}">@{{p.name}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">So luong:</label>
                        <div>
                            <input type="text" class="form-control" ng-model="bill.sl">
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
                <h5 class="modal-title" id="exampleModalLabel">X??c nh???n</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
               <p>b???n c?? mu???n x??a kh??ng?</p>
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
            url: 'http://127.0.0.1:8000/api/billbandetail',
            method: 'GET'
        }).then((res)=>{
            $scope.billdetails = res.data;
            console.log(res.data);
        }, (err)=>{

        });

        $http({
            url: 'http://127.0.0.1:8000/api/products',
            method: 'GET'
        }).then((res)=>{
            $scope.products = res.data.sanphams;
            console.log(res.data);
        }, (err)=>{

        });

        $scope.openModal = (id, index)=>{
            console.log(id);
            if(id>=0){
                $scope.title = "c???p nh???t";
                $scope.selected = id;
                $scope.index = index;
                $scope.state = "update";
                $scope.bill = $scope.billdetails[index];
                $scope.bill.id_sp+="";
            } else {
                $scope.bill = null;
                $scope.title = "t???o";
                $scope.state = "create"
            }
            $("#updatemodal").modal('show');
        }

        $scope.save = ()=>{
            if($scope.state == "create"){
                $http({
                    method: 'POST',
                    url: 'http://127.0.0.1:8000/api/billbandetail',
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
                    url: 'http://127.0.0.1:8000/api/billbandetail/'+$scope.selected,
                    'content-type': 'application/json',
                    data: $scope.bill
                }).then((res)=>{
                    $scope.billdetails[$scope.index] = res.data;
                    console.log(res.data);
                    $("#updatemodal").modal('hide');
                }, (err)=>{
                    console.log(err);
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
                url: 'http://127.0.0.1:8000/api/billbandetail/'+$scope.selected,
            }).then((res)=>{
                $scope.billdetails.splice($scope.index, 1);
                $("#deletemodal").modal('hide');
            }, (err)=>{

            });
        }
    });
</script>
@stop