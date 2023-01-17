<!--- Query Sesction -->
<?php
$arr=range(9,0); 
$brr=range(9,0);
$randa=array_rand($arr); 
$randb=array_rand($brr); 
$a=$arr[$randa];
$b=$brr[$randb];
$r=$a+$b;
$cap=$a."+".$b;
?>

<?php if($this->queryshow==true): ?>
<section class="request container-fluid mt-5 top-border1" id="free-quote">
	<div class="row align-items-center">
		<div class="col-md-2 font20 whiteText blue-bg text-center side-t get-down">
GET A FREE QUOTE</div>
<div class="quote col-md-10 gray-bg">
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<ul class="mb-0 pt-sm-4 pb-sm-4 pb-3">
	<li><img src="<?php echo public_images;?>/DigitalMarketing/name-icon.png">
	<input type="text" placeholder="Name" name="name" required /></li>
	<li><img src="<?php echo public_images;?>/DigitalMarketing/contact-icon.png">
	<input type="text" placeholder="Contact No." maxlength="15" class="pnpcontact" required name="contactno" /></li>
	<li><img src="<?php echo public_images;?>/DigitalMarketing/email-icon.png">
	<input type="email" placeholder="Email" required name="email" /></li>
	<li><img src="<?php echo public_images;?>/DigitalMarketing/message-icon.png">
	<input type="text" placeholder="Message" required name="message" /></li>
	<li class="border-bottom-0"><span class="blueColor font500 pr-2 captcha-numerical"><?php echo $cap;?></span>
	<input type="text" placeholder="Captcha" name="captcha" class="border-bottom" required /></li>
	<a onclick='refreshsendQuery()'><img src="<?php echo public_images;?>/refresh-small-form.png"></a>
	<input type="hidden" name="rurl" value="<?php echo current_url();?>" /> 
	<input type="hidden" name="cresult" id ="cap-final" value="<?php echo $r; ?>" />
	<span class="text-center">
	<button type="submit" class="btn btn2 ml-sm-4 mt-sm-0 mt-3">SEND</button>
	</span>
	
</ul>
</form>   
<div class="clearfix"></div>
<span class="close-button">&times;</span>
</div>	
</div>	
</section>	


<?php endif;?>



<footer class="pb-3 pt-4 animatedParent top-border-mobile ">
	<div class="animated bounceInRight slow">
<h1 class="heading pb-sm-3"><span class="back-light">stay connected</span></h1>
<ul class="social text-center pt-sm-3 pt-1 mx-auto">
<li> <a href="https://www.facebook.com/FinessseInteractiveSolution" target="_blank"><i class="fab fa-facebook-f fa-2x"></i> <span>Like Us</span></a></li>
<li class="border-left-0"> <a href="https://twitter.com/finessseim" target="_blank"><i class="fab fa-twitter fa-2x"></i> <span>Follow Us</span></a></li>
<li class="border-left-0"> <a href="https://www.linkedin.com/company/1568398/" target="_blank"><i class="fab fa-linkedin-in fa-2x"></i> <span>Join Us</span></a></li>
<li class="border-left-0"> <a href="https://www.instagram.com/finessseinteractive/" target="_blank"><i class="fab fa-instagram fa-2x "></i> <span>Follow Us</span></a></li>
</ul>
<div class="clearfix"></div>

<article class="pb-sm-5">
<div class="container">
<div class="row pt-sm-5 pt-2 pb-sm-5">
<div class="col-md-6 col-sm-6">
<div class="footer-div foot-pad">
<p class="font700 mb-0 blueColor pad-5 pt-3">Finessse Interactive Solutions Pvt. Ltd.</p>
<p class="pad-5">608, 6th Floor, Vishwasadan Bldg, District Centre, <br class="hide-tab">Janak Puri, New Delhi - 110058 (INDIA)</p>
</div>
</div>
<div class="col-md-6 col-sm-6 pt-3 text-sm-right text-center">
<p class="mb-0"><span class="blueColor">Send Mail: </span><a href="mailto:deepak@finessse.digital">deepak@finessse.digital</a> <span class="hide">| </span>
<a href="mailto:info@finessse.digital">info@finessse.digital</a></p>
<p><span class="blueColor">Call Us: </span><a href="tel:9810619956">+91- 9810619956, </a>
	<a href="tel:01145588792">+91-11-45588792</a></p>
	<p>&copy; 2018 Finessse Interactive | <a href="<?php echo $this->config->base_url();?>disclaimer">Disclaimer</a> | <a href="<?php echo $this->config->base_url();?>sitemap">Sitemap</a></p>
</div>

</div>	
</div>
	<p class="text-center d-block pb-sm-3" style="text-align:center;"><span id="siteseal">
<script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=fJCVYvPyOyDtu2iZsy6JHIq4SSvsYckQ63rPD3GgU3cTgqwyuOYSFAXdWnAi">
</script></span></p>	
</div>

</article>
</footer>

<?php foreach(@$js as $js_name): 
           echo $js_name;
endforeach; ?>

<!-- Begin Inspectlet JS Code -->

<script type="text/javascript" id="inspectletjs">

(function() {

var insp_ab_loader = true; // set this boolean to false to disable the A/B testing loader

window.__insp = window.__insp || [];

__insp.push(['wid', 1988982905]);

var ldinsp = function(){

if(typeof window.__inspld != "undefined") return; window.__inspld = 1; var insp = document.createElement('script'); insp.type = 'text/javascript'; insp.async = true; insp.id = "inspsync"; insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js?wid=1988982905&r=' + Math.floor(new Date().getTime()/3600000); var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(insp, x);if(typeof insp_ab_loader != "undefined" && insp_ab_loader){ var adlt = function(){ var e = document.getElementById('insp_abl'); if(e){ e.parentNode.removeChild(e); __insp.push(['ab_timeout']); }}; var adlc = "body{ visibility: hidden !important; }"; var adln = typeof insp_ab_loader_t != "undefined" ? insp_ab_loader_t : 1200; insp.onerror = adlt; var abti = setTimeout(adlt, adln); window.__insp_abt = abti; var abl = document.createElement('style'); abl.id = "insp_abl"; abl.type = "text/css"; if(abl.styleSheet) abl.styleSheet.cssText = adlc; else abl.appendChild(document.createTextNode(adlc)); document.head.appendChild(abl); } };

setTimeout(ldinsp, 0);

})();

</script>

<!-- End Inspectlet JS Code -->
</body>
</html>

