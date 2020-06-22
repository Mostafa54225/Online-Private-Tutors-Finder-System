$(function(){

	$(".adminHeader").slideDown(500, function(){
		$(".title-underline").show(150,function(){
			$(this).animate(
			  	{left:'42%'},
			 	300,
			 	function(){
			 		$("#form_box").fadeIn();
			 		$(".hideTitle").fadeIn();
			 	},
			)
		});
	})
	  

	var form = $(".form-control");

	form.on("focus", function(){
		$(this).addClass("focus");
	});

	form.on("blur", function(){
		if($(this).val() == "")
			$(this).removeClass("focus");
	});

	console.log('s');
});