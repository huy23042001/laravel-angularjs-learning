@extends('_layout_admin')
@section('content')
<div ng-controller="phanhoicontroller">
    <h1>PHAN HOI MANAGEMENT FORM</h1>
    <p><button class="btn btn-primary" ng-click="showmodal(0)"><i class="fa fa-plus"> Create</i></button></p>
    <div>
        <table class="table table-border">
            <thead>
                <tr>
                    <th>TT</th>
                    <th>Product</th>
                    <th>User</th>
                    <th>Level</th>
                    <th>Note</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="p in phanhois">
                    <td>@{{$index+1}}</td>
                    <td>@{{p.sanpham.name}}</td>
                    <td>@{{p.users.users_name}}</td>
                    <td>@{{p.level}}</td>
                    <td>@{{p.note}}</td>
                    <td><button class="btn btn-info fa fa-pencil" ng-click="showmodal(p.id_phan_hoi)">&nbsp;</button></td>
                    <td><button class="btn btn-danger fa fa-trash" ng-click="deleteClick(p.id_phan_hoi)">&nbsp;</button></td>
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
                            <label>Title:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="phanhoi">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>id:</label>
                            <div>
                                <input type="text"class="form-control" ng-model="news.content">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>Title:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="phanhoi">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>Content:</label>
                            <div>
                                <input type="text"class="form-control" ng-model="news.content">
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
    <script src="/JS/phanhoicontroller.js"></script>
@stop