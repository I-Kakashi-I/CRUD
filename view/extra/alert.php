<?php
require_once "../model/model.php";
$data=new Model();
if ($data->hasMsg()){
echo' <div class="alert alert-' . $data->getMsgType() .'">' .$data->getMsg() .'</div>';
}
