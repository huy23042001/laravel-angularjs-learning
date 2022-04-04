@extends('_layout_admin')
@section('content')
<div ng-controller="quangcaocontroller">
    <h1>NEW MANAGEMENT FORM</h1>
    <p><button class="btn btn-primary" ng-click="showmodal(0)"><i class="fa fa-plus"> Create</i></button></p>
    <div>
        <table class="table table-border">
            <thead>
                <tr>
                    <th>TT</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Note</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="q in quangcaos">
                    <td>@{{$index+1}}</td>
                    <td><img src="/upload/sanpham/@{{q.image}}"></td>
                    <td>@{{q.tittle}}</td>
                    <td>@{{q.note}}</td>
                    <td><button class="btn btn-info fa fa-pencil" ng-click="showmodal(q.id)">&nbsp;</button></td>
                    <td><button class="btn btn-danger fa fa-trash" ng-click="deleteClick(q.id)">&nbsp;</button></td>
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
                                <input type="text" class="form-control" ng-model="quangcao.tittle">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>Note:</label>
                            <div>
                                <input type="text"class="form-control" ng-model="quangcao.note">
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
    <script src="/JS/quangcaocontroller.js"></script>
@stop