
var app = angular.module('app', ['ui.router','app.controllers','app.directives','app.filters']);

app.config(function($stateProvider,$urlRouterProvider,$locationProvider) {
    $urlRouterProvider.otherwise('/home');
    $locationProvider.hashPrefix('');
    $stateProvider
        //控制面板
        .state({
            name: 'home',
            url: '/home',
            templateUrl: 'views/home.html',
            controller:'homeController'
        })
        //风格
        .state({
            name: 'style',
            url: '/style',
            templateUrl: 'views/style.html',
            controller:'styleController'
        })
        .state({
            name: 'column',
            url: '/column',
            templateUrl: 'views/column.html',
            controller:'columnController'
        })
        .state({
            name: 'columnDetail',
            url: '/columnDetail/:section',
            templateUrl: 'views/columnDetail.html',
            controller:'columnDetailController'
        })
        //类别
        .state({
            name: 'category',
            url: '/category',
            templateUrl: 'views/category.html',
            controller:'categoryController'
        })
        .state({
            name:'categoryList',
            url:'/categoryList',
            templateUrl:'views/categoryList.html',
            controller:'categoryListController'
        })
        //资讯
        .state({
            name: 'clothes',
            url: '/clothes',
            templateUrl: 'views/clothes.html',
            controller:'clothesController'
        })
        //服装
        .state({
            name: 'message',
            url: '/message',
            templateUrl: 'views/message.html',
            controller:'messageController'
        })
        //服装详情
        .state({
            name: 'clotheDetail',
            url: '/clotheDetail',
            templateUrl: 'views/clotheDetail.html',
            controller:'clotheDetailController'
        })
        //添加服装
        .state({
            name: 'addClothe',
            url: '/addClothe',
            templateUrl: 'views/addClothe.html',
            controller:'addClotheController'
        })
        //编辑服装
        .state({
            name: 'editClothe',
            url: '/editClothe',
            templateUrl: 'views/editClothe.html',
            controller:'editClotheController'
        })
        //订单
        .state({
            name: 'order',
            url: '/order',
            templateUrl: 'views/order.html',
            controller:'orderController'
        })
        ;
});