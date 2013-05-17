
<br /><br />

<div id="slides-detail">
	<div class="slide-bg"><img src="/img/destinationBanImg.jpg" alt="#"></div><!--end of slide-bg-->
	<div class="slide-desc"><p><?php echo $destination; ?></p></div>
</div><!--end of slides-->


<div id="rev2-holder1" class="pad0">

<?php
echo $this->Form->create(array('url' => '/search/search'));
?>
	<div id="desti-desc"><p>Search over (<?php echo $total; ?> of listings) <br/> Vacation Rentals in <?php echo $destination; ?></p></div>
	<input type="hidden" name="location" id="location" value="<?php echo $destination; ?>" />
	
	<div id="rev2-datepickerWrap">
		<h4>Check-in Date</h4>
		<div id="rev2-datepicker"><input type="text" name="checkin" id="datepicker" value="" /></div>
	</div>
	<div class="numBtnWrap">
		<div class="numBtnTxt"><p>Number of Nights</p></div>
		<div class="numBtn">
			<input type="button" id="subtract" value="-" />
			<span id="num">0</span>
			<input type="button" id="add" value="+" />
			<input type="hidden" name="nights" id="nights" value="0" />
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
	<div id="rev2SearchWrp" class="rev2SearchWrp">
		<p>Check-out Date: <span id="checkout"></span></p>
		<div id="rev2Srch"><p><input type="image" src="/img/btn-search.png" /></p></div>
	</div>

<?php echo $this->Form->end(); ?>

<div class="clear"></div>
</div>
<div id="destTitle2">
	<h1>Featured Vacation Rental Deals <span>(<?php echo $this->Paginator->counter(array('format' => __('{:start} - {:end} of {:count}')));?>)</span></h1>
</div>

<div id="descMainWrap">

	<div ><!--  id="slides_two"-->
		<div class="slides_container">	
		
			<div id="destWrap">
				<?php
				foreach($properties as $i){
				?>
				<div class="destWrapIns">
					<div class="destImg">
						<?php if(count($i['PropertyImage']) > 0) { ?>
							<div style="height:100px;width:300px;overflow:hidden; background:#333">
								<a href="/property/view/<?php echo $i['Property']['property_id']?>"><img src="<?php echo $i['PropertyImage'][0]['image_url']; ?>" width="300" height="auto" alt="#" /></a>
							</div>
						<?php } ?>
						<div id="destTrans">&nbsp;</div>
						<p><span><?php echo $i['Property']['name']; ?></span></p>
					</div>
				<div class="clear"></div>
				</div>

				<?php
				}
				?>
			<div class="clear"></div>
			</div>
		<div class="clear"></div>
		</div>
		
		<div id="pagination">
		<?php
			
			echo $this->Paginator->prev(__('Prev '), array(), null, array('class' => 'prev'));
			echo $this->Paginator->next(__(' Next'), array(), null, array('class' => 'next'));
		?>
		</div>
			
	<div class="clear"></div>
	</div> <!-- end: end of slides_two-->
			

	<div id="rev2Btm">
		<div class="rev2Btn"><p><a href="#"><img src="/img/btn-contact.png" alt="#" /></a></p></div>
	</div>

<div class="clear"></div>
</div>


<script type="text/javascript">
<!--
	
$(function() {
	
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
	
	
});

-->
</script>

