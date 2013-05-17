<div id="navigation">
    <form action="/search/advanced<?=$url_string?>" method="POST">
    <input type="hidden" name="checkin_date" value="<?=$params['checkin_date']?>" />
    <input type="hidden" name="days" value="<?=$params['days']?>" />
    <input type="hidden" name="occupancy" value="<?=$params['occupancy']?>" />
    <input type="hidden" name="location" value="<?=$params['location']?>" />
    <ul id="improved" class="faqs-accordion">
        <li class="headArc">
            <h5 class="headArc-child"><a href="#">Keywords</a></h5>
            <div class="contentAc">
                <ul id="childUl">
                    <li>
                        Name contains<br />
                        <p><input type="text" name="keyword" value="" size="25" /></p>
                    </li>
                </ul>
            </div>
        </li>
        <li class="headArc">
            <h5 class="headArc-child"><a href="#">Price Range</a></h5>
            <div class="contentAc">
                <ul id="childUl">
                    <li>
                        Rate per Night<br />
                        <p>$<input type="text" name="rate_start" value="" size="7" /> to $<input type="text" name="rate_end" value="" size="7" /></p>
                    </li>
                </ul>
            </div>
        </li>
        <li class="headArc">
            <h5 class="headArc"><a href="#">Bedrooms</a></h5>
            <div class="contentAc">
                <ul id="childUl">
                    <li>
                        # of Bedrooms<br />
                        <p><input type="text" name="bedroom_start" value="" size="7" /> to <input type="text" name="bedroom_end" value="" size="7" /></p>
                    </li>
                </ul>
            </div>
        </li>
        <li class="headArc">
            <h5><a href="#">Baths</a></h5>
            <div class="contentAc">
                <ul id="childUl">
                    <li>
                        # of Baths<br />
                        <p><input type="text" name="bath_start" value="" size="7" /> to <input type="text" name="bath_end" value="" size="7" /></p>
                    </li>
                </ul>
            </div>
        </li>
        <li class="headArc">
            <h5><a href="#">Amenities</a></h5>
            <div class="contentAc">
                <ul id="childUl">
                    <li>
            <?php   foreach($amenities as $amenity) { ?>
                        <input type="checkbox" value="<?=$amenity['PropertyAmenity']['amenity']?>" name="amenities[]" /> <?= $amenity['PropertyAmenity']['amenity'] ?> <br />
            <?php   } ?>
                    </li>
                </ul>
            </div>
        </li>
        <li class="headArc">
            <h5><a href="#">City</a></h5>
            <div class="contentAc">
                <ul id="childUl">
                    <li>
            <?php   foreach($cities as $city) { ?>
                        <input type="checkbox" value="<?=$city['Property']['city']?>" name="cities[]" /> <?= $city['Property']['city'] ?> <br />
            <?php   } ?>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    <div id="advanceSearchBtn">
        <input type="image" src="/img/btn-search.png" value="Search">
    </div>
    </form>
</div>