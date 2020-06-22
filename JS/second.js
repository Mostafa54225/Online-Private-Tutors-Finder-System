$(function(){
	$(".centerHidden").fadeIn(2000);
	$("a").fadeIn(2000);

	$(".navbar-brand").animate({
        left: '0'
    }, "slow");
    
    $(".navbar-brand").animate({
        height: 'toggle'
    }, "slow", function() {
        $(".navbar-brand").animate({
            height: 'toggle'
        }, "slow");
    });
});