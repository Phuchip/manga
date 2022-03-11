$(document).ready(function(){
	$("#search").keyup(function(){ //search
        $.ajax({
        type: "POST",
        url: "Site/load_search",
        data:'keyword='+$(this).val(),
        success: function(data){
            $("#complete-search").show();
            $("#complete-search").html(data);
            $("#search").css("background","#FFF");
        }
        });
    });
    //Login
	$("#login-submit").click(function(){
        var email = $("#email-login").val().trim();
        var password = $("#password-login").val().trim();

        if( email != "" && password != "" ){
            $.ajax({
                url:'Site/check_login',
                type:'post',
                data:{email:email,password:password},
                dataType : "json",
                success:function(response){
                    $('#message').html(response.message);
                    if(response.error){
                        $('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
                    }else{
                        $('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
                        // $('#logForm')[0].reset();
                        setTimeout(function(){
                          window.location.reload();
                        },2000);
                    }
                }
            });
        }
        $(document).on('click', '#clearMsg', function(){
            $('#responseDiv').hide();
        });
    });
    //Register
    $("#register-submit").click(function(){
		var username = $("#username-register").val().trim();
        var email = $("#email-register").val().trim();
        var password = $("#password-register").val().trim();
        var repassword = $("#Re-password-register").val().trim();
        if( username != "" && email != "" && password != "" && repassword != "" ){
            $.ajax({
                url:'Site/register',
                type:'post',
                data:{username:username,email:email,password:password,repassword:repassword},
                dataType : "json",
                success:function(response){
                    $('#message2').html(response.message);
                    if(response.error){
                        $('#responseDiv2').removeClass('alert-success').addClass('alert-danger').show();
                    }else{
                        $('#responseDiv2').removeClass('alert-danger').addClass('alert-success').show();
                        setTimeout(function(){
                          window.location.reload();
                        },2000);
                    }
                }
            });
        }
        $(document).on('click', '#clearMsg', function(){
            $('#responseDiv2').hide();
        });
    });
    $(".btn-register").click(function(){
		$(".register"). css("display", "block");
		$(".login"). css("display", "none");
	});
	$(".btn-go-back").click(function(){
		$(".login"). css("display", "block");
		$(".register"). css("display", "none");
	});
	$('.owl-carousel').owlCarousel({  //slider show
	    loop:true,
	    margin:15,
	    nav:true,
	    navText: ["<div class='nav-button owl-prev'><i class='fa fa-angle-left'></i></div>", "<div class='nav-button owl-next'><i class='fa fa-angle-right'></i></div>"],
	    autoplay : true,
	    autoplayTimeout : 2500,
	    autoplayHoverPause:false,
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:3
	        },
	        1000:{
	            items:5
	        }
	    }
	});
	if($(".btn-top").length > 0){   //go to top
		$(window).scroll(function () {
			var e = $(window).scrollTop();
			if (e > 300) {
				$(".btn-top").show()
			} else {
				$(".btn-top").hide()
			}
		});
		$(".btn-top").click(function () {
			$('body,html').animate({
				scrollTop: 0
			})
		})
	}
	$('.remove-history-btn').click(function(){
		var id = $(this).attr('data-id');
        var parent = $(this).parents('li') ;
        parent.remove();
        var num = $('.list-history-manga li').length;
        if(num == 0){
            $('.list-history-manga').append('<li style="justify-content: center;">Bạn chưa có lịch sử đọc</li>');
            $('.bottom-btn-more').remove();
        }
		$.ajax({
            url:'Site/deleteSidebar',
            type:'post',
            data:{id:id},
            success:function(data){
                
            }
        });
	});
	$(document).click(function (e) 	//click ẩn 
	{
	    var search = $("#complete-search");
	    if (!search.is(e.target) && search.has(e.target).length === 0)
	    {
	        search.hide();
	    }
	});
});
function TopName(evt, Name) {
	var i, x, tablinks;
	x = document.getElementsByClassName("Top");
	for (i = 0; i < x.length; i++) {
	    x[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablink");
	for (i = 0; i < x.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	document.getElementById(Name).style.display = "block";
	evt.currentTarget.className += " active";
}
