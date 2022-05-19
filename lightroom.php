<?php
    if (isset($_POST['sw3on']))
        { 
            system("gpio -g mode 3 out");
            system("gpio -g write 3 1");
        } 
    else if (isset($_POST['sw3off']))
        { 
            system("gpio -g write 3 0");
        }
?>
<html lang="en" ng-app="myApp" ng-controller="ledCtrl">
<?php  include('includes/head.php')?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="lamp1">
                <span>LIGHT : </span>
                <div class="result_box">
                    <img ng-src="{{lamp_state}}">
                </div>
            </div>
        </div>

    </div>
</div>

<div style="padding-top:20px">
    <p>{{result}}</p>
</div>

<form method="post">
    <div class="box on"></div>
    <div style="padding-top:10px;">
        <button class="btn btn-success rounded mx-5 {{on}}" ng-click="checkVal(1)" id="sw2on" name="sw1on"
            type="button">ON</button>
        <button class="btn btn-danger rounded mx-5 {{off}}" ng-click="checkVal(0)" name="sw2off"
            type="button">OFF</button>
    </div>
</form>

<script type="text/javascript">
var app = angular.module("myApp", []);
app.controller('ledCtrl', function($scope) {
    // define init variable
    $scope.result = "LIGHTROOM IS OFF";
    $scope.lamp_state = "http://sivarak.pccphet.ac.th/wp-content/uploads/2019/03/lampOff.png";
    $scope.off = "disabled";

    $scope.checkVal = function(val) {
        $scope.result = "LIGHTROOM IS ";

        if (!val) {
            $scope.result += "OFF";
            $scope.button = "0";
            $scope.lamp_state = "http://sivarak.pccphet.ac.th/wp-content/uploads/2019/03/lampOff.png";

        } else {
            $scope.result += "ON";
            $scope.button = "1";
            $scope.lamp_state = "http://sivarak.pccphet.ac.th/wp-content/uploads/2019/03/lampOn.png";
        }
        if ($scope.button == "0") {
            $scope.off = "disabled";
            $scope.on = "";
        } else {
            $scope.on = "disabled";
            $scope.off = "";
        }
    };


})
</script>

</html