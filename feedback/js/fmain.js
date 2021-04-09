var ratedIndex = -1;

function resetColors(){
	$(".rps i").css("color","#e2e2e2");
}

function setStars(max){
	for(var i = 0; i<= max; i++){
		$(".rps i:eq(" +i+ ")").css("color", "#f7bf17");
	}
}

 

 $(document).ready(function() {

	$(".rpc i, .review-bg").click(function(){
		$(".review-model").fadeOut();
	})
	$(".opmd").click(function(){
		$(".review-model").fadeIn();

})

	resetColors();


	$(".rps i").mouseover(function(){
		resetColors();
		var currentIndex = parseInt($(this).data("index"));
		setStars(currentIndex);
	})

	$(".rps i").on("click",function(){
		ratedIndex = parseInt($(this).data("index"));
		localStorage.setItem("rating",ratedIndex);
		$(".starRateV").val(parseInt(localStorage.getItem("rating")));
	})

	$(".rps i").mouseleave(function(){
		resetColors();
		if(ratedIndex != -1){
			setStars(ratedIndex);
		}
	})
	if(localStorage.getItem("rating")!=null){
		setStars(parseInt(localStorage.getItem("rating")));
		$(".starRateV").val(parseInt(localStorage.getItem("rating")));
	}
	$(".rpbtn").click(function(){
		if($("#rate-field").val() == ''){
			$(".rate-error").html("please fill in the text box!");
		}else if($(".raterName").val() == ''){
			$(".rate-error").html("please enter your name!");
		}else if(localStorage.getItem("rating") == null){
			$(".rate-error").html("please enter your name!");
		}else{
			$(".rate-error").html("");
			var $form = $(this).closest(".rmp");
			var starRate=$form.find(".starRateV").val();
			var rateMsg=$form.find(".rateMsg").val();
			var date=$form.find(".rateDate").val();
			var name=$form.find(".raterName").val();
			 
			 $.ajax({
			 	url:"rate.php",
			 	type: "POST",
			 	data: {
			 		starRate: starRate,
			 		rateMsg: rateMsg,
			 		date: date,
			 		name: name
			 	},
			 	success: function(date){
			 		 window.location.reload();
			 	}
			 })
		}
	})

})


 