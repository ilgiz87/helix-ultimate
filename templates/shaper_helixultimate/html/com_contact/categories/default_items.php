<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\Component\Contact\Site\Helper\RouteHelper;

$lang  = Factory::getLanguage();

if ($this->maxLevelcat != 0 && count($this->items[$this->parent->id]) > 0) :
?>
	<?php foreach ($this->items[$this->parent->id] as $id => $item) : ?>
		<?php if ($this->params->get('show_empty_categories_cat') || $item->numitems || count($item->getChildren())) : ?>
			<div class="list-group-item">
				<div style="padding-<?php echo $lang->isRtl() ? 'right' : 'left' ?>: <?php echo (int) $this->level * 16; ?>px">
					<div class="d-flex justify-content-between align-items-center">
						<h5 class="m-0">
							<a href="<?php echo Route::_(RouteHelper::getCategoryRoute($item->id, $item->language)); ?>">
								<?php echo $this->escape($item->title); ?>
							</a>
						</h5>

						<?php if ($this->params->get('show_cat_num_articles_cat') == 1) :?>
							<span class="badge bg-primary rounded-pill">
								<?php echo Text::_('COM_CONTENT_NUM_ITEMS'); ?>
								<?php echo $item->numitems; ?>
							</span>
						<?php endif; ?>
					</div>

					<?php if ($this->params->get('show_subcat_desc_cat') == 1) : ?>
						<?php if ($item->description) : ?>
							<div class="mt-2">
								<?php echo HTMLHelper::_('content.prepare', $item->description, '', 'com_contact.categories'); ?>
							</div>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>
			<?php if (count($item->getChildren()) > 0 && $this->maxLevelcat > 1) : ?>
				<?php
					$this->items[$item->id] = $item->getChildren();
					$this->parent = $item;
					$this->maxLevelcat--;
					$this->level++;
					echo $this->loadTemplate('items');
					$this->parent = $item->getParent();
					$this->maxLevelcat++;
				?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>