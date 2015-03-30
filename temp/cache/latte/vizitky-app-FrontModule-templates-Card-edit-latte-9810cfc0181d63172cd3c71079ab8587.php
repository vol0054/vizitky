<?php
// source: /var/www/html/vizitky/app/FrontModule/templates/Card/edit.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('2960177372', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbff88e6caef_content')) { function _lbff88e6caef_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="container">
    <div class="page-header">
	<div class="row">
		<div class="col-md-10">	    
		    <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("#"), ENT_COMPAT) ?>
"> <button class="btn btn-default"> <span class="glyphicon glyphicon-arrow-left"></span> Zpet </button> </a>
		</div>
		<div class="col-md-2">
		    <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(""), ENT_COMPAT) ?>
"> 
		    <button class="btn btn-info"> 
			<span class="glyphicon glyphicon-pencil"></span> upravit
		    </button>
		</a>
		</div>
	    </div>
    </div>
    
<?php $_l->tmp = $_control->getComponent("newCard"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>
    
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
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 