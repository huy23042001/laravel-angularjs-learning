app.controller('mycontroller',function($scope,$http){
  

    $scope.product=[];

    $http({
        method: "GET",
        url: "http://localhost:8000/api/suppliers"
    }).then(function(response) {
        $scope.suppliers = response.data;
    });

    $http({
        method: "GET",
        url: "http://localhost:8000/api/loaisp"
    }).then(function(response) {
        $scope.loaisps = response.data;
    });

    $http({
        method: "GET",
        url: "http://localhost:8000/api/products"
    }).then(function(response) {
        $scope.products = response.data;
    });


    $scope.showmodal = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Add new product";
            $scope.product.name = "";
            $scope.product.mota_sp = "";
            $scope.product.unit_price = "";
            $scope.product.so_luong = "";
            $scope.product.don_vi_tinh = "";
            $scope.product.id_loai_sp = "";
            $scope.product.id_ncc = "";
        } else {
            $scope.modalTitle = "Edit product";
            $http({
                method: "GET",
                url: "http://localhost:8000/api/products/" + id
            }).then(function(response) {
                $scope.product = response.data[0];
                console.log($scope.product)
            });
        }
        $('#modelId').modal('show');
    }


    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/products/" + id
            }).then(function(response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    }
    $scope.saveData = function() {
        if ($scope.id == 0) { //dang them moi sp
            $http({
                method: "POST",
                url: "http://localhost:8000/api/products",
                data: $scope.product,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        } else { //sua san pham
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/products/" + $scope.id,
                data: $scope.product,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        }
    }
})