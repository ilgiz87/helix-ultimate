<?php
/**
 * @package Helix Ultimate Framework
 * @author JoomShaper https://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2021 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
*/

defined ('_JEXEC') or die();

use Joomla\CMS\Language\Text;

?>
<div class="p-2">
	<a href="javascript: void window.close()" title="<?php echo Text::_('COM_MAILTO_CLOSE_WINDOW'); ?>" class="close" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</a>

	<h2 class="mt-0">
		<?php echo Text::_('COM_MAILTO_EMAIL_SENT'); ?>
	</h2>
</div>
