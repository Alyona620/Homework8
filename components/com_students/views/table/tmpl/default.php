<?php
/**
 * @version     1.0.0
 * @package     com_students
 * @copyright   © 2013. Все права защищены.
 * @license     GNU General Public License версии 2 или более поздней; Смотрите LICENSE.txt
 * @author      Alyona <G_M_Alena@ukr.net> - http://
 */
// no direct access
defined('_JEXEC') or die;

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_students', JPATH_ADMINISTRATOR);
$canEdit = JFactory::getUser()->authorise('core.edit', 'com_students.' . $this->item->id);
if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_students' . $this->item->id)) {
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}
?>
<?php if ($this->item) : ?>

    <div class="item_fields">

        <ul class="fields_list">

            			<li><?php echo JText::_('COM_STUDENTS_FORM_LBL_TABLE_ID'); ?>:
			<?php echo $this->item->id; ?></li>
			<li><?php echo JText::_('COM_STUDENTS_FORM_LBL_TABLE_ORDERING'); ?>:
			<?php echo $this->item->ordering; ?></li>
			<li><?php echo JText::_('COM_STUDENTS_FORM_LBL_TABLE_STATE'); ?>:
			<?php echo $this->item->state; ?></li>
			<li><?php echo JText::_('COM_STUDENTS_FORM_LBL_TABLE_CHECKED_OUT'); ?>:
			<?php echo $this->item->checked_out; ?></li>
			<li><?php echo JText::_('COM_STUDENTS_FORM_LBL_TABLE_CHECKED_OUT_TIME'); ?>:
			<?php echo $this->item->checked_out_time; ?></li>
			<li><?php echo JText::_('COM_STUDENTS_FORM_LBL_TABLE_CREATED_BY'); ?>:
			<?php echo $this->item->created_by; ?></li>
			<li><?php echo JText::_('COM_STUDENTS_FORM_LBL_TABLE_PIB'); ?>:
			<?php echo $this->item->pib; ?></li>
			<li><?php echo JText::_('COM_STUDENTS_FORM_LBL_TABLE_GENERAL_INFO'); ?>:
			<?php echo $this->item->general_info; ?></li>
			<li><?php echo JText::_('COM_STUDENTS_FORM_LBL_TABLE_BIRTH_DATE'); ?>:
			<?php echo $this->item->birth_date; ?></li>
			<li><?php echo JText::_('COM_STUDENTS_FORM_LBL_TABLE_GENDER'); ?>:
			<?php echo $this->item->gender; ?></li>
			<li><?php echo JText::_('COM_STUDENTS_FORM_LBL_TABLE_GROUP'); ?>:
			<?php echo $this->item->group; ?></li>
			<li><?php echo JText::_('COM_STUDENTS_FORM_LBL_TABLE_AVERAGE_SCORE'); ?>:
			<?php echo $this->item->average_score; ?></li>
			<li><?php echo JText::_('COM_STUDENTS_FORM_LBL_TABLE_NUMBER_STUDENT_BOOK'); ?>:
			<?php echo $this->item->number_student_book; ?></li>
			<li><?php echo JText::_('COM_STUDENTS_FORM_LBL_TABLE_IMAGE'); ?>:
			<?php echo $this->item->image; ?></li>


        </ul>

    </div>
    <?php if($canEdit): ?>
		<a href="<?php echo JRoute::_('index.php?option=com_students&task=table.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_STUDENTS_EDIT_ITEM"); ?></a>
	<?php endif; ?>
								<?php if(JFactory::getUser()->authorise('core.delete','com_students.table.'.$this->item->id)):
								?>
									<a href="javascript:document.getElementById('form-table-delete-<?php echo $this->item->id ?>').submit()"><?php echo JText::_("COM_STUDENTS_DELETE_ITEM"); ?></a>
									<form id="form-table-delete-<?php echo $this->item->id; ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_students&task=table.remove'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
										<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
										<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />
										<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />
										<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />
										<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />
										<input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>" />
										<input type="hidden" name="jform[pib]" value="<?php echo $this->item->pib; ?>" />
										<input type="hidden" name="jform[general_info]" value="<?php echo $this->item->general_info; ?>" />
										<input type="hidden" name="jform[birth_date]" value="<?php echo $this->item->birth_date; ?>" />
										<input type="hidden" name="jform[gender]" value="<?php echo $this->item->gender; ?>" />
										<input type="hidden" name="jform[group]" value="<?php echo $this->item->group; ?>" />
										<input type="hidden" name="jform[average_score]" value="<?php echo $this->item->average_score; ?>" />
										<input type="hidden" name="jform[number_student_book]" value="<?php echo $this->item->number_student_book; ?>" />
										<input type="hidden" name="jform[image]" value="<?php echo $this->item->image; ?>" />
										<input type="hidden" name="option" value="com_students" />
										<input type="hidden" name="task" value="table.remove" />
										<?php echo JHtml::_('form.token'); ?>
									</form>
								<?php
								endif;
							?>
<?php
else:
    echo JText::_('COM_STUDENTS_ITEM_NOT_LOADED');
endif;
?>
