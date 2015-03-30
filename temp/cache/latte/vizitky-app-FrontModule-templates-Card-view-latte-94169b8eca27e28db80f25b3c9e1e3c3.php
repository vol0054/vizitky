<?php
// source: /var/www/html/vizitky/app/FrontModule/templates/Card/view.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('1201198124', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbf74fa19997_content')) { function _lbf74fa19997_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="container">
    <div class="row">
	<div class="page-header">
	    <div class="row">
		<div class="col-md-8">	    
		    <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage"), ENT_COMPAT) ?>
"> <button class="btn btn-default"> <span class="glyphicon glyphicon-arrow-left"></span> Zpet </button> </a>
		</div>
		<div class="col-md-2">
		    <div class="btn-group" role="group" aria-label="...">
			<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("edit", array($card->surname)), ENT_COMPAT) ?>
"> 
			    <button type="button" class="btn btn-primary"> 
				<span class="glyphicon glyphicon-pencil"></span> upravit
			    </button>
			</a>
			<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("delete", array($card->surname)), ENT_COMPAT) ?>
"> 
			<button type="button" class="btn btn-danger"> 
			    <span class="glyphicon glyphicon-remove"></span> Odebrat
			</button>
			</a>
		    </div>
		</div>
	    </div>
	</div>
	<div class="col-lg-12">
	    <img src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>
/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($card->path), ENT_COMPAT) ?>"> 
	    <?php echo Latte\Runtime\Filters::escapeHtml($card->name, ENT_NOQUOTES) ?>

	    <?php echo Latte\Runtime\Filters::escapeHtml($card->surname, ENT_NOQUOTES) ?>

	</div>
    </div>
</div><?php
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start();}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIMacros::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
?>

<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 