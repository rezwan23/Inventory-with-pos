$(document).ready(function(){
    $('ul.list').find('li.active').removeClass('active');
    let http = $(location).attr('href');
    var listItems = $('ul.list li');
    listItems.each(function(){
        let  a = $(this).children('a');
        if(a.attr('href') == http){
            a.addClass('toggled');
            a.parent('li').addClass('active');
            a.parent('li').parent('ul.ml-menu').css('display', 'block');
            a.parent('li').parent('ul.ml-menu').parent('li').addClass('active');
        }
    });
});