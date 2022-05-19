<?php
    if (isset($_POST['sw1on']))
        { 
            system("gpio -g mode 1 out");
            system("gpio -g write 1 1");
        } 
    else if (isset($_POST['sw1off']))
        { 
            system("gpio -g write 1 0");
        } 
    elseif (isset($_POST['sw2on']))
        { 
            system("gpio -g mode 2 out");
            system("gpio -g write 2 1");
        } 
    else if (isset($_POST['sw2off']))
        { 
            system("gpio -g write 2 0");
        } 
?>
<html lang="en" ng-app="myApp" ng-controller="plugCtrl">
<?php  include('includes/head.php')?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="plug1">
                <span>PLUG 1 : </span>
                <div class="result_box" style="padding-top:5px">
                    <img ng-src="{{plug_state1}}" style="width:200px;height:195px;">
                    <div style="padding-top:20px">
                        <p>{{result1}}</p>
                    </div>
                    <form method="post">
                        <div class="box on"></div>
                        <div style="padding-top:10px;">
                            <button class="btn btn-success rounded mx-5 {{on1}}" ng-click="checkplug1(1)" id="sw1on"
                                name="sw1on" type="button">ON</button>
                            <button class="btn btn-danger rounded mx-5 {{off1}}" ng-click="checkplug1(0)" id="sw1off"
                                name="sw1off" type="button">OFF</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="plug2">
                <span>PLUG 2 : </span>
                <div class="result_box" style="padding-top:5px">
                    <img ng-src="{{plug_state2}}" style="width:200px;height:195px;">
                    <div style="padding-top:20px">
                        <p>{{result2}}</p>
                    </div>
                    <form method="post">
                        <div class="box on"></div>
                        <div style="padding-top:10px;">
                            <button class="btn btn-success rounded mx-5 {{on2}}" ng-click="checkplug2(1)" id="sw2on"
                                name="sw2on" type="button">ON</button>
                            <button class="btn btn-danger rounded mx-5 {{off2}}" ng-click="checkplug2(0)" id="sw2off"
                                name="sw2off" type="button">OFF</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="plug3">
                <span>PLUG 3 : </span>
                <div class="result_box" style="padding-top:5px">
                    <img ng-src="{{plug_state3}}" style="width:200px;height:195px;">
                    <div style="padding-top:20px">
                        <p>{{result3}}</p>
                    </div>
                    <form method="post">
                        <div class="box on"></div>
                        <div style="padding-top:10px;">
                            <button class="btn btn-success rounded mx-5 {{on3}}" ng-click="checkplug3(1)" id="sw3on"
                                name="sw3on" type="button">ON</button>
                            <button class="btn btn-danger rounded mx-5 {{off3}}" ng-click="checkplug3(0)" id="sw3off"
                                name="sw3off" type="button">OFF</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
var app = angular.module("myApp", []);
app.controller('plugCtrl', function($scope) {
    // define init variable
    $scope.result1 = "PLUGROOM IS OFF";
    $scope.plug_state1 = "http://localhost/onoff/upload/plugOff.png";
    $scope.off1 = "disabled";

    $scope.checkplug1 = function(val1) {
        $scope.result1 = "PLUGROOM IS ";

        if (!val1) {
            $scope.result1 += "OFF";
            $scope.button1 = "0";
            $scope.plug_state1 = "http://localhost/onoff/upload/plugOff.png";
        } else {
            $scope.result1 += "ON";
            $scope.button1 = "1";
            $scope.plug_state1 = "http://localhost/onoff/upload/plugOn.png";
        }
        if ($scope.button1 == "0") {
            $scope.off1 = "disabled";
            $scope.on1 = "";
        } else {
            $scope.on1 = "disabled";
            $scope.off1 = "";
        }
    };
    // define init variable
    $scope.result2 = "PLUGROOM IS OFF";
    $scope.plug_state2 = "http://localhost/onoff/upload/plugOff.png";
    $scope.off2 = "disabled";

    $scope.checkplug2 = function(val2) {
        $scope.result2 = "PLUGROOM IS ";

        if (!val2) {
            $scope.result2 += "OFF";
            $scope.button2 = "0";
            $scope.plug_state2 = "http://localhost/onoff/upload/plugOff2.png";
        } else {
            $scope.result2 += "ON";
            $scope.button2 = "1";
            $scope.plug_state2 = "http://localhost/onoff/upload/plugOn2.png";
        }
        if ($scope.button2 == "0") {
            $scope.off2 = "disabled";
            $scope.on2 = "";
        } else {
            $scope.on2 = "disabled";
            $scope.off2 = "";
        }
    };
    $scope.result3 = "PLUGROOM IS OFF";
    $scope.plug_state3 = "http://localhost/onoff/upload/plugOff.png";
    $scope.off3 = "disabled";

    $scope.checkplug3 = function(val3) {
        $scope.result3 = "PLUGROOM IS ";

        if (!val3) {
            $scope.result3 += "OFF";
            $scope.button3 = "0";
            $scope.plug_state3 = "http://localhost/onoff/upload/plugOff2.png";
        } else {
            $scope.result3 += "ON";
            $scope.button3 = "1";
            $scope.plug_state3 = "http://localhost/onoff/upload/plugOn2.png";
        }
        if ($scope.button3 == "0") {
            $scope.off3 = "disabled";
            $scope.on3 = "";
        } else {
            $scope.on3 = "disabled";
            $scope.off3 = "";
        }
    };

})
</script>

</html