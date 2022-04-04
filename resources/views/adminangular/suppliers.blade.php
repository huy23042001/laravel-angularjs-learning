@extends('_layout_admin')
@section('content')
<main ng-controller="mycontroller">
    <h1>SUPPLIER MANAGEMENT FORM</h1>
    <p><button class="btn btn-primary" ng-click="showmodal(0)"><i class="fa fa-plus"> Create</i></button></p>
    <div>
        <table class="table table-border">
            <thead>
                <tr>
                    <th>TT</th>
                    <th>Supplier Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="item in suppliers">
                    <td>@{{$index+1}}</td>
                    <td>@{{item.ten_ncc}}</td>
                    <td>@{{item.diachi_ncc}}</td>
                    <td>@{{item.email}}</td>
                    <td>@{{item.sdt}}</td>
                    <td><button class="btn btn-info fa fa-pencil" ng-click="showmodal(item.id)">&nbsp;</button></td>
                    <td><button class="btn btn-danger fa fa-trash" ng-click="deleteClick(item.id)">&nbsp;</button></td>
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
                            <label for="name">Supplier name:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="supplier.ten_ncc">
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="name">Address:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="supplier.diachi_ncc">
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="name">Email:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="supplier.email">
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="name">Phone:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="supplier.sdt">
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
</main>
@stop


@section('js')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="/JS/supplier.js"></script>
@stop



