<!DOCTYPE HTML>
<html lang="en">
<head>
	
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119519475-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-119519475-1');
  gtag('config', 'AW-1018851782');
</script>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo public_images;?>Fav-Icon.ico">
<title><?php echo $title;?></title>
<meta name="description" content="<?php echo $description;?>">
<meta name="keywords" content="<?php echo $keyword;?>"/>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php foreach(@$css as $css_name): 
    echo $css_name;
 endforeach; ?>


</head>

<!--start schema-->
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "name" : "Finessse Interactive",
  "url" : "https://www.finessse.digital",
  "email": "mailto:info@finessse.digital",
  "telephone": "+91-11-45588792",
  "logo": "https://www.finessse.digital/public/images/finessse-svg.svg",
  "sameAs" : [ "https://www.facebook.com/FinessseInteractiveSolution",
               "https://twitter.com/finessseim",
		"https://www.linkedin.com/company/finesse-interactive/",
		"https://www.instagram.com/finessseinteractive/" ]

}

</script> 

<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Janakpuri",
    "addressRegion": "New Delhi",
    "postalCode": "110058",
    "streetAddress": "608, 6th Floor,Vishwasadan Building, District Center, Janak Puri"
  },
  "telephone": "+91-11-45588792"
  }
</script>

<!-- end schema-->
<body>

<div class="loading"></div>

<script>

!function(f,b,e,v,n,t,s)

{if(f.fbq)return;n=f.fbq=function(){n.callMethod?

n.callMethod.apply(n,arguments):n.queue.push(arguments)};

if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';

n.queue=[];t=b.createElement(e);t.async=!0;

t.src=v;s=b.getElementsByTagName(e)[0];

s.parentNode.insertBefore(t,s)}(window,document,'script',

'https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '415123128648016');

fbq('track', 'PageView');

</script>

<noscript>

<img height="1" width="1"

src="https://www.facebook.com/tr?id=415123128648016&ev=PageView

&noscript=1"/>

</noscript>

<!-- End Facebook Pixel Code -->
	<div id="preloader" ></div>
	<div class="bodyOverlay"></div> 
	
    <div class="height-top">
<header class="pb-3 fixed-header white-bg">
<div class="top-border1 top-icon pb-1 mb-3 gray-bg">
<div class="container">
<div class="row justify-content-end">
<div class="col-sm-4 text-left">

</div>
<div class="col-md-8 col-sm-12 text-md-right text-sm-center text-right header-top">
<span class="pr-1">
<span>
	<img src="<?php echo public_images;?>wats-app-icon.png" alt="what-aap" class="pl-1">
	<img src="<?php echo public_images;?>phone-top-small.png" alt="Phone number" class="pl-1">
<a href="tel:9810619956" class="grayColor pr-sm-5 font14">+91- 9810619956</a>
</span>
<span>
<img src="<?php echo public_images;?>email-top-small.png" alt="Email Id" class="pr-1 pl-sm-0 pl-5">
<a href="mailto:info@finessse.digital">info@finessse.digital</a>
</span></span>
<span class="d-sm-inline d-block text-right pr-2 pl-sm-5 pl-0">
<a href="https://www.facebook.com/FinessseInteractiveSolution" target="_blank" class="pl-1"><i class="fab fa-facebook-f"></i></a>
<a href="https://twitter.com/finessseim" target="_blank" class="pl-2"><i class="fab fa-twitter"></i></a>
<a href="https://www.linkedin.com/company/1568398/" target="_blank" class="pl-2"><i class="fab fa-linkedin-in"></i></a>
<a href="skype:+9810619956?call" class="pl-2"><i class="fab fa-skype"></i></a>
<a href="https://www.instagram.com/finessseinteractive/" target="_blank" class="pl-2"><i class="fab fa-instagram"></i> </a>
</span>

</div></div>
</div>
</div>
	<aside class="container">
	<div class="row pl-sm-0 pr-sm-0 pl-4 pr-3">
		<div class="logo float-left">
		<a href="<?php echo $this->config->base_url();?>"><img src="<?php echo public_images;?>finessse-svg.svg" alt="Finessse Interactive Solutions"></a>
		</div>
		<div class="Icon"><span></span><span></span><span></span><span></span></div>	
		<nav class="ml-auto">
		<ul class="nav">
		   <li><a href="<?php echo $this->config->base_url();?>">Home</a></li>
		    <li><a href="<?php echo $this->config->base_url();?>about-us">About</a></li>
		    <li class="overlay"><a href="<?php echo $this->config->base_url();?>digital-services">Services</a>
		    	<ul>
					<li><a href="<?php echo $this->config->base_url();?>digital-marketing-services-company">Digital Marketing </a></li>
					<li><a href="<?php echo $this->config->base_url();?>social-media-marketing-services-company">Social Media Marketing  </a></li>
					<li><a href="<?php echo $this->config->base_url();?>search-engine-optimization-services-company">SEO </a></li>
					<li><a href="<?php echo $this->config->base_url();?>online-reputation-management-services-company">Online Reputation Management</a></li>
					<li><a href="<?php echo $this->config->base_url();?>online-advertising-services-agency">Online Advertising</a></li>
					<li><a href="<?php echo $this->config->base_url();?>pay-per-click-management-services-company">PPC Management</a></li>
					<li><a href="<?php echo $this->config->base_url();?>content-marketing-services-agency">Content Marketing </a></li>
					<li><a href="<?php echo $this->config->base_url();?>email-marketing-service-agency">Email Marketing  </a></li>
					</ul>
					<ul class="pd-13">					
					<li><a href="<?php echo $this->config->base_url();?>web-development-services-company">Web Development </a></li>
					<li><a href="<?php echo $this->config->base_url();?>web-application-development-service-company">Web Application Development </a></li>				
					<li><a href="<?php echo $this->config->base_url();?>mobile-web-design-company">Web/Mobile Design </a></li>
					<li><a href="<?php echo $this->config->base_url();?>ecommerce-web-development-services-company">Ecommerce Development  </a></li>
					<li><a href="<?php echo $this->config->base_url();?>domain-and-hosting-services-company">Domain & Hosting  </a></li>
					<li><a href="<?php echo $this->config->base_url();?>corporate-branding-firm">Corporate Branding Solutions </a></li>
					<li><a href="<?php echo $this->config->base_url();?>copywriting-services-company">Copywriting  </a></li>
					
		    	</ul>
		    </li>
		    <li><a href="<?php echo $this->config->base_url();?>our-work">Our Work</a> </li>
		    <li><a href="<?php echo $this->config->base_url();?>clients">Clients</a></li>
		    <li><a href="<?php echo $this->config->base_url();?>contact">Contact</a></li>
		    <li><a href="<?php echo $this->config->base_url();?>career">Careers</a></li>
		    <li><a href="http://blog.finessse.digital/" target="_blank">Blog</a></li>

		</ul>
		</nav>
</div>
	</aside>	

</header>
</div>
<div class="clearfix"></div>
