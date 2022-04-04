@extends('_layout_admin')
@section('content')
<main ng-controller="mycontroller">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Quản lý sản phẩm</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        
        <div class="card mb-4">
            <div class="card-header" style="display: flex; justify-content: space-between">
                <div>
                    <i class="fas fa-table me-1"></i>
                    Danh sách Sản phẩm
                </div>
                <div>
                    <p><button class="btn btn-primary" ng-click="showmodal(0)"><i class="fa fa-plus"> Create</i></button></p>
                </div>
            </div>
                <div class="card-body">
                    <table id="datatablesSimple">
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
                        <td>@{{sp.category.tenloai}}</td>
                        <td><button class="btn btn-info fa fa-pencil" ng-click="showmodal(sp.id)">&nbsp;</button></td>
                        <td><button class="btn btn-danger fa fa-trash" ng-click="deleteClick(sp.id)">&nbsp;</button></td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
      Launch
    </button>

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
                                <input type="text" class="form-control" ng-model="product.don_vi_tinh">
                            </div>
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

    <script>
        app.controller('mycontroller',function($scope,$http){
            console.log('ád'); 
        })
    </script>

    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM
        });
    </script>
@stop



