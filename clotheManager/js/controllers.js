(function(){
    angular.module('app.controllers',['app.services'])
        //控制面板
        .controller('homeController',function($scope,$location){
            $scope.styleClick = function(){
                $location.url('/style');
            };
            $scope.categoryClick = function(){
                $location.url('/category');
            };
            $scope.clothesClick = function(){
                $location.url('/clothes');
            };
            $scope.messageClick = function(){
                $location.url('/message');
            };
            $scope.goinClick = function(){
                $location.url('/storage');
            };
            $scope.orderClick = function(){
                $location.url('/order');
            };
        })
        //风格模块管理
        .controller('styleController',function($scope,clothesService){
            //显示所有风格
            $scope.styleList = [];
            $scope.jsh = function(){
                clothesService.getStyle().then(function(response){
                    if(response.status == 200&&response.data.code == 100){
                        $scope.styleList=response.data.data;
                    }
                });
            };
            $scope.jsh();
            //添加
            $scope.dialogState=false;
            $scope.addStyle=function(){
                $scope.dialogState=true;
            };
            //编辑
            $scope.dialogState = false;

            $scope.data={
                id:'',
                name:'',
                priority:''
            };
            //编辑赋值
            $scope.styleEdit=function(item){
                $scope.data.id=item.id;
                $scope.data.name=item.name;
                $scope.data.priority=item.priority;
                console.log($scope.data);
                $scope.diaState=true;
            };
            //保存编辑
            $scope.onEdit=function(){
                console.log($scope.data.id);
                clothesService.getStyleEdit($scope.data).then(function(response){
                    console.log(response);
                    if(response.status==200&&response.data.code==100){
                        console.log('更新成功');
                        //$window.location.reload();
                        $scope.jsh();
                    }
                });
            };
            //确定添加
            $scope.onConfirm=function(){
                console.log($scope.data);
                clothesService.getAddStyle($scope.data).then(function(response){
                    console.log(response);
                    if(response.status==200&&response.data.code==100){
                        console.log('添加成功');
                        //$window.location.reload();
                        $scope.jsh();
                    }
                });
            };
            //删除
            $scope.column={
                id:'',
                name:''
            };
            $scope.diaDelState=false;
            $scope.styleDelete=function(item){
                $scope.column.id=item.id;
                $scope.diaDelState=true;
            };
            //确定删除
            $scope.onDel=function(){
                clothesService.getDeleteStyle($scope.column).then(function(response){
                    console.log(response);
                    if(response.status==200&&response.data.code==100){
                        console.log('删除成功');
                        //$window.location.reload();
                        $scope.jsh();
                    }
                });
            };
        })
        //类别模块管理
        .controller('categoryController',function($scope,clothesService){
            //显示所有类别
            $scope.categoryList = [];
            $scope.jsh = function(){
                clothesService.getCategory().then(function(response){
                    if(response.status == 200&&response.data.code == 100){
                        $scope.categoryList=response.data.data;
                    }
                });
            };
            $scope.jsh();
            //添加
            $scope.dialogState=false;
            $scope.addCategory=function(){
                $scope.dialogState=true;
            };
            //编辑
            $scope.dialogState = false;
            //确定添加
            $scope.data={
                id:'',
                name:'',
                priority:''
            };
            //编辑赋值
            $scope.categoryEdit=function(item){
                $scope.data.id=item.id;
                $scope.data.name=item.name;
                $scope.data.priority=item.priority;
                console.log($scope.data);
                $scope.diaState=true;
            };
            //保存编辑
            $scope.onEdit=function(){
                console.log($scope.data.id);
                clothesService.getCategoryEdit($scope.data).then(function(response){
                    console.log(response);
                    if(response.status==200&&response.data.code==100){
                        console.log('更新成功');
                        //$window.location.reload();
                        $scope.jsh();
                    }
                });
            };
            //确定添加
            $scope.onConfirm=function(){
                console.log($scope.data);
                clothesService.getAddCategory($scope.data).then(function(response){
                    console.log(response);
                    if(response.status==200&&response.data.code==100){
                        console.log('添加成功');
                        //$window.location.reload();
                        $scope.jsh();
                    }
                });
            };
            //删除
            $scope.column={
                id:'',
                name:''
            };
            $scope.diaDelState=false;
            $scope.categoryDelete=function(item){
                $scope.column.id=item.id;
                $scope.diaDelState=true;
            };
            //确定删除
            $scope.onDel=function(){
                clothesService.getDeleteCategory($scope.column).then(function(response){
                    console.log(response);
                    if(response.status==200&&response.data.code==100){
                        console.log('删除成功');
                        //$window.location.reload();
                        $scope.jsh();
                    }
                });
            };
        })
        //资讯模块管理
        .controller('clothesController',function($scope,clothesService){
            //显示所有新闻
            $scope.newsList = [];
            $scope.jsh = function(){
                clothesService.getNews().then(function(response){
                    if(response.status == 200&&response.data.code == 100){
                        $scope.newsList=response.data.data;
                    }
                });
            };
            $scope.jsh();
            //添加
            $scope.dialogState=false;
            $scope.addNews=function(){
                $scope.dialogState=true;
            };
            //编辑
            $scope.dialogState = false;
            //确定添加
            $scope.data={
                titleId:'',
                title:'',
                titleEm:'',
                text:'',
                createTime:''
            };
            //编辑赋值
            $scope.newsEdit=function(item){
                $scope.data.titleId=item.titleId;
                $scope.data.title=item.title;
                $scope.data.titleEm=item.titleEm;
                $scope.data.text=item.text;
                $scope.data.createTime=item.createTime;
                console.log($scope.data);
                $scope.diaState=true;
            };
            //保存编辑
            $scope.onEdit=function(){
                clothesService.getNewsEdit($scope.data).then(function(response){
                    console.log(response);
                    if(response.status==200&&response.data.code==100){
                        console.log('更新成功');
                        //$window.location.reload();
                        $scope.jsh();
                    }
                });
            };
            //确定添加
            $scope.onConfirm=function(){
                console.log($scope.data);
                clothesService.getAddNews($scope.data).then(function(response){
                    console.log(response);
                    if(response.status==200&&response.data.code==100){
                        console.log('添加成功');
                        //$window.location.reload();
                        $scope.jsh();
                    }
                });
            };

            //删除
            $scope.column={
                titleId:'',
                title:'',
                titleEm:'',
                text:''
            };
            $scope.diaDelState=false;
            $scope.newsDelete=function(item){
                console.log(item);
                $scope.column.titleId=item.titleId;
                console.log(item.titleId);
                $scope.diaDelState=true;
            };
            //确定删除
            $scope.onDel=function(){
                clothesService.getDeleteNews($scope.column).then(function(response){
                    console.log(response);
                    if(response.status==200&&response.data.code==100){
                        console.log('删除成功');
                        //$window.location.reload();
                        $scope.jsh();
                    }
                });
            };
            //查看详情，赋值
            $scope.newsDetail=function(item){
                $scope.data.titleId=item.titleId;
                $scope.data.title=item.title;
                $scope.data.titleEm=item.titleEm;
                $scope.data.text=item.text;
                $scope.data.createTime=item.createTime;
                console.log($scope.data);
                $scope.disState=true;
            }
        })
        //服装模块管理
        .controller('messageController',function($scope,clothesService){
            $scope.dataPage = {
                pageSize:12,
                pageIndex:1,
                pages:[]
            };

            $scope.changePage = function(pageIndex){
                $scope.dataPage.pageIndex = pageIndex;
            };

            $scope.mess=[];
            //显示所有服装


            $scope.style = {};
            $scope.category = {};
            //加载风格
            clothesService.getStyle().then(function(response){
                if(response.data.code == 100){
                    $scope.style = response.data.data;
                    $scope.style.unshift({id:0,name:'全部风格'});
                    $scope.styleSelected = $scope.style[0];
                }
            });
            $scope.styleSelected = [];
            $scope.categorySelected = [];
            //加载类别
            clothesService.getCategory().then(function(response){
                if(response.data.code == 100){
                    $scope.category = response.data.data;
                    $scope.category.unshift({id:0,name:'全部类别'});
                    $scope.categorySelected = $scope.category[0];
                }
            });
            //加载全部服装
            $scope.clotheList = [];
            $scope.jsh=function(){
                clothesService.getClothes().then(function(response) {
                    if (response.status == 200 && response.data.code == 100) {
                        $scope.clotheList = response.data.data;
                        var total = Math.ceil($scope.clotheList.length / $scope.dataPage.pageSize);
                        for (var i = 0; i < total; i++) {
                            $scope.dataPage.pages[i] = i + 1;
                        }
                    }
                });
            };
            $scope.jsh();

            //搜索关键字
            $scope.keyword = '';

            //详情按钮
            $scope.saveThisClothe = function(item){
                sessionStorage.setItem('thisClothe',item);
            };

            //编辑按钮
            $scope.getChangeMes = function(item){
                sessionStorage.setItem('changeClothe',item);
            };

            //服装入库
            $scope.addNumber = function(item){
                //入库
                $scope.addNewClothes = {
                    id:'',
                    name:'',
                    oldNumber:0,
                    newNumber:0,
                    header:''
                };
                console.log(item.amount);
                $scope.addNewClothes.name = item.name;
                $scope.addNewClothes.oldNumber = item.amount;
                $scope.addNewClothes.header = item.header;
                $scope.addNewClothes.id = item.id;
            };
            $scope.saveNumber = function(){
                $scope.params = {
                    id:$scope.addNewClothes.id,
                    amount:$scope.addNewClothes.newNumber,
                    header:$scope.addNewClothes.header
                };
                clothesService.clothePutAway($scope.params).then(function(response){
                    console.log(response.data);
                    if(response.data.code == 100){
                        $('#myModal').modal('hide');
                        $scope.alertState=true;
                        $scope.alertMessage='已成功入库';
                        $scope.close = function()
                        {
                            $scope.jsh();
                        }
                    }
                    else
                    {
                        console.log(response.data);
                        $scope.alertState=true;
                        $scope.alertMessage='入库失败';
                    }
                })
            }
        })
        //添加服装
        .controller('addClotheController',function($scope,clothesService,$window,$location){
            $scope.back = function(){
                $window.history.back();
            };
            $scope.clotheSrc='image/uiface2.png';
            $scope.addFileName='点击图片选择文件';
            $scope.clothePrc='image/123.jpg';
            $scope.addClotheName='点击图片选择文件';
            $scope.styleSelected='';
            $scope.categorySelected='';
            $scope.styleList=[];
            $scope.categoryList=[];
            $scope.addClotheMes={name:'',price:'',colour:''};
            //获取下拉框风格
            clothesService.getStyle().then(function (response)
            {
                if(response.data.code ==100)
                {
                    $scope.styleList=response.data.data;
                }
                $scope.styleSelected=$scope.styleList[0].id;
            });
            //获取下拉框类别
            clothesService.getCategory().then(function(response)
            {
                if(response.data.code ==100)
                {
                    $scope.categoryList=response.data.data;
                }
                $scope.categorySelected=$scope.categoryList[0].id;
            });
            var file=document.querySelector('#clotheFile');
            var file1=document.querySelector('#clotheJian');
            $scope.showFile=function()
            {
                file.click();
            };
            $scope.showJian=function()
            {
                file1.click();
            };
            var myFile;
            file.onchange= function ()
            {
                myFile=this.files[0];
                var reader=new FileReader();
                reader.onload= function ()
                {
                    $scope.clotheSrc=this.result;
                    $scope.$apply();
                };
                $scope.addFileName=myFile.name;
                reader.readAsDataURL(myFile);
            };
            var myFile1;
            file1.onchange= function ()
            {
                myFile1=this.files[0];
                var reader1=new FileReader();
                reader1.onload= function ()
                {
                    $scope.clothePrc=this.result;
                    $scope.$apply();
                };
                $scope.addClotheName=myFile1.name;
                reader1.readAsDataURL(myFile1);
            };
            $scope.save= function ()
            {
                if($scope.myForm.$valid)
                {
                //日期控件
                    //var dateString=year+'-'+month+'-'+day;
                    //console.log(dateString);
                    //var date=new Date($scope.addBookMes.date);
                    //var year=date.getFullYear();
                    //var month=date.getMonth()<10?'0'+(date.getMonth()+1):date.getMonth();
                    //var day=date.getDate()<10?'0'+date.getDate():date.getDate();
                    var formData = new FormData();
                    formData.append('name',$scope.addClotheMes.name);
                    formData.append('freestyleId',$scope.styleSelected);
                    formData.append('categoryId',$scope.categorySelected);
                    formData.append('price',$scope.addClotheMes.price);
                    formData.append('colour',$scope.addClotheMes.colour);
                    formData.append('header',myFile.name);
                    formData.append('image',myFile1.name);
                    console.log(myFile1.name);
                    console.log(formData);
                    clothesService.addClothe(formData).then(function(response)
                    {
                        if(response.data.code ==100)
                        {
                            //提示框跳出
                            $scope.alertState=true;
                            $scope.alertMessage='添加成功';

                            $scope.close = function()
                            {
                                $location.path('/message');
                            }
                        }
                        else
                        {
                            console.log(response.data);
                            $scope.alertState=true;
                            $scope.alertMessage='添加失败';
                        }
                    });

                    return false;
                }
                else
                {$scope.myForm.submitted=true;}
            };
        })
        //编辑服装
        .controller('editClotheController',function($scope,clothesService,$window,$location){
            $scope.back = function(){
                $window.history.back();
            };
            $scope.clotheSrc='image/uiface2.png';
            $scope.addFileName='点击图片选择文件';
            $scope.clothePrc='image/123.jpg';
            $scope.addClotheName='点击图片选择文件';
            $scope.styleSelected='';
            $scope.categorySelected='';
            $scope.styleList=[];
            $scope.categoryList=[];
            $scope.addClotheMes={name:'',price:'',colour:''};
            $scope.thisId={id:sessionStorage.getItem('changeClothe')};
            $scope.thisDetail={};
            clothesService.getOnClothe($scope.thisId).then(function(response){
                if(response.data.code == 100){
                    $scope.thisDetail = response.data.data;
                    $scope.clotheSrc = $scope.thisDetail[0][4];
                    $scope.clothePrc = $scope.thisDetail[0][5];
                    $scope.addClotheMes={
                        name:$scope.thisDetail[0][1],
                        price:$scope.thisDetail[0][2],
                        colour:$scope.thisDetail[0][3]
                    };
                    //获取下拉框风格
                    clothesService.getStyle().then(function (response)
                    {
                        if(response.data.code ==100)
                        {
                            $scope.styleList=response.data.data;
                            $scope.styleSelected=$scope.thisDetail[0][6];
                        }
                    });
                    //获取下拉框类别
                    clothesService.getCategory().then(function(response)
                    {
                        if(response.data.code ==100)
                        {
                            $scope.categoryList=response.data.data;
                            $scope.categorySelected=$scope.thisDetail[0][8];
                        }
                    });
                }else{
                    console.log(response.data);
                }
            });

            var file=document.querySelector('#clotheFile');
            var file1=document.querySelector('#clotheJian');
            $scope.showFile=function()
            {
                file.click();
            };
            $scope.showJian=function()
            {
                file1.click();
            };
            var myFile;
            file.onchange= function ()
            {
                myFile=this.files[0];
                var reader=new FileReader();
                reader.onload= function ()
                {
                    $scope.clotheSrc=this.result;
                    $scope.$apply();
                };
                $scope.addFileName=myFile.name;
                reader.readAsDataURL(myFile);
            };
            var myFile1;
            file1.onchange= function ()
            {
                myFile1=this.files[0];
                var reader1=new FileReader();
                reader1.onload= function ()
                {
                    $scope.clothePrc=this.result;
                    $scope.$apply();
                };
                $scope.addClotheName=myFile1.name;
                reader1.readAsDataURL(myFile1);
            };
            $scope.save= function ()
            {
                if($scope.myForm.$valid)
                {
                    //日期控件
                    //var dateString=year+'-'+month+'-'+day;
                    //console.log(dateString);
                    //var date=new Date($scope.addBookMes.date);
                    //var year=date.getFullYear();
                    //var month=date.getMonth()<10?'0'+(date.getMonth()+1):date.getMonth();
                    //var day=date.getDate()<10?'0'+date.getDate():date.getDate();
                    var formData = new FormData();
                    formData.append('id',$scope.thisId.id);
                    formData.append('name',$scope.addClotheMes.name);
                    formData.append('freestyleId',$scope.styleSelected);
                    formData.append('categoryId',$scope.categorySelected);
                    formData.append('price',$scope.addClotheMes.price);
                    formData.append('colour',$scope.addClotheMes.colour);
                    formData.append('header',myFile.name);
                    formData.append('image',myFile1.name);
                    console.log(myFile.name);
                    clothesService.changeClothe(formData).then(function(response)
                    {
                        if(response.data.code ==100)
                        {
                            //提示框跳出
                            $scope.alertState=true;
                            $scope.alertMessage='修改成功';

                            $scope.close = function()
                            {
                                $location.path('/message');
                            }
                        }
                        else
                        {
                            console.log(response.data);
                            $scope.alertState=true;
                            $scope.alertMessage='修改失败';
                        }
                    });

                    return false;
                }
                else
                {$scope.myForm.submitted=true;}
            };
        })
        //查看详情
        .controller('clotheDetailController',function($scope,clothesService,$window){
            $scope.thisId={id:sessionStorage.getItem('thisClothe')};
            $scope.thisDetail = {};
            clothesService.getOnClothe($scope.thisId).then(function(response){

                if(response.data.code = 100){
                    $scope.thisDetail=response.data.data;
                    console.log($scope.thisDetail);
                }
            });
            $scope.back = function(){
                $window.history.back();
            };
        })
        //订单管理
        .controller('orderController',function($scope,order,$window){
            $scope.back = function(){
                $window.history.back();
            };
            $scope.dataPage = {
                pageSize:12,
                pageIndex:1,
                pages:[]
            };
            $scope.changePage = function(pageIndex){
                $scope.dataPage.pageIndex = pageIndex;
            };
            $scope.orderList = [];
            $scope.jsh = function(){
                order.list().then(function(response){
                    if(response.data.code == 100){
                        $scope.orderList = response.data.data;
                        angular.copy($scope.orderList,$scope.peisong);
                        $scope.peisong = $scope.peisong.filter(function(item){
                            return item.state == 1 || item.state == 3;
                        });

                        var total = Math.ceil($scope.peisong.length / $scope.dataPage.pageSize);
                        for(var i = 0 ;i < total ; i++){
                            $scope.dataPage.pages[i] = i + 1;
                        }
                    }
                });
            };
            $scope.jsh();

            $scope.peisong = [];
            $scope.dai = function(){
                angular.copy($scope.orderList,$scope.peisong);
                $scope.peisong = $scope.peisong.filter(function(item){
                    return item.state == 1;
                });
                console.log($scope.peisong);
            };
            $scope.gui = function(){
                angular.copy($scope.orderList,$scope.peisong);
                $scope.peisong = $scope.peisong.filter(function(item){
                    return item.state == 3;
                });
                console.log($scope.peisong);
            };
            //配送
            $scope.peiSong = function(item){
                console.log(item.id);
                order.distribution(item.id).then(function(response){
                  if(response.data.code =  100){
                      console.log('配送成功');
                      $scope.jsh();
                  }
                })
            };
            //归还
            $scope.guiHuan = function(item){
                console.log(item.id);
                order.returnBook(item.id,item.clotheId).then(function(response){
                    if(response.data.code =  100){
                        console.log('收货成功');
                        $scope.jsh();
                    }
                })
            };
        });

})();