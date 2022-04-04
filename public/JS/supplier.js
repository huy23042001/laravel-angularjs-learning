app.controller('mycontroller',function($scope,$http){
  

    $scope.suppliers=[];

    $http({
        method: "GET",
        url: "http://localhost:8000/api/suppliers"
    }).then(function(response) {
        $scope.suppliers = response.data;
        console.log($scope.suppliers)
    });

    $scope.showmodal = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Add new supplier";
            $scope.supplier.tenloai = "";
        } else {
            $scope.modalTitle = "Edit supplier";
            $http({
                method: "GET",
                url: "http://localhost:8000/api/suppliers/" + id
            }).then(function(response) {
                $scope.supplier = response.data;
                console.log($scope.supplier)
            });
        }
        $('#modelId').modal('show');
    }


    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/suppliers/" + id
            }).then(function(response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    }
    $scope.saveData = function() {
        if ($scope.id == 0) { //dang them moi
            $http({
                method: "POST",
                url: "http://localhost:8000/api/suppliers",
                data: $scope.supplier,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        } else { //sua
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/suppliers/" + $scope.id,
                data: $scope.supplier,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        }
    }
})