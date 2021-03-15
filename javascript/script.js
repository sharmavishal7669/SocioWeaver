$(document).ready(function(){
    
    $(".b1").click(function(){
        onSignUp();
    });

    $(".b2").click(function(){  
        onSignIn();  
    });

});

function onSignUp()
{
    $(".b1").addClass("active");
    $(".b2").removeClass("active");
    $(".signin-container").slideUp();
    $(".signup-container").slideDown()
}

function onSignIn()
{
    $(".b2").addClass("active");
    $(".b1").removeClass("active");
    $(".signup-container").slideUp();
    $(".signin-container").slideDown();
}