(function(){
    angular.module('app.directives',[])
        .directive('dialogBook',function(){
            return{
                restrict:'EA',
                replace:true,
                templateUrl:'templates/dialogBook.html',
                scope:{
                    title:'@',
                    add:'@',
                    state:'=',
                    datacolumn:'=',
                    cancel:'&alertCancel',
                    confirm:'&alertConfirm',
                    edit:'&alertEdit'
                },
                controller:function($scope){
                    $scope.alertPass=function(){
                        if($scope.confirm){
                            $scope.confirm();
                        }
                        if($scope.edit){
                            $scope.edit();
                        }
                        $scope.state=false;
                    };
                    $scope.alertCancel=function(){
                        if($scope.cancel){
                            $scope.cancel();
                        }
                        $scope.state=false;
                    };

                }
            }
        })
        .directive('dialogEdit',function(){
            return{
                restrict:'EA',
                replace:true,
                templateUrl:'templates/dialogEdit.html',
                scope:{
                    title:'@',
                    add:'@',
                    state:'=',
                    datacolumn:'=',
                    cancel:'&alertCancel',
                    confirm:'&alertConfirm',
                    edit:'&alertEdit'
                },
                controller:function($scope){
                    $scope.alertPass=function(){
                        if($scope.confirm){
                            $scope.confirm();
                        }
                        if($scope.edit){
                            $scope.edit();
                        }
                        $scope.state=false;
                    };
                    $scope.alertCancel=function(){
                        if($scope.cancel){
                            $scope.cancel();
                        }
                        $scope.state=false;
                    };

                }
            }
        })
        .directive('dialogDetail',function(){
            return{
                restrict:'EA',
                replace:true,
                templateUrl:'templates/dialogDetail.html',
                scope:{
                    title:'@',
                    state:'=',
                    datacolumn:'=',
                    cancel:'&alertCancel',
                    confirm:'&alertConfirm',
                    edit:'&alertEdit'
                },
                controller:function($scope){
                    $scope.alertCancel=function(){
                        if($scope.cancel){
                            $scope.cancel();
                        }
                        $scope.state=false;
                    };

                }
            }
        })
        .directive('dialogDel',function(){
            return{
                restrict:'EA',
                replace:true,
                templateUrl:'templates/dialogDel.html',
                scope:{
                    title:'@',
                    del:'@',
                    state:'=',
                    clear:'=',
                    cancel:'&alertCancel',
                    confirm:'&alertDel'
                },
                controller:function($scope){
                    $scope.alertDel=function(){
                        if($scope.confirm){
                            $scope.confirm();
                        }
                        $scope.state=false;
                    };
                    $scope.alertCancel=function(){
                        if($scope.cancel){
                            $scope.cancel();
                        }
                        $scope.state=false;
                    };

                }
            }
        })
        .directive('jshAlert', function ()
        {
            return {
                restrict:'EA',
                replace:true,
                templateUrl:'templates/myAlert.html',
                scope:{
                    alertState:'=',
                    alertMes:'@',
                    alertShow:'&'
                },
                controller: function ($scope,$timeout)
                {
                    $scope.$watch('alertState', function (newValue)
                    {
                        if(newValue)
                        {
                            var t1=$timeout(function ()
                            {
                                $scope.alertState=false;
                                if($scope.alertShow)
                                {
                                    $timeout.cancel(t1);
                                    $scope.alertShow();
                                }
                            },1500);
                        }

                    });

                }
            }
        })
    ;
})();
