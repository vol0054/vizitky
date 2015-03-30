<?php
// source: /var/www/html/vizitky/app/FrontModule/templates/Homepage/default.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('9057121770', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb2fb0fde5a4_content')) { function _lb2fb0fde5a4_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="container">
<div class="row">
    <div class="page-header">
	<div class="row">
	    <div class="col-md-10">
<div id="<?php echo $_control->getSnippetId('vyhledavani') ?>"><?php call_user_func(reset($_b->blocks['_vyhledavani']), $_b, $template->getParameters()) ?>
</div>		<input><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Search!"), ENT_COMPAT) ?>
">delej ty kurwo</a>
	    </div>
	    <div class="col-md-2">
		<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Card:new"), ENT_COMPAT) ?>
"> 
		    <button class="btn btn-success"> 
			<span class="glyphicon glyphicon-plus-sign"></span> Pridat vizitky
		    </button>
		</a>
		
		
		
	    </div>
	</div>
    
    </div>
<div id="<?php echo $_control->getSnippetId('results') ?>"><?php call_user_func(reset($_b->blocks['_results']), $_b, $template->getParameters()) ?>
</div><div id="<?php echo $_control->getSnippetId('cards') ?>"><?php call_user_func(reset($_b->blocks['_cards']), $_b, $template->getParameters()) ?>
</div>    
    <br>
                
</div>
<?php $_l->tmp = $_control->getComponent("vp"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ;
}}

//
// block _vyhledavani
//
if (!function_exists($_b->blocks['_vyhledavani'][] = '_lb84d743e305__vyhledavani')) { function _lb84d743e305__vyhledavani($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('vyhledavani', FALSE)
;$_l->tmp = $_control->getComponent("searchForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ;
}}

//
// block _results
//
if (!function_exists($_b->blocks['_results'][] = '_lbc91b02f2de__results')) { function _lbc91b02f2de__results($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('results', FALSE)
;if (isset($results)) { $iterations = 0; foreach ($results as $result) { ?>            <div id="naseptavac">
                <table class="wp-nap">

                    Zmrde!
		    <?php echo Latte\Runtime\Filters::escapeHtml($cards->surname, ENT_NOQUOTES) ?>

                </table>
            </div>
<?php $iterations++; } } 
}}

//
// block _cards
//
if (!function_exists($_b->blocks['_cards'][] = '_lb8143a28887__cards')) { function _lb8143a28887__cards($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('cards', FALSE)
;if (isset($cards)) { $iterations = 0; foreach ($cards as $card) { ?>	    <div class="col-md-4 portfolio-item" >
		<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link(":Front:Card:view", array($card->surname)), ENT_COMPAT) ?>
">
		    <img class="img-responsive" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>
/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($card->path), ENT_COMPAT) ?>" alt="">        
		    <h3><?php echo Latte\Runtime\Filters::escapeHtml($card->name, ENT_NOQUOTES) ?>
 <?php echo Latte\Runtime\Filters::escapeHtml($card->surname, ENT_NOQUOTES) ?></h3>
		</a>
		<h4>Project: <?php echo Latte\Runtime\Filters::escapeHtml($card->project, ENT_NOQUOTES) ?></h4>
		    <p><?php echo Latte\Runtime\Filters::escapeHtml($template->truncate($card->note, 200), ENT_NOQUOTES) ?></p>
	    </div>
<?php $iterations++; } } 
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