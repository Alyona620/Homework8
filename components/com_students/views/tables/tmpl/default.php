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
?>
<script type="text/javascript">
    function deleteItem(item_id){
        if(confirm("<?php echo JText::_('COM_STUDENTS_DELETE_MESSAGE'); ?>")){
            document.getElementById('form-table-delete-' + item_id).submit();
        }
    }
</script>

<div class="items">
    <ul class="items_list">
<?php $show = false; ?>
        <?php foreach ($this->items as $item) : ?>

            
				<?php
					if($item->state == 1 || ($item->state == 0 && JFactory::getUser()->authorise('core.edit.own',' com_students.table.'.$item->id))):
						$show = true;
						?>
							<li>
								<a href="<?php echo JRoute::_('index.php?option=com_students&view=table&id=' . (int)$item->id); ?>"><?php echo $item->pib; ?></a>
								<?php
									if(JFactory::getUser()->authorise('core.edit.state','com_students.table.'.$item->id)):
									?>
										<a href="javascript:document.getElementById('form-table-state-<?php echo $item->id; ?>').submit()"><?php if($item->state == 1): echo JText::_("COM_STUDENTS_UNPUBLISH_ITEM"); else: echo JText::_("COM_STUDENTS_PUBLISH_ITEM"); endif; ?></a>
										<form id="form-table-state-<?php echo $item->id ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_students&task=table.save'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
											<input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>" />
											<input type="hidden" name="jform[ordering]" value="<?php echo $item->ordering; ?>" />
											<input type="hidden" name="jform[state]" value="<?php echo (int)!((int)$item->state); ?>" />
											<input type="hidden" name="jform[checked_out]" value="<?php echo $item->checked_out; ?>" />
											<input type="hidden" name="jform[checked_out_time]" value="<?php echo $item->checked_out_time; ?>" />
											<input type="hidden" name="jform[pib]" value="<?php echo $item->pib; ?>" />
											<input type="hidden" name="jform[general_info]" value="<?php echo $item->general_info; ?>" />
											<input type="hidden" name="jform[birth_date]" value="<?php echo $item->birth_date; ?>" />
											<input type="hidden" name="jform[gender]" value="<?php echo $item->gender; ?>" />
											<input type="hidden" name="jform[group]" value="<?php echo $item->group; ?>" />
											<input type="hidden" name="jform[average_score]" value="<?php echo $item->average_score; ?>" />
											<input type="hidden" name="jform[number_student_book]" value="<?php echo $item->number_student_book; ?>" />
											<input type="hidden" name="jform[image]" value="<?php echo $item->image; ?>" />
											<input type="hidden" name="option" value="com_students" />
											<input type="hidden" name="task" value="table.save" />
											<?php echo JHtml::_('form.token'); ?>
										</form>
									<?php
									endif;
									if(JFactory::getUser()->authorise('core.delete','com_students.table.'.$item->id)):
									?>
										<a href="javascript:deleteItem(<?php echo $item->id; ?>);"><?php echo JText::_("COM_STUDENTS_DELETE_ITEM"); ?></a>
										<form id="form-table-delete-<?php echo $item->id; ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_students&task=table.remove'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
											<input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>" />
											<input type="hidden" name="jform[ordering]" value="<?php echo $item->ordering; ?>" />
											<input type="hidden" name="jform[state]" value="<?php echo $item->state; ?>" />
											<input type="hidden" name="jform[checked_out]" value="<?php echo $item->checked_out; ?>" />
											<input type="hidden" name="jform[checked_out_time]" value="<?php echo $item->checked_out_time; ?>" />
											<input type="hidden" name="jform[created_by]" value="<?php echo $item->created_by; ?>" />
											<input type="hidden" name="jform[pib]" value="<?php echo $item->pib; ?>" />
											<input type="hidden" name="jform[general_info]" value="<?php echo $item->general_info; ?>" />
											<input type="hidden" name="jform[birth_date]" value="<?php echo $item->birth_date; ?>" />
											<input type="hidden" name="jform[gender]" value="<?php echo $item->gender; ?>" />
											<input type="hidden" name="jform[group]" value="<?php echo $item->group; ?>" />
											<input type="hidden" name="jform[average_score]" value="<?php echo $item->average_score; ?>" />
											<input type="hidden" name="jform[number_student_book]" value="<?php echo $item->number_student_book; ?>" />
											<input type="hidden" name="jform[image]" value="<?php echo $item->image; ?>" />
											<input type="hidden" name="option" value="com_students" />
											<input type="hidden" name="task" value="table.remove" />
											<?php echo JHtml::_('form.token'); ?>
										</form>
									<?php
									endif;
								?>
							</li>
						<?php endif; ?>

<?php endforeach; ?>
        <?php
        if (!$show):
            echo JText::_('COM_STUDENTS_NO_ITEMS');
        endif;
        ?>
    </ul>
</div>
<?php if ($show): ?>
    <div class="pagination">
        <p class="counter">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </p>
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
<?php endif; ?>


									<?php if(JFactory::getUser()->authorise('core.create','com_students')): ?><a href="<?php echo JRoute::_('index.php?option=com_students&task=table.edit&id=0'); ?>"><?php echo JText::_("COM_STUDENTS_ADD_ITEM"); ?></a>
	<?php endif; ?>