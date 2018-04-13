var myapp = angular.module('myApp', []);

/*
 * Getting countries and states list
 */
myapp.controller('DependentDropDownCrtl', ['$http', '$scope', function ($http, $scope) {

        $scope.countryList = undefined;
        $scope.stateList = undefined;
        $scope.countryList1 = undefined;

        $http({
            method: 'GET',
            url: baseurl + 'getCountries',
        }).success(function (data) {
            console.log(data);
            $scope.countryList = data;
//            if (country) {
//                $scope.countryId = country;
//                $scope.stateId = state;
//            }

        });
//        if (country) {
//            $scope.countryIdVal = country;
//            $http({
//                method: 'POST',
//                url: baseurl + 'getStates',
//                data: {countryId: $scope.countryIdVal}
//
//            }).success(function (data) {
//                console.log(data);
//                $scope.stateList = data;
//
//
//
//            });
//        }
//        if (state1) {
//            for (i = 0; i < country1.length; i++) {
//                $scope.countryIdVal = country1[i];
//                $http({
//                    method: 'POST',
//                    url: baseurl + 'getStates',
//                    data: {countryId1: $scope.countryIdVal}
//
//                }).success(function (data) {
//                    console.log(data);
//                     $scope.stateList = data;
//
//                });
//            }
//
//        }

        $http({
            method: 'GET',
            url: baseurl + 'getCountries',
        }).success(function (data) {

            console.log(data);
            $scope.countryList1 = data;
//            if (country1) {
//                for (i = 0; i < country1.length; i++) {
//                    $scope.countryId1 = country1[i];
//                }
//            }
        });


        $scope.onCountryChange = function () {

            $scope.countryIdVal = $scope.countryId;
            $http({
                method: 'POST',
                url: baseurl + 'getStates',
                data: {countryId: $scope.countryIdVal}

            }).success(function (data) {
                console.log(data);
                $scope.stateList = data;
            });

        };
        
        $scope.onCountryChange1 = function (countryId1, count) {

            $http({
                method: 'POST',
                url: baseurl + 'getStates',
                data: {countryId1: countryId1}

            }).success(function (data) {
                console.log(data);
                $scope["stateList" + count] = data;

            });

        };
    }]);
/*
 * creating rel copy for education details   
 */

myapp.controller('MainCtrl', function ($scope) {

    $scope.choices = [{id: 'choice1'}];

    $scope.addNewChoice = function () {
        var newItemNo = $scope.choices.length + 1;
        $scope.choices.push({'id': 'choice' + newItemNo});
        console.log(newItemNo);
    };

    $scope.removeChoice = function () {
        var lastItem = $scope.choices.length - 1;//alert(lastItem);
        $scope.choices.splice(lastItem);
    };

    $scope.addNewChoice1 = function () {
        var newItemNo = $scope.choices.length;
        $scope.choices.push({'id': 'choice' + newItemNo});
        console.log(newItemNo);
    };
    $scope.removeChoice1 = function () {//alert($scope.choices.length);
        // var index = count-1;alert(index);
        // $scope.choices.splice(index, 1);     
//alert($scope.choicesparam.splice(lastItem));
    };

//     $scope.removeChoice1 = function (choicesparam,count) {
//       var index = count-1;alert(index);
//        $scope.choices.splice(index, 1);     
////alert($scope.choicesparam.splice(lastItem));
//    };

});

/*
 * creating rel copy for experience details 
 */

myapp.controller('MainCtrl1', function ($scope) {

    $scope.choices = [{id: 'choice1'}];

    $scope.addNewChoice = function () {

        var newItemNo = $scope.choices.length + 1;
        $scope.choices.push({'id': 'choice' + newItemNo});

    };

    $scope.removeChoice = function () {
        var lastItem = $scope.choices.length - 1;
        $scope.choices.splice(lastItem);
    };
});

