$(document).ready(function(){if($(window).width()<768){$(".get-down").click(function(){$(".request-quote").slideToggle()})}

else{$(".quote").hide()}

$('.close-button').click(function(){$('.request-quote').addClass('hideRequest')})

$('.applynow').click(function(){var jobtitle=$(this).attr("data-job");$(".job_for_fispl").val(jobtitle)});$(".pnpcontact").keypress(function(e){console.log(e.which);if(e.which==43||e.which==45){return!0}

if(e.which>58||(e.which>30&&e.which<48)){return!1}});$('.Icon').click(function(){$(this).toggleClass('open')

$('.nav').slideToggle()});$('li.overlay').hover(function(){$('.bodyOverlay').toggleClass('opa')});$('li.overlay ul').hover(function(){$('.bodyOverlay').addClass('opa')});activeNav=window.location.href;if(activeNav==''){activeNav='home.html'}

$('nav ul li').each(function(){if($(this).find('a').attr('href')==activeNav){$(this).find('a').addClass('active')}})

$('.expandText').click(function(){$('.expandContent').slideDown();$(this).hide('slow')});$('.minusText').click(function(){$('.expandContent').slideUp();$('.expandText').show('slow')});$('.addText').click(function(){$('.expandContentView').slideDown();$(this).hide('slow')});$('.lessText').click(function(){$('.expandContentView').slideUp();$('.addText').show('slow')});$('.expandTextMobile').click(function(){$('.expandContentMobile').slideDown('slow');$(this).hide()});$('.minusTextMobile').click(function(){$('.expandContentMobile').slideUp('slow');$('.expandTextMobile').show('slow')});$('.expandTextBanner').click(function(){$('.expandContentBanner').slideDown('slow');$(this).hide()});$('.minusTextBanner').click(function(){$('.expandContentBanner').slideUp('slow');$('.expandTextBanner').show('slow')});$('.plus').click(function(){$(this).next('.content').slideToggle('slow');$(this).toggleClass('minus')});$(".down-arrow").click(function(){$('html,body').animate({scrollTop:$(".heading").offset().top-80},2000)});$('input[type="file"]').change(function(){if($(this).val()!=""){$(this).css('color','#333')}else{$(this).css('color','transparent')}})});$(window).scroll(function(){var heighst=$(window).scrollTop();if(heighst>63){$("#free-quote").fadeIn()}else{$("#free-quote").fadeOut()}});window.onload=function(){function change_image(){$('.behind').fadeToggle(1000)}

function change_image_late(){$('.behind-late').fadeToggle(2000)}

setInterval(change_image_late,3000);setInterval(change_image,2000);

function change_pic(){
setTimeout(function() {
$('.pic-1').fadeToggle();
}, 0 );
setTimeout(function() {
$('.pic-2').fadeToggle();
},2000);}
setInterval(change_pic,4000);

$("#preloader").fadeOut("slow",function(){$(this).remove()})}



function refreshsendQuery()

{var number1=1;var number2=9;var randomnum=(parseInt(number2)-parseInt(number1))+1;var rand1=Math.floor(Math.random()*randomnum)+parseInt(number1);var rand2=Math.floor(Math.random()*randomnum)+parseInt(number1);var cap=rand1+"+"+rand2;var result=rand1+rand2;$(".captcha-numerical").html(cap);$("#cap-final").val(result);return!1}

function map(evt,cityName){var i,tabcontent,tablinks;tabcontent=document.getElementsByClassName("tabcontent");for(i=0;i<tabcontent.length;i++){tabcontent[i].style.display="none"}

tablinks=document.getElementsByClassName("tablinks");for(i=0;i<tablinks.length;i++){tablinks[i].className=tablinks[i].className.replace(" active","")}

document.getElementById(cityName).style.display="block";evt.currentTarget.className+=" active"}

// Rishabh
