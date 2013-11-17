<?php

defined('_JEXEC') or die;



require_once dirname(__FILE__).DS.'helper.php';



$mpmenu = mod_popupHelper::mod_popup($params);

require JModuleHelper::getLayoutPath('mod_popup');


?>