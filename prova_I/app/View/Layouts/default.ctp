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

$cakeDescription = __d('cake_dev', 'SisLab');
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

		echo $this->Html->css('bootstrap.min.css');
		echo $this->Html->css('lab.css');


		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="active">
                <a href="<?php echo Router::url('http://localhost/prova_I/'); ?>"><?php echo $cakeDescription; ?></a>
              </li>
            </ul>
						<ul class="nav navbar-nav navbar-right">
							<?php if($this->Session->check('Paciente')){ ?>
								<p><center>_______<a href=" <?php echo Router::url('/pacientes/logout'); ?>"<button class='btn btn-default'>Sair</button></a></center>
							<?php } ?>
            </ul>
						<ul class="nav navbar-nav navbar-right">
							<p><h5><?php echo $this->Flash->render(); ?></h5></p>
						</ul>
          </div>
       </div>
  </nav>

	<div class="container">
	  <div class="row">

			<?php echo $this->fetch('content'); ?>
			</br>
		</div>
	</div>
	<footer>
		<div class="col-md-3 col-sm-offset-9">
			<p><h4>SisLab - soluções laboratoriais </h4></p>
			<p>sislabcontato@sac.com.br</p>
			<p>(31) 3853-1313</p>
		</div>
	</footer>
</body>
</html>
