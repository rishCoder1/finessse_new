
$(document).ready(function(){

 if ( $(window).width() < 768) {    
      $(".get-down").click(function(){
 $(".request-quote").slideToggle();
   }); 

 }
else{
   $(".quote").hide();
} 

//get free quote close
$('.close-button').click(function(){
$('.request-quote').addClass('hideRequest');
})	



//==========

$('.applynow').click(function(){
	
	var jobtitle=$(this).attr("data-job");
	
	$(".job_for_fispl").val(jobtitle);
	
});

	
//======= Phone Number validation


 $(".pnpcontact").keypress(function (e) {
	 
	 console.log(e.which);
	 
	 if(e.which ==43 || e.which ==45){
		 return true;
	 }

                // console.log(e.which);

                //if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {

                                                if(e.which >58 || (e.which>30 && e.which<48)){

 

               return false;

              }

   });
	


//end of get free quote

    
// 	======Menu====

 //alert(heighst)
$('.Icon').click(function(){
$(this).toggleClass('open')
$('.nav').slideToggle();
});

 //=====end menu===
 $('li.overlay').hover(function(){
 $('.bodyOverlay').toggleClass('opa');
  // $('.top-border').toggle();
 });
$('li.overlay ul').hover(function(){
 $('.bodyOverlay').addClass('opa');
 });



 // Active class
activeNav = window.location.href;
    if (activeNav == '') {
        activeNav = 'home.html'
    }
    $('nav ul li').each(function() {
        if ($(this).find('a').attr('href') == activeNav) {
            $(this).find('a').addClass('active')
        }
    })
 // end Active class

 //more text

 
 $('.expandText').click(function(){
    $('.expandContent').slideDown();
    $(this).hide('slow');
});
 $('.minusText').click(function(){
    $('.expandContent').slideUp();
    $('.expandText').show('slow')
});


 $('.addText').click(function(){
    $('.expandContentView').slideDown();
    $(this).hide('slow');
});
 $('.lessText').click(function(){
    $('.expandContentView').slideUp();
    $('.addText').show('slow')
});


 //mobile hide content
 $('.expandTextMobile').click(function(){
    $('.expandContentMobile').slideDown('slow');
    $(this).hide()
});
$('.minusTextMobile').click(function(){
    $('.expandContentMobile').slideUp('slow');
    $('.expandTextMobile').show('slow')
});

 //banner hide content
 $('.expandTextBanner').click(function(){
    $('.expandContentBanner').slideDown('slow');
    $(this).hide()
});
$('.minusTextBanner').click(function(){
    $('.expandContentBanner').slideUp('slow');
    $('.expandTextBanner').show('slow')
});



$('.plus').click(function(){

$(this).next('.content').slideToggle('slow');
$(this).toggleClass('minus');
});


 $(".down-arrow").click(function() {
$('html,body').animate({
        scrollTop: $(".heading").offset().top-80},
        2000);
});

	
	



///======== carreer 

 $('input[type="file"]').change(function () {
          if ($(this).val() != "") {
                 $(this).css('color', '#333');
          }else{
                 $(this).css('color', 'transparent');
          }
     });



});


	

 $(window).scroll(function()	{
	
var heighst=$(window).scrollTop();

if(heighst >63){
	$("#free-quote").fadeIn();
}else{
		$("#free-quote").fadeOut();
}


});
	


window.onload = function() {            
    function change_image() {
$('.behind').fadeToggle(1000);
    }

        function change_image_late() {
$('.behind-late').fadeToggle(2000);
    }
    setInterval(change_image_late, 3000);
        setInterval(change_image, 2000);

       $("#preloader").fadeOut("slow", function() {
            $(this).remove();
        })

}




function refreshsendQuery()
{

	var number1 = 1;

	var number2 = 9;

	var randomnum = (parseInt(number2) - parseInt(number1)) + 1;

	var rand1 = Math.floor(Math.random()*randomnum)+parseInt(number1);

	var rand2 = Math.floor(Math.random()*randomnum)+parseInt(number1);
	
	var cap = rand1+"+"+rand2;
	var result = rand1 + rand2;

	$(".captcha-numerical").html(cap);
	$("#cap-final").val(result);

   return false;
}


function map(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it




