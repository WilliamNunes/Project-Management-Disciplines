<?php

class Exame extends AppModel {
    public $belongsTo = array('Paciente','Procedimento');
}

 ?>
