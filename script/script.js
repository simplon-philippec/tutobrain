$(document).ready(function(){
    $(".video").hide();
    $(".miniature").click(function(){
        $(".miniature").hide();
    });
    $(".miniature").click(function(){
        $(".video").fadeIn(1300);
    });

});
