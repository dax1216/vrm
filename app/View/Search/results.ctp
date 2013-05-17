					
	<div id="searchWrap">
		<div id="srchInptBg"><input type="text" name="search" value="Search" onClick="if(this.value=='Search')this.value='';" onBlur="if(this.value=='')this.value='Search';"	 />
		<input type="button" name="searchBtn" />
		</div>
		<div class="clear"></div>
		<p class="pad0 center"><a href="/search/advanced<?=$url_string?>">Narrow Search</a></p>
	</div>


<?php   if(!empty($properties)) { ?>
	<div id="pagination"><p><?php echo $this->Paginator->counter(array('format' => __('{:start} - {:end} of {:count}')));?></p></div>
<?php   } ?>
	<div id="srchResultWrap">
<?php   if(!empty($properties)) { ?>
		<ul> <!-- start of loop -->
<?php       foreach($properties as $property) { ?>
			<li>
				<div id="srchImg"><?php echo $this->Html->image($property['PropertyImage'][0]['image_url'], array('width' => '60'))?></div>
				<div id="srchDesc">
<?php           list($property_name, $sub_text) = $this->Property->getPropertyNameAndCaption($property); ?>
					<h3><?php echo $this->Html->link($property_name, '/property/view/'.$property['Property']['property_id'])?></h3>
					<p><?php echo ($property['Property']['destination']) ? $property['Property']['destination'] . '<br />' : ''?><?php echo $sub_text?></p>
				</div>
				<div id="srchPrice"><p>$<?=$property['Property']['rate_per_night']?></p> <span>per night</span></div>
				<div class="clear"></div>
			</li>			
<?php       } ?>
		</ul>
        <div id="pagination-footer">
        <?php
            echo $this->Paginator->prev(__('< Prev'), array(), null, array('class' => 'prev disabled'));
            echo $this->Paginator->next(__('Next >'), array(), null, array('class' => 'next disabled'));
        ?>
        </div>
<?php   } else { ?>
        <div class="alert alert-error">No listings match your search</div>
<?php   } ?>
		<div id="cntactBtn"><p><a href="/contact"><img src="/img/btn-contact.png" alt="" /></a></p></div>
	</div>