<section class="top-border contact mt-0 mb-4 animatedParent animateOnce">
<aside  class="container-fluid pt-sm-4 pt-4">
<h1 class="heading pb-3"><span class="back-light">we are always here to <span class="blueColor">help you</span></span></h1>
<div class="row pt-2 pb-md-4 text-sm-left d-flex animated fadeInLeft">
	<div class="col-sm-6 col-md-6 pad-9 text-md-left">
		<h2 class="blueColor font-weight-bold">Our Locations</h2>
		<div class="delhi-location position-relative pt-md-4">
			<div class="contact pad-9 contact-top">
			<h3 class="font24 font700">Delhi</h3>
			<p class="font700 mb-0">Finessse Interactive Solutions Pvt. Ltd.</p>
			<p class="mb-0"><?php /*?>c/o COWORKIN<br><?php */?>B1/639 A, Janakpuri, West Delhi, Delhi 110058</p>
		</div>
		</div>
		<div class="row pad-9 pt-sm-2">
		<div class="col-md-6">
		<h3 class="font20 font700">Call</h3>
		<p class="font700 mb-0">Deepak Thakkar</p>
		<a href="tel:9810619956" >+91- 9810619956</a><br class="hide">
		
	
		</div>
		<div class="col-md-6">
		<h3 class="font20 font700">Email Us</h3>
		<a href="mailto:deepak@finessse.digital">deepak@finessse.digital</a><br>
		<a href="mailto:info@finessse.digital">info@finessse.digital</a>
		 <p class="p-2">
		 	<button class="tablinks btn-none active" onClick="map(event, 'delhi')" id="defaultOpen">
		 	Directions</button></p>
			
		</div>
		</div>
		
	</div>

	
	<div class="col-sm-6 col-md-6 tabcontent iframe-h animated fadeInRight" id="delhi" >
	<div class="embed-responsive embed-responsive-1by1">
		<iframe  class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.933853102129!2d77.081671!3d28.629329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d04bf73088da9%3A0x2ec5af824219f05e!2sFINESSE+INTERACTIVE+SOLUTION+PVT.+LTD!5e1!3m2!1sen!2s!4v1436177085200" frameborder="0" style="border:0" allowfullscreen></iframe>

    </iframe>
	</div>

	</div>
	
	<div class="col-md-6 col-sm-6 tabcontent iframe-h" id="banglore" >
	<div class="embed-responsive embed-responsive-1by1">
		 <iframe  class="embed-responsive-item" frameborder="0" scrolling="no" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=finesse+interactive+solution+bangalore&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=38.502405,56.513672&amp;ie=UTF8&amp;hq=finesse+interactive+solution&amp;hnear=Bangalore,+Bangalore+Urban,+Karnataka,+India&amp;ll=12.953834,77.623207&amp;spn=0.09267,0.110378&amp;t=m&amp;z=13&amp;iwloc=A&amp;cid=1533220661457685978&amp;output=embed">
    </iframe>

	</div>
	</div>
</div>
</aside>
</section>

<a name="query" class="pt-5 mt-5"></a>
<?php $this->load->view("query.php") ?>	
<script src="https://www.finessse.digital/public/js/jquery-1.12.4.min.js"></script>
<script>
setTimeout(_ =>document.getElementById("defaultOpen").click(),2000);
</script>