@extends('_layout_admin')
@section('content')
<div ng-controller="nhanviencontroller">
    <h1>NEW MANAGEMENT FORM</h1>
    <p><button class="btn btn-primary" ng-click="showmodal(0)"><i class="fa fa-plus"> Create</i></button></p>
    <div>
        <table class="table table-border">
            <thead>
                <tr>
                    <th>TT</th>
                    <th>Fullname</th>
                    <th>Gender</th>
                    <th>Birthday</th>
                    <th>Address</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="nv in nhanviens">
                    <td>@{{$index+1}}</td>
                    <td>@{{nv.ten_nhanvien}}</td>
                    <td>@{{nv.gioitinh}}</td>
                    <td>@{{nv.ngaysinh}}</td>
                    <td>@{{nv.quequan}}</td>
                    <td><button class="btn btn-info fa fa-pencil" ng-click="showmodal(nv.id)">&nbsp;</button></td>
                    <td><button class="btn btn-danger fa fa-trash" ng-click="deleteClick(nv.id)">&nbsp;</button></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">@{{modalTitle}}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>Fullname:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="nhanvien.ten_nhanvien">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>Gender:</label>
                            <div>
                                <input type="text"class="form-control" ng-model="nhanvien.gioitinh">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>Birthday:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="nhanvien.ngaysinh">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>Address:</label>
                            <div>
                                <input type="text"class="form-control" ng-model="nhanvien.quequan">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>Phone:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="nhanvien.sdt">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>Email:</label>
                            <div>
                                <input type="email"class="form-control" ng-model="nhanvien.email">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>Level:</label>
                            <div>
                                <input type="text"class="form-control" ng-model="nhanvien.capbac">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" ng-click="saveData()">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
    <script src="/JS/nhanviencontroller.js"></script>
@stop