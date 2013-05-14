<?php echo $this->Html->script(array('jquery.infieldlabel'), array('inline' => false)) ?>
<div id="contactWrap">
    <?php echo $this->Session->flash(); ?>
    <p class="contactTop"><span>*</span>denotes a required field.</p>
    <?php echo $this->Form->create('Contact', array('autocomplete' => 'off')); ?>
        <div class="contactInptWrap">
            <label for="ContactFirstName">First Name<span class="required">*</span></label>
            <?php echo $this->Form->input('first_name', array('div' => 'contactInptBg', 'label' => false)); ?>
        </div>

        <div class="contactInptWrap">
            <label for="ContactLastName">Last Name<span class="required">*</span></label>
            <?php echo $this->Form->input('last_name', array('div' => 'contactInptBg', 'label' => false)); ?>
        </div>

        <div class="contactInptWrap">
            <label for="ContactEmail">E-mail<span class="required">*</span></label>
            <?php echo $this->Form->input('email', array('type' => 'text', 'div' => 'contactInptBg', 'label' => false)); ?>
        </div>

        <div class="contactInptWrap">
            <label for="ContactPhone">Phone<span class="required">*</span></label>
            <?php echo $this->Form->input('phone', array('type' => 'text', 'div' => 'contactInptBg', 'label' => false)); ?>
        </div>

        <div class="contactInptWrap">
            <label for="ContactTravelDates">Travel Dates</label>
            <?php echo $this->Form->input('travel_dates', array('div' => 'contactInptBg', 'label' => false)); ?>
        </div>

        <div class="contactInptWrap">
            <label for="ContactDestination">Destination</label>
            <?php echo $this->Form->input('destination', array('div' => 'contactInptBg', 'label' => false)); ?>
        </div>

        <div class="contactInptWrap txarea">
            <label for="ContactComments">Comments</label>
            <div class="contactTxtareaBg">
                <?php echo $this->Form->textarea('comments', array('div' => 'contactInptBg', 'label' => false)); ?>
            </div>
        </div>

        <div id="sendBtn">
            <p><input type="image" src="../img/btn-send.png" value="Send"></p>
        </div>
    <?php echo $this->Form->end() ?>

</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("label").inFieldLabels();
    });
</script>