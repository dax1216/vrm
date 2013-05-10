<?php
    $breakpoint = strpos($property['Property']['name'], ' - ');
    $property_name = substr($property['Property']['name'], 0, $breakpoint);
    $sub_text = substr($property['Property']['name'], $breakpoint + 3, strlen($property['Property']['name']));
?>
<?= $this->Html->script('http://maps.google.com/maps/api/js?sensor=true', false); ?>
<div id="srch-galleryTitle"><h1><?= $property_name?><br/><span><?=$sub_text?></span></h1></div>
<div id="slides">
    <div class="slides_container">
<?php   if(count($property['PropertyImage']) > 0) {
            foreach($property['PropertyImage'] as $image) {
?>
        <div class="slide-box">
            <div class="slide-bg"><img src="<?=$image['image_url']?>" width="320"></div><!--end of slide-bg-->
        </div><!--end of slide-box-->
<?php       }
        }
?>
    </div><!--end of slides_container-->
</div><!--end of slides-->
<div id="galleryDesc"><p>Sleeps <?=$property['Property']['occupancy']?>, <?=$property['Property']['bedrooms']?> Bedrooms, <?=$property['Property']['baths']?> bath</p></div>
<ul id="improved" class="faqs-accordion improved">
    <li class="headArc">
        <h5><a href="#">Pricing</a> <span class="detailNight">From $199 / night</span></h5>        
    </li>
    <li class="headArc">
        <h5 class="headArc-child"><a href="#">Description</a></h5>
        <div class="contentAc">
            <ul id="childUl">
                <li>
                    <?=$this->Text->truncate($property['Property']['description'], 150, array('ellipsis' => '...', 'extact' => true, 'html' => true))?>
                </li>
            </ul>
        </div>
    </li>
    <li class="headArc">
        <h5 class="headArc"><a href="#">Amenities</a></h5>
        <div class="contentAc">
            <ul id="childUl">
                <li>
            <?php   if(count($property['PropertyAmenity']) > 0) {
                        $amenities = array();

                        foreach($property['PropertyAmenity'] as $amenity) {
                            $amenities[] = $amenity['amenity'];
                        }
                    }

                    echo implode(', ', $amenities);
            ?>
                </li>
            </ul>
        </div>
    </li>
    <li class="headArc">
        <h5><a href="#">Map</a></h5>
        <div class="contentAc">
            <ul id="childUl">
                <li>
                    <?= ($property['Property']['longitude'] && $property['Property']['latitude']) ? $this->GoogleMap->map($map_options) : 'Map coordinates not listed.'; ?>
                </li>
            </ul>
        </div>
    </li>
    <li class="headArc">
        <h5><a href="#">Share</a></h5>
        <div class="contentAc">
            <ul id="childUl">
                <li>
                    <p>Line 5 of the descrip4ons goes hear and Can wrap to 2-3 lines of text before we Cut it off...</p>
                </li>
            </ul>
        </div>
    </li>
</ul>
<div id="cntactBtn"><p><a href="#"><img src="/img/cont-MainBtn.png" alt="" /></a></p></div>
<div id="cntacArea"><p><img src="/img/ico-phone.png" alt="" /> 888-777-6666</p></div>