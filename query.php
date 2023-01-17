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
<section class="query pb-sm-5 pb-1 pt-sm-5 pt-3" >
<h1 class="heading whiteText pt-2 pt-sm-5"><span class="back-dark">Tell Us about your project</span></h1>
<h3 class="font24 whiteText text-center hide pt-2">Fill the Quick Form Now! Guaranteed Response within 1 Business Day.  
</h3>
<div class="quote1 container pb-sm-5 pb-3">
<ul class="mx-auto">
<form id="query" method="post" action="<?php echo $this->config->base_url();?>contactform">
<li><input type="text" name="name" required="required"  placeholder="Name*" ></li>
<li><input type="text" name="company" required="required"  placeholder="Company"></li>
<li>
<input type="email" name="email" required="required"  placeholder="Email ID*">
<div style="width: 100%; font-size: 12px; position: absolute; bottom: -25px; color: #ffb9b9; white-space: nowrap;"><?php echo $this->session->flashdata('email');?></div>
</li>
<li>
<input type="number" name="contactno" required="required" maxlength="15" class="pnpcontact" placeholder="Contact No.*">
<div style="width: 100%; font-size: 12px; position: absolute; bottom: -25px; color: #ffb9b9; white-space: nowrap;"><?php echo $this->session->flashdata('phone');?></div>
</li>

<li>
	<select placeholder="Service" class="w-100 servf" name="service">
	<option>Services</option>
	<option>Digital Marketing</option>
	<option>Social Media Marketing</option>
	<option>SEO</option>
	<option>Online Reputation Management</option>
	<option>Web/Mobile Design</option>
	<option>PPC</option>
	<option>Email Marketing</option>
	<option>Web Development</option>
	<option>Web Application Development</option>
	<option>Mobile App Development</option>
	<option>Ecommerce Development</option>
	<option>Domain & Hosting</option>
	<option>Multimedia Solutions</option>
	<option>Copywriting</option>
	<option value="other">Other Service</option>
	</select>	

</li>


<li style="border: none;">
	<div class="g-recaptcha" data-sitekey="6LfXZNMUAAAAAGI7aZXxEmeewXsbheebLdjnP9-A"></div>
<div style="color:#ff0000;padding: 5px 5px;"><?php echo $this->session->flashdata('captchamsg');?></div>

 </li>


<p class="whiteText pl-sm-5 pt-sm-4 font12">* Fields are mandatory</p>
</ul>

<input type="hidden" name="rurl" value="<?php echo current_url();?>" /> 

      

<div class="clearfix"></div>
<span class="d-block text-center mt-5"><button class="btn btn1" type="submit">Submit
 </button></span>

</form>

<script>
</script>
</div>
</section>
