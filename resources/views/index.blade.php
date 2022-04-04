<!DOCTYPE html>
<html lang="en" ng-app='myapp'>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website angular js</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body ng-controller="mycontroller">
    <h1>Test Angular: @{{'yet' + '!'}}</h1>
    <h2>@{{hello}}</h2>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">TT</th>
            <th scope="col">Ma SV</th>
            <th scope="col">Ten SV</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="sv in datas">
                <th scope="row">@{{$index+1}}</th>
                <td>@{{sv.masv}}</td>
                <td>@{{sv.tensv}}</td>
            </tr>
        </tbody>
    </table>


    <script src="/JS/angular.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="/JS/main.js"></script>
</body>

</html>