/**
 * Created by Administrator on 2018/1/17.
 */
(function(){
    angular.module('app.filters',[])
        .filter('searchFilter',function(){
            return function(list,style,category,keyword,size , index){
                var temp = Array.from(list);
                if(style.id != 0){
                    temp = temp.filter(function(item){
                        return item.freestyleId == style.id;
                    })
                }
                if(category.id != 0){
                    temp = temp.filter(function(item){
                        return item.categoryId == category.id;
                    })
                }
                if(keyword.length > 0){
                    temp = temp.filter(function(item){
                        return item.name.toLowerCase().indexOf(keyword.trim().toLowerCase()) >= 0  ;
                    })
                }
                var startIndex = (index - 1) * size;
                var endIndex = index * size;
                return temp.slice(startIndex , endIndex);
            }
        })
        .filter('orderFilter',function(){

            return function(order,keyword,size , index){
                var temp = Array.from(order);
                if(keyword){
                    temp = temp.filter(function(item){
                        return item.shelvesId == keyword;
                    })
                }
                var startIndex = (index - 1) * size;
                var endIndex = index * size;
                return temp.slice(startIndex , endIndex);
            }

        })
        ;
})();