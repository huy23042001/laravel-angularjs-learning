<!doctype html>
<html lang="en" ng-app="myapp" ng-controller="mycontroller">
  <head>
    <title>Quan ly san pham</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
  <body class="container">
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
                    <td>@{{sp.category.tenloai}}</td>
                    <td><button class="btn btn-info fa fa-pencil" ng-click="showmodal(sp.id)">&nbsp;</button></td>
                    <td><button class="btn btn-danger fa fa-trash" ng-click="deleteClick(sp.id)">&nbsp;</button></td>
                </tr>
            </tbody>
        </table>
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
                            <label for="categoryName">Category name: </label>
                            <select name="categoryName" id="categoryName" ng-model="product.id_loai_sp">
                            <option ng-repeat="option in categories" value="{{option.id_loai_sp}}">{{option.tenloai}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label for="supplier">Supplier name:</label>
                            <select name="supplier" id="supplier" ng-model="product.id_ncc">
                            <option ng-repeat="option in categories" value="{{option.id_loai_sp}}">{{option.tenloai}}</option>
                            </select>
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



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="/js/angular.min.js"></script>
    <script src="/js/hello.js"></script>
    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM
        });
    </script>

</body>
</html>