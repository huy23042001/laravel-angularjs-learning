@extends('_layout_admin')
@section('content')
<div ng-controller="userscontroller">
    <h1>NEW MANAGEMENT FORM</h1>
    <p><button class="btn btn-primary" ng-click="showmodal(0)"><i class="fa fa-plus"> Create</i></button></p>
    <div>
        <table class="table table-border">
            <thead>
                <tr>
                    <th>TT</th>
                    <th>Image</th>
                    <th>Username</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="u in listusers">
                    <td>@{{$index+1}}</td>
                    <td><img src="/upload/sanpham/@{{u.image}}" ></td>
                    <td>@{{u.users_name}}</td>
                    <td>@{{u.full_name}}</td>
                    <td>@{{u.email}}</td>
                    <td>@{{u.phone}}</td>
                    <td><button class="btn btn-info fa fa-pencil" ng-click="showmodal(u.id)">&nbsp;</button></td>
                    <td><button class="btn btn-danger fa fa-trash" ng-click="deleteClick(u.id)">&nbsp;</button></td>
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
                            <label>Username:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="users.users_name">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>Password:</label>
                            <div>
                                <input type="text"class="form-control" ng-model="users.password">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>Fullname:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="users.full_name">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>Email:</label>
                            <div>
                                <input type="email"class="form-control" ng-model="users.email">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>Phone:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="users.phone">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>Address:</label>
                            <div>
                                <input type="text"class="form-control" ng-model="users.address">
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
    <script src="/JS/userscontroller.js"></script>
@stop