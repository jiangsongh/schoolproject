$(function(e){
    var mess=JSON.parse(sessionStorage.getItem('login'));
    $('#userSpan').text(mess.nick);
    $('#logout').bind('click',function(e){
        location.href = 'login.html';
        sessionStorage.clear();
    });

});