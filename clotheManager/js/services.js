(function(){
    angular.module('app.services',[])
        .constant('ROOT_URL','http://192.168.12.116:8066/home/ajax/')
        .service('clothesService',function($http,ROOT_URL) {
            //风格
            this.getStyle = function () {
                return $http.get(ROOT_URL + 'style.php');
            };
            //类别
            this.getCategory = function () {
                return $http.get(ROOT_URL + 'category.php');
            };
            //资讯
            this.getNews = function () {
                return $http.get(ROOT_URL + 'news.php');
            };
            //服装
            this.getClothes = function () {
                return $http.get(ROOT_URL + 'clothe.php');
            };
            //添加风格
            this.getAddStyle=function(data){
                return $http({
                    method:'post',
                    url:ROOT_URL+'addStyle.php',
                    data:data,
                    headers: {
                        'Content-Type':undefined
                    },
                    transformRequest:function(data){
                        var formData=new FormData();
                        for(var key in data){
                            formData.append(key,data[key]);
                        }
                        return formData;
                    }

                });
            };
            //风格编辑
            this.getStyleEdit=function(data){
                return $http({
                    method:'post',
                    url:ROOT_URL+'editStyle.php',
                    data:data,
                    headers: {
                        'Content-Type':undefined
                    },
                    transformRequest:function(data){
                        var formData=new FormData();
                        for(var key in data){
                            formData.append(key,data[key]);
                        }
                        return formData;
                    }
                });
            };
            //添加类别
            this.getAddCategory=function(data){
                return $http({
                    method:'post',
                    url:ROOT_URL+'addCategory.php',
                    data:data,
                    headers: {
                        'Content-Type':undefined
                    },
                    transformRequest:function(data){
                        var formData=new FormData();
                        for(var key in data){
                            formData.append(key,data[key]);
                        }
                        return formData;
                    }

                });
            };
            //类别编辑
            this.getCategoryEdit=function(data){
                return $http({
                    method:'post',
                    url:ROOT_URL+'editCategory.php',
                    data:data,
                    headers: {
                        'Content-Type':undefined
                    },
                    transformRequest:function(data){
                        var formData=new FormData();
                        for(var key in data){
                            formData.append(key,data[key]);
                        }
                        return formData;
                    }
                });
            };
            //添加新闻
            this.getAddNews=function(data){
                return $http({
                    method:'post',
                    url:ROOT_URL+'addNews.php',
                    data:data,
                    headers: {
                        'Content-Type':undefined
                    },
                    transformRequest:function(data){
                        var formData=new FormData();
                        for(var key in data){
                            formData.append(key,data[key]);
                        }
                        return formData;
                    }

                });
            };
            //新闻编辑
            this.getNewsEdit=function(data){
                return $http({
                    method:'post',
                    url:ROOT_URL+'editNews.php',
                    data:data,
                    headers: {
                        'Content-Type':undefined
                    },
                    transformRequest:function(data){
                        var formData=new FormData();
                        for(var key in data){
                            formData.append(key,data[key]);
                        }
                        return formData;
                    }
                });
            };
            //删除新闻
            this.getDeleteNews=function(data){
                return $http({
                    method:'post',
                    url:ROOT_URL+'newsDelete.php',
                    data:data,
                    headers: {
                        'Content-Type':undefined
                    },
                    transformRequest:function(data){
                        var formData=new FormData();
                        for(var key in data){
                            formData.append(key,data[key]);
                        }
                        return formData;
                    }
                });
            };
            //删除风格
            this.getDeleteStyle=function(data){
                return $http({
                    method:'post',
                    url:ROOT_URL+'styleDelete.php',
                    data:data,
                    headers: {
                        'Content-Type':undefined
                    },
                    transformRequest:function(data){
                        var formData=new FormData();
                        for(var key in data){
                            formData.append(key,data[key]);
                        }
                        return formData;
                    }
                });
            };
            //删除类别
            this.getDeleteCategory=function(data){
                return $http({
                    method:'post',
                    url:ROOT_URL+'categoryDelete.php',
                    data:data,
                    headers: {
                        'Content-Type':undefined
                    },
                    transformRequest:function(data){
                        var formData=new FormData();
                        for(var key in data){
                            formData.append(key,data[key]);
                        }
                        return formData;
                    }
                });
            };
            //入库
            this.clothePutAway= function (data){
                return $http({
                    method:'post',
                    url:ROOT_URL+'putaway.php',
                    data:data,
                    headers: {
                        'Content-Type':undefined
                    },
                    transformRequest:function(data){
                        var formData=new FormData();
                        for(var key in data){
                            formData.append(key,data[key]);
                        }
                        return formData;
                    }
                });
            };
            //服装详情
            this.getOnClothe= function (id){
                return $http({method:'get',url:ROOT_URL+'oneClothe.php',params:id});
            };
            //添加服装
            this.addClothe= function (data){
                return $http({
                    method:'post',
                    url:ROOT_URL+'addClothe.php',
                    data:data,
                    headers: {
                        'Content-Type':undefined
                    },
                    transformRequest:angular.identity
                })
            };
            //更新服装
            this.changeClothe= function (formData){
                return $http({
                    method:'post',
                    url:ROOT_URL+'editClothe.php',
                    data:formData,
                    headers: {
                        'Content-Type':undefined
                    },
                    transformRequest: angular.identity
                })
            };
        })
        .service('order',function($http,ROOT_URL){
            //获取所有订单
            this.list = function(){
                return $http.get(ROOT_URL + 'shelves.php');
            };
            //配送
            this.distribution = function(id){
                return $http.get(ROOT_URL + 'peiSong.php',{params:{id:id}});
            };
            //收货
            this.returnBook = function(id,clotheId){
                return $http.get(ROOT_URL + 'shouHuo.php',{params:{id:id,clotheId:clotheId}});
            };
        })

})();
