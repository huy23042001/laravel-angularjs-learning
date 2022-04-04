
app.controller('loaispcontroller', function($scope, $http) { //tao 1 controller
    $http({
        method: "GET",
        url: "http://localhost:8000/api/loaisp"
    }).then(function(response) {
        console.log(response.data);
        $scope.loaisps= response.data;
    });
    $scope.showmodal = function(id) {;
        $scope.id = id;
        if (id == 0) {
            $scope.loaisp = null;
            $scope.modalTitle = "Add new product category";
        } else {
            $scope.modalTitle = "Edit product category";     
            $http({
                method: "GET",
                url: "http://localhost:8000/api/loaisp/" + id
            }).then(function(response) {
                $scope.loaisp = response.data;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/loaisp/" + id
            }).then(function(response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    }
    $scope.saveData = function() {
        if ($scope.id == 0) { //dang them tin moi
            $http({
                method: "POST",
                url: "http://localhost:8000/api/loaisp",
                data: $scope.loaisp,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        } else { //sua tin
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/loaisp/" + $scope.id,
                data: $scope.loaisp,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        }
    }
});