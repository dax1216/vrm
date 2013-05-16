<?php
	echo $this->Html->script(array('jquery-ui','hideShow')); //autofill
?>
<div id="rev2-holder2">
<?php
echo $this->Form->create(array('url' => '/search/results'));
?>
	<div id="rev2-datepickerWrap" class="currLocation" >
		<h4>Find Vacation Rentals</h4>
		<div id="rent-inpt">
			<input type="text" id="show" name="location" onKeyDown="showClick();" />
			<input type="button" id="hide" onClick="hideClick();" />
			<div class="clear"></div>			
		</div>
	</div>
	<div id="rev2-datepickerWrap">
		<h4>Check-in Date</h4>
		<div id="rev2-datepicker"><input type="text" name="checkin_date" id="datepicker" value="" /></div>
	</div>
	<div class="numBtnWrap">
		<div class="numBtnTxt"><p>Number of Nights</p></div>
		<div class="numBtn">
			<input type="button" id="subtract" value="-" />
			<span id="num">0</span>
			<input type="button" id="add" value="+" />
			<input type="hidden" name="days" id="days" value="0" />
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="numBtnWrap">
		<div class="numBtnTxt"><p>Sleeps</p></div>
		<div class="numBtn">
			<input type="button" id="subtract2" value="-" />
			<span id="num2">0</span>
			<input type="button" id="add2" value="+" />
			<input type="hidden" name="occupancy" id="occupancy" value="0" />
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>

	<div id="rev2SearchWrp">
		<p>Check-out Date: <span id="checkout"><?php //echo date('D F j, Y'); ?></span></p>
		<div id="rev2Srch"><p><input type="image" src="/img/btn-search.png" /></p></div>
		<p class="pad0"><a href="#">Contact Us</a></p>
	</div>
	<div class="clear"></div>

<?php echo $this->Form->end(); ?>

</div>

<!-- note: static -->
<div id="destTitle">
	<h1>Popular<span>Destinations</span></h1>
</div>
<div id="destWrap">
	<div class="destWrapIns">
		<div class="destImg"><a href="/destination/index/Hawaii"><img src="/img/img-Hawaii.jpg" alt="#" /></a> <p>Hawaii <span>168 options</span></p></div>
		<div class="clear"></div>
	</div>
	<div class="destWrapIns">
		<div class="destImg"><a href="/destination/index/Orlando"><img src="/img/img-orlando.jpg" alt="#" /></a> <p>Orlando <span>108 options</span></p></div>
		<div class="clear"></div>
	</div>
	<div class="destWrapIns">
		<div class="destImg"><a href="/destination/index/Park City"><img src="/img/img-ParkCity.jpg" alt="#" /></a> <p>Park City, Ut <span>98 options</span></p></div>
		<div class="clear"></div>
	</div>
	<div class="destWrapIns">
		<div class="destImg"><a href="/destination/index/Breckenridge"><img src="/img/img-breckenridge.jpg" alt="#" /></a> <p>Breckenridge <span>127 options</span></p></div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
		
	<div id="rev2Btm">
		<div class="rev2Text"><p>Browse by destination</p></div>
		<div class="rev2Btn"><p><a href="/contact"><img src="/img/btn-contact.png" alt="#" /></a></p></div>
	</div>		
	<div class="clear"></div>				
</div>


<script type="text/javascript">
<!--

	$(function() {
		$("#show").autocomplete({
			source: "/country/get_all_auto",
			minLength: 3
		});
	});
	
	var todayDate = new Date();

	$("#add").click(function(){
		var num = parseInt($("#num").html())+1;
		$("#num").html(num);
		
		var myDate = new Date();
		if($('#datepicker').val() != ''){
			myDate = new Date($('#datepicker').val());
		}
		myDate.setDate(myDate.getDate() + num);
		
		$("#checkout").html(myDate);
		$("#nights").val(num);
	});
	$("#subtract").click(function(){
		var num = parseInt($("#num").html())-1<0?0:parseInt($("#num").html())-1;
		$("#num").html(num);
		
		var myDate = new Date();
		if($('#datepicker').val() != ''){
			myDate = new Date($('#datepicker').val());
		}
		myDate.setDate(myDate.getDate() + num);

		$("#checkout").html(myDate);
		$("#nights").val(num);
	});
	$("#datepicker").change(function(){

		var myDate = new Date($(this).val());
		var num = parseInt($("#num").html())
		
		myDate.setDate(myDate.getDate() + num);
		
		$("#checkout").html(myDate);

	});

	//number of sleeps
	$("#add2").click(function(){
		var num = parseInt($("#num2").html())+1;
		$("#num2").html(num);
		$("#occupancy").val(num);
		
	})
	$("#subtract2").click(function(){
		var num = parseInt($("#num2").html())-1<0?0:parseInt($("#num2").html())-1;
		$("#num2").html(num);
		$("#occupancy").val(num);
	});
	
-->
</script>