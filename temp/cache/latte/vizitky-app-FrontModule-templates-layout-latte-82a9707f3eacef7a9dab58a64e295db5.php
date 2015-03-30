<?php
// source: /var/www/html/vizitky/app/FrontModule/templates/@layout.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('4671936092', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lb3115c9a473_head')) { function _lb3115c9a473_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block _flashes
//
if (!function_exists($_b->blocks['_flashes'][] = '_lb904ca313b1__flashes')) { function _lb904ca313b1__flashes($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('flashes', FALSE)
;$iterations = 0; foreach ($flashes as $flash) { ?>		<div class="flash <?php echo Latte\Runtime\Filters::escapeHtml($flash->type, ENT_COMPAT) ?>">
		    <div class="container">
			<?php echo Latte\Runtime\Filters::escapeHtml($flash->message, ENT_NOQUOTES) ?>

			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			</button>
		    </div>
		</div>		
<?php $iterations++; } 
}}

//
// block scripts
//
if (!function_exists($_b->blocks['scripts'][] = '_lbc1cebbb55a_scripts')) { function _lbc1cebbb55a_scripts($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/nette.ajax.js" type="text/javascript"></script>
	<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/jquery.min.js" type="text/javascript"></script>	
        <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/main.js" type="text/javascript"></script>
        <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/bootstrap.min.js" type="text/javascript"></script>
        
<?php
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
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title><?php if (isset($_b->blocks["title"])) { ob_start(); Latte\Macros\BlockMacros::callBlock($_b, 'title', $template->getParameters()); echo $template->striptags(ob_get_clean()) ?>
 | <?php } ?>Nette sandbox</title>

	
       <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/jquery.js" type="text/javascript"></script>
        
        <link  rel="stylesheet" media="screen" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/bootstrap.min.css">
        <link  rel="stylesheet" media="screen" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/index.css">
        
	<link rel="shortcut icon" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicona.ico">
        
	<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['head']), $_b, get_defined_vars())  ?>

</head>

<body>
	<script> document.documentElement.className+=' js' </script>
	
	<div class="wrapper">
	    
<?php $_l->tmp = $_control->getComponent("navigation"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>
	    
<div id="<?php echo $_control->getSnippetId('flashes') ?>"><?php call_user_func(reset($_b->blocks['_flashes']), $_b, $template->getParameters()) ?>
</div>		
<?php Latte\Macros\BlockMacros::callBlock($_b, 'content', $template->getParameters()) ?>
	    
        </div>
	
<?php call_user_func(reset($_b->blocks['scripts']), $_b, get_defined_vars())  ?>
</body>
</html>
