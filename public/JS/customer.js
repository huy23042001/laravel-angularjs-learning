app.controller('mycontroller',function($scope,$http){
  

    $scope.customer=[];
    $http({
        method: "GET",
        url: "http://localhost:8000/api/customers"
    }).then(function(response) {
        $scope.customers = response.data;
        console.log($scope.customers)
    });

    $scope.showmodal = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Add new customer";
            $scope.customer.tenloai = "";
        } else {
            $scope.modalTitle = "Edit customer";
            $http({
                method: "GET",
                url: "http://localhost:8000/api/customers/" + id
            }).then(function(response) {
                $scope.customer = response.data;
                console.log($scope.customer)
            });
        }
        $('#modelId').modal('show');
    }


    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/customers/" + id
            }).then(function(response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    }
    $scope.saveData = function() {
        console.log($scope.customer);
        if ($scope.id == 0) { //dang them moi
            $http({
                method: "POST",
                url: "http://localhost:8000/api/customers",
                data: $scope.customer,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                // location.reload();

            });
        } else { //sua
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/customers/" + $scope.id,
                data: $scope.customer,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        }
    }
})