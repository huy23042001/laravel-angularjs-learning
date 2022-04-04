
app.controller('phanhoicontroller', function($scope, $http) { //tao 1 controller
    $http({
        method: "GET",
        url: "http://localhost:8000/api/phanhoi"
    }).then(function(response) {
        console.log(response.data);
        $scope.phanhois= response.data;
    });
    $scope.showmodal = function(id) {;
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Add new phan hoi";
        } else {
            $scope.modalTitle = "Edit phan hoi";     
            $http({
                method: "GET",
                url: "http://localhost:8000/api/phanhoi/" + id
            }).then(function(response) {
                $scope.phanhoi = response.data;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/phanhoi/" + id
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
                url: "http://localhost:8000/api/phanhoi",
                data: $scope.phanhoi,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        } else { //sua tin
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/phanhoi/" + $scope.id,
                data: $scope.phanhoi,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        }
    }
});