<?php

session_start();

require 'vendor/autoload.php';
$app = new \atk4\ui\App('index');
$app->initLayout('Centered');

$form = $app->layout->add('Form');
$rofl = new \atk4\data\Model(new \atk4\data\Persistence_Array($a));
$rofl->addField('KATET1',['required']);
$rofl->addField('KATET2',['required']);
$form->setModel($rofl);


//$app->add(['Label',$katet1]);
$form->buttonSave->set('Work');




$form->onSubmit(function ($form) {
  $katet1=$form->model['KATET1'];
  $katet2=$form->model['KATET2'];
  $pifagor=sqrt($katet1*$katet1+$katet2*$katet2);
  $_SESSION['pifagor']=$pifagor;
return new \atk4\ui\jsExpression('document.location = "index.php" ');

});
$app->add(['ui'=>'hidden divider']);
if(isset($_SESSION['pifagor'])){
  $ad=$_SESSION['pifagor'];
  $l=$app->add(['Label',$ad,'massive green']);
//  $l->set($ad);
}
