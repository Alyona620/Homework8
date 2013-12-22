<?php

defined('_JEXEC') or die;
require_once dirname(__FILE__).'/helper.php';

$list = modlistarticleHelper::getList($params);

require JModuleHelper::getLayoutPath('mod_listarticle', $params->get('layout', 'default'));


?>





