<?php
/**
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
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'SisDispl');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php

		echo $this->Html->css('bootstrap.css');
		echo $this->Html->script('jquery-1.12.3.js');
	  echo $this->Html->script('jquery.validate.js');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

	?>
</head>
<body>

	<?php echo $this->fetch('content'); ?>

	<footer>
		<br/><br/>
				<div class="col-md-2 col-sm-offset-10">
					<p><h4>SisDispl - soluções </h4></p>
						<p><h4>sac@sisdispl.com.br</h4></p>
						<p><h4>(31) 3853-1313</h4></p>
					</div>
	</footer>
</body>
</html>
