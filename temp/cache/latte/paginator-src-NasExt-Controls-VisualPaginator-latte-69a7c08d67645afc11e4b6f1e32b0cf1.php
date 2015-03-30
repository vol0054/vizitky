<?php
// source: /var/www/html/vizitky/vendor/nasext/visual-paginator/src/NasExt/Controls/VisualPaginator.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('7523397817', 'html')
;
// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIMacros::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
?>
<div class="visualPaginator">
	<ul class="pagination">
<?php if ($paginator->isFirst()) { ?>
			<li class="disabled"><span>«</span></li>
<?php } else { ?>
			<li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link($handle, array('page' => $paginator->page - 1)), ENT_COMPAT) ?>
"<?php if ($_l->tmp = array_filter(array($isAjax ? 'ajax' : NULL))) echo ' class="' . Latte\Runtime\Filters::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>«</a></li>
<?php } ?>

<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Latte\Runtime\CachingIterator($steps) as $step) { if ($step == $paginator->page) { ?>
				<li class="active"><span><?php echo Latte\Runtime\Filters::escapeHtml($step, ENT_NOQUOTES) ?></span></li>
<?php } else { ?>
				<li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link($handle, array('page' => $step)), ENT_COMPAT) ?>
"<?php if ($_l->tmp = array_filter(array($isAjax ? 'ajax' : NULL))) echo ' class="' . Latte\Runtime\Filters::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>
><?php echo Latte\Runtime\Filters::escapeHtml($step, ENT_NOQUOTES) ?></a></li>
<?php } if ($iterator->nextValue > $step + 1) { ?>
				<li><span>...</span></li>
<?php } $iterations++; } array_pop($_l->its); $iterator = end($_l->its) ?>

<?php if ($paginator->isLast()) { ?>
			<li class="disabled"><span>»</span></li>
<?php } else { ?>
			<li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link($handle, array('page' => $paginator->page + 1)), ENT_COMPAT) ?>
"<?php if ($_l->tmp = array_filter(array($isAjax ? 'ajax' : NULL))) echo ' class="' . Latte\Runtime\Filters::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>>»</a></li>
<?php } ?>
	</ul>
</div>

