<?php
	//echo $this->Html->script(array('jquery-ui')); //autofill

	$this->paginator->options(array('url' => $this->passedArgs));
	
?>

<?php
	foreach($properties as $i){
	?>
	<p><span><?php echo $i['Property']['name'] .' (' . $i['Property']['occupancy'] .')<br >'; ?></span></p>
	
	<?php
	}
	?>
	
	<?php
	echo $this->Paginator->prev(__('*Prev '), array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->next(__(' Next*'), array(), null, array('class' => 'next disabled'));
	?>
				
	<div id="searchWrap">
		<div id="srchInptBg"><input type="text" name="search" value="Search" onClick="if(this.value=='Search')this.value='';" onBlur="if(this.value=='')this.value='Search';"	 />
		<input type="button" name="searchBtn" />
		</div>
		<div class="clear"></div>
		<p class="pad0 center"><a href="#">Advanced Search</a></p>
	</div>


	<div id="pagination"><p>1-4 of 54</p></div>
	<div id="srchResultWrap">
		<ul> <!-- start of loop -->

			<li>
				<div id="srchImg"><img src="/img/search-Img.jpg" alt="#" /></div>
				<div id="srchDesc">
					<h3><a href="#">Property Name</a></h3>
					<p>Destination <br/>2 BR/2 BA, Condo</p>
				</div>
				<div id="srchPrice"><p>$543 </p> <span>per night</span></div>
				<div class="clear"></div>
			</li>
			<li>
				<div id="srchImg"><img src="/img/search-Img.jpg" alt="#" /></div>
				<div id="srchDesc">
					<h3><a href="#">Property Name</a></h3>
					<p>Destination <br/>2 BR/2 BA, Condo</p>
				</div>
				<div id="srchPrice"><p>$640 </p> <span>per night</span></div>
				<div class="clear"></div>
			</li>
			<li>
				<div id="srchImg"><img src="/img/search-Img.jpg" alt="#" /></div>
				<div id="srchDesc">
					<h3><a href="#">Property Name</a></h3>
					<p>Destination <br/>2 BR/2 BA, Condo</p>
				</div>
				<div id="srchPrice"><p>$599 </p> <span>per night</span></div>
				<div class="clear"></div>
			</li>
			<li>
				<div id="srchImg"><img src="/img/search-Img.jpg" alt="#" /></div>
				<div id="srchDesc">
					<h3><a href="#">Property Name</a></h3>
					<p>Destination <br/>2 BR/2 BA, Condo</p>
				</div>
				<div id="srchPrice"><p>$730 </p> <span>per night</span></div>
				<div class="clear"></div>
			</li>

		</ul>
		<div id="cntactBtn"><p><a href="#"><img src="/img/btn-contact.png" alt="" /></a></p></div>
	</div>