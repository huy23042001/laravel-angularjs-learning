@extends('_layout_admin')
@section('content')
<main ng-controller="mycontroller">
    <h1>PRODUCT MANAGEMENT FORM</h1>
    <p><button class="btn btn-primary" ng-click="showmodal(0)"><i class="fa fa-plus"> Create</i></button></p>

    <div>
        <table class="table table-border">
            <thead>
                <tr>
                    <th>TT</th>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Unit Price</th>
                    <th>Category Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="sp in products.sanphams">
                    <td>@{{$index+1}}</td>
                    <td><img src="/upload/sanpham/@{{sp.image}}" style='width:100px' alt=""></td>
                    <td>@{{sp.name}}</td>
                    <td align="right">@{{sp.unit_price |number:0}}</td>
                    <td>@{{sp.loaisp.tenloai}}</td>
                    <td><button class="btn btn-info fa fa-pencil" ng-click="showmodal(sp.id)">&nbsp;</button></td>
                    <td><button class="btn btn-danger fa fa-trash" ng-click="deleteClick(sp.id)">&nbsp;</button></td>
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
                            <label for="name">Product name:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="product.name">
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="categoryName">Category name: </label>
                            <select name="categoryName" id="categoryName" ng-model="product.id_loai_sp">
                                <option ng-repeat="option in loaisps" value="@{{option.id}}">@{{option.tenloai}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="supplier">Supplier name:</label>
                            <select name="supplier" id="supplier" ng-model="product.id_ncc">
                                <option ng-repeat="option in suppliers" value="@{{option.id}}">@{{option.ten_ncc}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="name">Description:</label>
                            <div>
                                <textarea class="form-control" rows="5" ng-model="product.mota_sp"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="name">Quantity:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="product.so_luong">
                            </div>
                        </div>
                    </div>


                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="name">Unit:</label>
                            <div>
                                <input type="text" class="form-control" ng-model="product.unit_price">
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

    <script src="/JS/product.js"></script>
@stop



