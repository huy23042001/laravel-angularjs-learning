
app.controller('newscontroller', function($scope, $http) { //tao 1 controller
    $http({
        method: "GET",
        url: "http://localhost:8000/api/news"
    }).then(function(response) {
        console.log(response.data);
        $scope.listnews= response.data;
    });
    $scope.showmodal = function(id) {;
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Add new news";
        } else {
            $scope.modalTitle = "Edit news";     
            $http({
                method: "GET",
                url: "http://localhost:8000/api/news/" + id
            }).then(function(response) {
                $scope.news = response.data;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/news/" + id
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
                url: "http://localhost:8000/api/news",
                data: $scope.news,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        } else { //sua tin
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/news/" + $scope.id,
                data: $scope.news,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        }
    }
});