<?php
/**
 * @version     1.0.0
 * @package     com_add_student
 * @copyright   © 2013. Все права защищены.
 * @license     GNU General Public License версии 2 или более поздней; Смотрите LICENSE.txt
 * @author      Alyona <G_M_Alena@ukr.net> - http://
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Studentform controller class.
 */
class Add_studentControllerStudentform extends JControllerForm
{

    function __construct() {
        $this->view_list = 'studentsform';
        parent::__construct();
    }

}