
<br /><br />
***
<div id="slides-detail">
	<div class="slide-bg"><img src="/img/destinationBanImg.jpg" alt="#"></div><!--end of slide-bg-->
	<div class="slide-desc"><p>Salt Lake City</p></div>
</div><!--end of slides-->


<div id="rev2-holder1" class="pad0">
	<div id="desti-desc"><p>Search over (<?php echo $total; ?> of listings) <br/> Vacation Rentals in <?php echo $destination; ?></p></div>
	<div id="rev2-datepickerWrap">
		<h4>Check-in Date</h4>
		<div id="rev2-datepicker"><input type="text" id="datepicker"></div>
	</div>
	<div class="numBtnWrap">
		<div class="numBtnTxt"><p>Number of Nights</p></div>
		<div class="numBtn">
			<button id="subtract">-</button>
			<span id="num">0</span>
			<button id="add">+</button>
			
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="numBtnWrap">
		<div class="numBtnTxt"><p>Sleeps</p></div>
		<div class="numBtn">
			<button id="subtract2">-</button>
			<span id="num2">0</span>
			<button id="add2">+</button>
			
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
	<div id="rev2SearchWrp" class="rev2SearchWrp">
		<p>Check-out Date: <span id="checkout"></span></p>
		<div id="rev2Srch"><p><a href="#"><img src="/img/btn-search.png" alt="#" /></a></p></div>
	</div>
	<div class="clear"></div>
</div>
<div id="destTitle2">
	<h1>Featured Vacation Rental Deals <span>(4 of 12)</span></h1>
</div>

<div id="descMainWrap">
	<div id="slides_two">
		<div class="slides_container">
			
			<div id="destWrap">
				<?php
				foreach($properties as $i){
				?>
				<div class="destWrapIns">
					<div class="destImg">
						<a href="#"><img src="/img/img-bigbas1.jpg" alt="#" /></a>
						<div id="destTrans">&nbsp;</div>
						<p><span><?php echo $i['Property']['name'] .'<br >'; ?></span></p>
						
						<div style="display:none" id="rating">
							<ul>
								<li><img src="/img/ico-star.png" alt="#" /></li>
								<li><img src="/img/ico-star.png" alt="#" /></li>
								<li><img src="/img/ico-star.png" alt="#" /></li>
								<li><img src="/img/ico-star.png" alt="#" /></li>
							</ul>
						</div>
					</div>
				<div class="clear"></div>
				</div>
				
				<?php
				}
				echo $this->Paginator->prev(__('*Prev '), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->next(__(' Next*'), array(), null, array('class' => 'next disabled'));
				?>
				

			<div class="clear"></div>		
			</div>
			
			<div id="destWrap">
				<div class="destWrapIns">
					<div class="destImg">
						<a href="#"><img src="/img/img-bigbas1.jpg" alt="#" /> </a>
						<div id="destTrans">&nbsp;</div>
						<p><span>#5 Bigbas Hotel - Salt Lake City</span></p>
						<div id="rating">
							<ul>
								<li><img src="/img/ico-star.png" alt="#" /></li>
								<li><img src="/img/ico-star.png" alt="#" /></li>
								<li><img src="/img/ico-star.png" alt="#" /></li>
								<li><img src="/img/ico-star.png" alt="#" /></li>
							</ul>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="destWrapIns">
					<div class="destImg">
						<a href="#"><img src="/img/img-bigbas1.jpg" alt="#" /> </a>
						<div id="destTrans">&nbsp;</div>
						<p><span>#6 Bigbas Hotel - Salt Lake City</span></p>
						<div id="rating">
							<ul>
								<li><img src="/img/ico-star.png" alt="#" /></li>
								<li><img src="/img/ico-star.png" alt="#" /></li>
								<li><img src="/img/ico-star.png" alt="#" /></li>
								<li><img src="/img/ico-star.png" alt="#" /></li>
							</ul>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="destWrapIns">
					<div class="destImg">
						<a href="#"><img src="/img/img-bigbas1.jpg" alt="#" /> </a>
						<div id="destTrans">&nbsp;</div>
						<p><span>#7 Bigbas Hotel - Salt Lake City</span></p>
						<div id="rating">
							<ul>
								<li><img src="/img/ico-star.png" alt="#" /></li>
								<li><img src="/img/ico-star.png" alt="#" /></li>
								<li><img src="/img/ico-star.png" alt="#" /></li>
							</ul>
						</div>
					</div>
				<div class="clear"></div>
				</div>
				
				<div class="destWrapIns">
					<div class="destImg">
						<a href="#"><img src="/img/img-bigbas1.jpg" alt="#" /></a> 
						<div id="destTrans">&nbsp;</div>
						<p><span>#8 Bigbas Hotel - Salt Lake City</span></p>
						<div id="rating">
							<ul>
								<li><img src="/img/ico-star.png" alt="#" /></li>
								<li><img src="/img/ico-star.png" alt="#" /></li>
								<li><img src="/img/ico-star.png" alt="#" /></li>
								<li><img src="/img/ico-star.png" alt="#" /></li>
								<li><img src="/img/ico-star.png" alt="#" /></li>
							</ul>
						</div>
					</div>
				<div class="clear"></div>
				</div>
				
			<div class="clear"></div>		
			</div>
		</div>
	</div><!--end of slides_two-->	
	
	<div id="rev2Btm">
		<div class="rev2Btn"><p><a href="#"><img src="/img/btn-contact.png" alt="#" /></a></p></div>
	</div>		
	<div class="clear"></div>			
</div>


<script type="text/javascript">
<!--
	
$(function() {
	
	var todayDate = new Date();

	$("#checkout").html(todayDate);

	$("#add").click(function(){
		var num = parseInt($("#num").html())+1;
		$("#num").html(num);
		
		var myDate = new Date();
		if($('#datepicker').val() != ''){
			myDate = new Date($('#datepicker').val());
		}
		myDate.setDate(myDate.getDate() + num);
		
		$("#checkout").html(myDate);
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
	})
	$("#subtract2").click(function(){
		var num = parseInt($("#num2").html())-1<0?0:parseInt($("#num2").html())-1;
		$("#num2").html(num);
		
	});
	
});

-->
</script>