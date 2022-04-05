@extends('_layout_admin')
@section('content')
<div ng-controller="khocontroller">
    <h1>KHO MANAGEMENT FORM</h1>
    <p><button class="btn btn-primary" ng-click="showmodal(0)"><i class="fa fa-plus"> Create</i></button></p>
    <div>
        <table class="table table-border">
            <thead>
                <tr>
                    <th>TT</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="k in khos">
                    <td>@{{$index+1}}</td>
                    <td>@{{k.sanpham.name}}</td>
                    <td>@{{k.sl}}</td>
                    <td><button class="btn btn-info fa fa-pencil" ng-click="showmodal(k.id)">&nbsp;</button></td>
                    <td><button class="btn btn-danger fa fa-trash" ng-click="deleteClick(k.id)">&nbsp;</button></td>
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
                            <label for="supplier">Product:</label>
                            <select name="supplier" id="supplier" ng-model="kho.id_sp">
                                <option ng-repeat="option in products" value="@{{option.id}}">@{{option.name}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>Quantity:</label>
                            <div>
                                <input type="number" class="form-control" ng-model="kho.sl">
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
    <script src="/JS/khocontroller.js"></script>
@stop