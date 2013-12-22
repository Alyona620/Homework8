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
?>
<script type="text/javascript">
    function deleteItem(item_id){
        if(confirm("<?php echo JText::_('COM_ADD_STUDENT_DELETE_MESSAGE'); ?>")){
            document.getElementById('form-studentform-delete-' + item_id).submit();
        }
    }
</script>

<div class="items">
    <ul class="items_list">
<?php $show = false; ?>
        <?php foreach ($this->items as $item) : ?>

            
				<?php
					if($item->state == 1 || ($item->state == 0 && JFactory::getUser()->authorise('core.edit.own',' com_add_student.studentform.'.$item->id))):
						$show = true;
						?>
							<li>
								<a href="<?php echo JRoute::_('index.php?option=com_add_student&view=studentform&id=' . (int)$item->id); ?>"><?php echo $item->pib; ?></a>
								<?php
									if(JFactory::getUser()->authorise('core.edit.state','com_add_student.studentform.'.$item->id)):
									?>
										<a href="javascript:document.getElementById('form-studentform-state-<?php echo $item->id; ?>').submit()"><?php if($item->state == 1): echo JText::_("COM_ADD_STUDENT_UNPUBLISH_ITEM"); else: echo JText::_("COM_ADD_STUDENT_PUBLISH_ITEM"); endif; ?></a>
										<form id="form-studentform-state-<?php echo $item->id ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_add_student&task=studentform.save'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
											<input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>" />
											<input type="hidden" name="jform[ordering]" value="<?php echo $item->ordering; ?>" />
											<input type="hidden" name="jform[state]" value="<?php echo (int)!((int)$item->state); ?>" />
											<input type="hidden" name="jform[checked_out]" value="<?php echo $item->checked_out; ?>" />
											<input type="hidden" name="jform[checked_out_time]" value="<?php echo $item->checked_out_time; ?>" />
											<input type="hidden" name="jform[pib]" value="<?php echo $item->pib; ?>" />
											<input type="hidden" name="jform[general]" value="<?php echo $item->general; ?>" />
											<input type="hidden" name="jform[birthday]" value="<?php echo $item->birthday; ?>" />
											<input type="hidden" name="jform[gender]" value="<?php echo $item->gender; ?>" />
											<input type="hidden" name="jform[group]" value="<?php echo $item->group; ?>" />
											<input type="hidden" name="jform[average]" value="<?php echo $item->average; ?>" />
											<input type="hidden" name="jform[book]" value="<?php echo $item->book; ?>" />
											<input type="hidden" name="jform[photo]" value="<?php echo $item->photo; ?>" />
											<input type="hidden" name="option" value="com_add_student" />
											<input type="hidden" name="task" value="studentform.save" />
											<?php echo JHtml::_('form.token'); ?>
										</form>
									<?php
									endif;
									if(JFactory::getUser()->authorise('core.delete','com_add_student.studentform.'.$item->id)):
									?>
										<a href="javascript:deleteItem(<?php echo $item->id; ?>);"><?php echo JText::_("COM_ADD_STUDENT_DELETE_ITEM"); ?></a>
										<form id="form-studentform-delete-<?php echo $item->id; ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_add_student&task=studentform.remove'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
											<input type="hidden" name="jform[id]" value="<?php echo $item->id; ?>" />
											<input type="hidden" name="jform[ordering]" value="<?php echo $item->ordering; ?>" />
											<input type="hidden" name="jform[state]" value="<?php echo $item->state; ?>" />
											<input type="hidden" name="jform[checked_out]" value="<?php echo $item->checked_out; ?>" />
											<input type="hidden" name="jform[checked_out_time]" value="<?php echo $item->checked_out_time; ?>" />
											<input type="hidden" name="jform[created_by]" value="<?php echo $item->created_by; ?>" />
											<input type="hidden" name="jform[pib]" value="<?php echo $item->pib; ?>" />
											<input type="hidden" name="jform[general]" value="<?php echo $item->general; ?>" />
											<input type="hidden" name="jform[birthday]" value="<?php echo $item->birthday; ?>" />
											<input type="hidden" name="jform[gender]" value="<?php echo $item->gender; ?>" />
											<input type="hidden" name="jform[group]" value="<?php echo $item->group; ?>" />
											<input type="hidden" name="jform[average]" value="<?php echo $item->average; ?>" />
											<input type="hidden" name="jform[book]" value="<?php echo $item->book; ?>" />
											<input type="hidden" name="jform[photo]" value="<?php echo $item->photo; ?>" />
											<input type="hidden" name="option" value="com_add_student" />
											<input type="hidden" name="task" value="studentform.remove" />
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
            echo JText::_('COM_ADD_STUDENT_NO_ITEMS');
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


									<?php if(JFactory::getUser()->authorise('core.create','com_add_student')): ?><a href="<?php echo JRoute::_('index.php?option=com_add_student&task=studentform.edit&id=0'); ?>"><?php echo JText::_("COM_ADD_STUDENT_ADD_ITEM"); ?></a>
	<?php endif; ?>