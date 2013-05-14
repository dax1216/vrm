<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>		
		<?php echo $title_for_layout; ?>
	</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
	<?php echo $this->Html->meta('icon'); ?>
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php
        echo $this->Html->css(array('style', 'jquery.ui.theme', 'jquery.ui.datepicker', 'jquery.ui.core'));
        echo $this->Html->script(array('jquery-1.9.1', 'custom-accordion', 'jquery.ui.core', 'jquery.ui.widget', 'jquery.ui.datepicker', 'datepicker', 'slides.min.jquery', 'custom'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>    
</head>
<body>
	<?php echo $this->element('header') ?>    
	<?php echo $content_for_layout ?>
</body>
</html>
