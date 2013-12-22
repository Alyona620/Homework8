<?php
/**
 * @version     1.0.0
 * @package     com_add_student
 * @copyright   © 2013. Все права защищены.
 * @license     GNU General Public License версии 2 или более поздней; Смотрите LICENSE.txt
 * @author      Alyona <G_M_Alena@ukr.net> - http://
 */
// no direct access
defined('_JEXEC') or die;

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_add_student', JPATH_ADMINISTRATOR);
$canEdit = JFactory::getUser()->authorise('core.edit', 'com_add_student.' . $this->item->id);
if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_add_student' . $this->item->id)) {
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}
?>
<?php if ($this->item) : ?>

    <div class="item_fields">

        <ul class="fields_list">

            			<li><?php echo JText::_('COM_ADD_STUDENT_FORM_LBL_STUDENTFORM_ID'); ?>:
			<?php echo $this->item->id; ?></li>
			<li><?php echo JText::_('COM_ADD_STUDENT_FORM_LBL_STUDENTFORM_ORDERING'); ?>:
			<?php echo $this->item->ordering; ?></li>
			<li><?php echo JText::_('COM_ADD_STUDENT_FORM_LBL_STUDENTFORM_STATE'); ?>:
			<?php echo $this->item->state; ?></li>
			<li><?php echo JText::_('COM_ADD_STUDENT_FORM_LBL_STUDENTFORM_CHECKED_OUT'); ?>:
			<?php echo $this->item->checked_out; ?></li>
			<li><?php echo JText::_('COM_ADD_STUDENT_FORM_LBL_STUDENTFORM_CHECKED_OUT_TIME'); ?>:
			<?php echo $this->item->checked_out_time; ?></li>
			<li><?php echo JText::_('COM_ADD_STUDENT_FORM_LBL_STUDENTFORM_CREATED_BY'); ?>:
			<?php echo $this->item->created_by; ?></li>
			<li><?php echo JText::_('COM_ADD_STUDENT_FORM_LBL_STUDENTFORM_PIB'); ?>:
			<?php echo $this->item->pib; ?></li>
			<li><?php echo JText::_('COM_ADD_STUDENT_FORM_LBL_STUDENTFORM_GENERAL'); ?>:
			<?php echo $this->item->general; ?></li>
			<li><?php echo JText::_('COM_ADD_STUDENT_FORM_LBL_STUDENTFORM_BIRTHDAY'); ?>:
			<?php echo $this->item->birthday; ?></li>
			<li><?php echo JText::_('COM_ADD_STUDENT_FORM_LBL_STUDENTFORM_GENDER'); ?>:
			<?php echo $this->item->gender; ?></li>
			<li><?php echo JText::_('COM_ADD_STUDENT_FORM_LBL_STUDENTFORM_GROUP'); ?>:
			<?php echo $this->item->group; ?></li>
			<li><?php echo JText::_('COM_ADD_STUDENT_FORM_LBL_STUDENTFORM_AVERAGE'); ?>:
			<?php echo $this->item->average; ?></li>
			<li><?php echo JText::_('COM_ADD_STUDENT_FORM_LBL_STUDENTFORM_BOOK'); ?>:
			<?php echo $this->item->book; ?></li>
			<li><?php echo JText::_('COM_ADD_STUDENT_FORM_LBL_STUDENTFORM_PHOTO'); ?>:
			<?php echo $this->item->photo; ?></li>


        </ul>

    </div>
    <?php if($canEdit): ?>
		<a href="<?php echo JRoute::_('index.php?option=com_add_student&task=studentform.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_ADD_STUDENT_EDIT_ITEM"); ?></a>
	<?php endif; ?>
								<?php if(JFactory::getUser()->authorise('core.delete','com_add_student.studentform.'.$this->item->id)):
								?>
									<a href="javascript:document.getElementById('form-studentform-delete-<?php echo $this->item->id ?>').submit()"><?php echo JText::_("COM_ADD_STUDENT_DELETE_ITEM"); ?></a>
									<form id="form-studentform-delete-<?php echo $this->item->id; ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_add_student&task=studentform.remove'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
										<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
										<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />
										<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />
										<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />
										<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />
										<input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>" />
										<input type="hidden" name="jform[pib]" value="<?php echo $this->item->pib; ?>" />
										<input type="hidden" name="jform[general]" value="<?php echo $this->item->general; ?>" />
										<input type="hidden" name="jform[birthday]" value="<?php echo $this->item->birthday; ?>" />
										<input type="hidden" name="jform[gender]" value="<?php echo $this->item->gender; ?>" />
										<input type="hidden" name="jform[group]" value="<?php echo $this->item->group; ?>" />
										<input type="hidden" name="jform[average]" value="<?php echo $this->item->average; ?>" />
										<input type="hidden" name="jform[book]" value="<?php echo $this->item->book; ?>" />
										<input type="hidden" name="jform[photo]" value="<?php echo $this->item->photo; ?>" />
										<input type="hidden" name="option" value="com_add_student" />
										<input type="hidden" name="task" value="studentform.remove" />
										<?php echo JHtml::_('form.token'); ?>
									</form>
								<?php
								endif;
							?>
<?php
else:
    echo JText::_('COM_ADD_STUDENT_ITEM_NOT_LOADED');
endif;
?>
