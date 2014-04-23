<?php 
	//toggle issue section
	$route = explode('/',Route::getCurrentRoute()->getPath());
?>

<div class="section-container accordion" data-section="accordion">
	<section class="<?php echo $route[0] == 'employee' ? 'active':'';?>">
		<p class="title" data-section-title>{{ HTML::link("employee", "Employees") }}</p>
	</section>
	<section class="<?php echo $route[0] == 'search_form' || $route[0] == 'search' ? 'active':'';?>">
		<p class="title" data-section-title>{{ HTML::link("search_form", "Search") }}</p>
	</section>
</div>

