
app.controller('userscontroller', function($scope, $http) { //tao 1 controller
    $http({
        method: "GET",
        url: "http://localhost:8000/api/users"
    }).then(function(response) {
        console.log(response.data);
        $scope.listusers= response.data;
    });
    $scope.showmodal = function(id) {;
        $scope.id = id;
        if (id == 0) {
            $scope.users = null;
            $scope.modalTitle = "Add new users";
        } else {
            $scope.modalTitle = "Edit users";     
            $http({
                method: "GET",
                url: "http://localhost:8000/api/users/" + id
            }).then(function(response) {
                $scope.users = response.data;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/users/" + id
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
                url: "http://localhost:8000/api/users",
                data: $scope.users,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        } else { //sua tin
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/users/" + $scope.id,
                data: $scope.users,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        }
    }
});