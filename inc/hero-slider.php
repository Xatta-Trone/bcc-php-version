<div class="hero-slider-area">
	<div class="hero-slides">
<?php $getAllSlides = $slider->getSlideByProgramme(1); ?>
<?php if ($getAllSlides): foreach($getAllSlides as $singleSlideItem): ?>
		<div class="single-slide-item">
			<div class="img-continer" style="background-image: url(file/img/<?php echo $singleSlideItem['image']; ?>);"></div>
			<p><?php if (!empty($singleSlideItem['caption'])) {echo $singleSlideItem['caption'];} ?></p>
			
		</div>
<?php endforeach;endif; ?>
	</div>
</div>

	<!-- <div class="single-slide-item">
		<div class="img-continer" style="background-image: url(img/2.jpg);"></div>
		<p>Lorem ipsum dolor sit amet.</p>
	</div>
	<div class="single-slide-item">
		<div class="img-continer" style="background-image: url(img/1.JPG);"></div>
		<p>Lorem ipsum dolor sit amet.</p>
	</div> -->