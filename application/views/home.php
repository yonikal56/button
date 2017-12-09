{question}
<!-- ====================================== Question -->
	<!-- What if -->
	<aside class="panel panel-success col-md-5">
		<!-- Title -->
		<div class="panel-heading">
			<h3 class="panel-title fontBold">{$lang.if}</h3>
		</div>
		<div class="panel-body">
			{choice1}
		</div>
	</aside>
	
	<!-- Spacer -->
	<div class="col-md-2"></div>
	
	<!-- But -->
	<aside class="panel panel-danger col-md-5">
		<!-- Title -->
		<div class="panel-heading">
			<h3 class="panel-title fontBold">{$lang.but}</h3>
		</div>
		<div class="panel-body">
			{choice2}
		</div>
	</aside>
	
	<!-- Clearing -->
	<div class="clr"></div>
	
	<!-- ====================================== Buttons -->
	<!-- Spacer -->
	<div class="col-md-1"></div>
	<!-- Green Button Section -->
	<section class="yesb col-md-3 pull-right">
		<!-- Finger -->
		<div class="glyphicon glyphicon-hand-down hand"></div>
		<!-- Button -->
		<div class="yesButtonReg"><a id="{ID}" data-bool="yes" href="#"><h4>{$lang.yes}</h4></a></div>
	</section>
	
	<!-- Spacer -->
	<div class="col-md-4"></div>
	
	<!-- Green Button Section -->
	<section class="nob col-md-3 pull-left">
		<!-- Finger -->
		<div class="glyphicon glyphicon-ban-circle nobhand"></div>
		<!-- Button -->
		<div class="noButtonReg"><a id="{ID}" data-bool="no" href="#"><h4>{$lang.no}</h4></a></div>
	</section>
	
	<!-- Spacer -->
	<div class="col-md-1"></div>
	
	<div class="clr"></div>
{/question}