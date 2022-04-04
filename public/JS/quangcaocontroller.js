
app.controller('quangcaocontroller', function($scope, $http) { //tao 1 controller
    $http({
        method: "GET",
        url: "http://localhost:8000/api/quangcao"
    }).then(function(response) {
        console.log(response.data);
        $scope.quangcaos= response.data;
    });
    $scope.showmodal = function(id) {;
        $scope.id = id;
        if (id == 0) {
            $scope.quangcao = null;
            $scope.modalTitle = "Add new quang cao";
        } else {
            $scope.modalTitle = "Edit quang cao";     
            $http({
                method: "GET",
                url: "http://localhost:8000/api/quangcao/" + id
            }).then(function(response) {
                $scope.quangcao = response.data;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/quangcao/" + id
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
                url: "http://localhost:8000/api/quangcao",
                data: $scope.quangcao,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        } else { //sua tin
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/quangcao/" + $scope.id,
                data: $scope.quangcao,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        }
    }
});