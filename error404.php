<article  class="gray-bg">
<div class="container pt-5 pb-5">
<div class="row">
<div class="col-sm-6 text-sm-left text-center">
<img src="<?php echo public_images;?>/404.png" alt="Error Page" class="img-fluid" />
</div>
<div class="col-sm-6 padt-5 text-sm-left text-center">
<h1 class="pt-5 padt-5 top-15 p-2">We can't seem to find the page you're looking for.</h1>
<span class="mt-4 d-block"><a href="<?php echo $this->config->base_url();?>" class="btn1">Go Back</a></span>
</div>

</div>
</div>
</article>
<?php $this->load->view("query.php") ?>	