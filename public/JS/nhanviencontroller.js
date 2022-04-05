
app.controller('nhanviencontroller', function($scope, $http) { //tao 1 controller
    $http({
        method: "GET",
        url: "http://localhost:8000/api/nhanvien"
    }).then(function(response) {
        console.log(response.data);
        $scope.nhanviens= response.data;
    });
    $scope.showmodal = function(id) {;
        $scope.id = id;
        if (id == 0) {
            $scope.nhanvien = null;
            $scope.modalTitle = "Add new nhan vien";
        } else {
            $scope.modalTitle = "Edit nhan vien";     
            $http({
                method: "GET",
                url: "http://localhost:8000/api/nhanvien/" + id
            }).then(function(response) {
                $scope.nhanvien = response.data;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/nhanvien/" + id
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
                url: "http://localhost:8000/api/nhanvien",
                data: $scope.nhanvien,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        } else { //sua tin
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/nhanvien/" + $scope.id,
                data: $scope.nhanvien,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        }
    }
});