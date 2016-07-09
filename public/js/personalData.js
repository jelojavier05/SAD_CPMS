(function(){    
    var app = angular.module("personalData",[]);
    var personalDataController = function($scope, $http) {
        var measurement;
        
        var onPersonaldataComplete = function(response){
            $scope.personalData = response.data; 
            
            
        }; 
        
        var onMeasurementCompelete = function(response){
            measurement = response.data;
        };
        
        var onBodyAttributeComplete = function(response){
            $scope.bodyAttributes = response.data;
            
            var bodyAttribute = response.data;
            for (intLoop = 0; intLoop < bodyAttribute.length; intLoop ++){
                for (intLoop2 = 0; intLoop2 < measurement.length; intLoop2 ++){
                    if (bodyAttribute[intLoop].intMeasurementID == measurement[intLoop2].intMeasurementID){
                        bodyAttribute[intLoop].intMeasurementID = measurement[intLoop2].strMeasurement;
                    }
                }
            }
            $scope.counter = bodyAttribute.length;

        };
        
        var onError = function(reason){
            $scope.errorMessage = "Something went wrong.";
        };
        
        $http.get('/guard/registration/personaldata/get')
            .then(onPersonaldataComplete, onError); //get the session if any
        
        $http.get('/maintenance/unitOfMeasurement/get')
            .then(onMeasurementCompelete, onError);
        
        $http.get('/maintenance/bodyAttribute/get')
            .then(onBodyAttributeComplete, onError);
        
        
    };
    
    app.controller("personalDataController", personalDataController);
       
}());  




