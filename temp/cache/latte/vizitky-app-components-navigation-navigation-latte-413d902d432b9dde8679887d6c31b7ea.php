<?php
// source: /var/www/html/vizitky/app/components/navigation/navigation.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('0939731344', 'html')
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
<nav class="navbar navbar-default">
    <div class="container">
	<!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo Latte\Runtime\Filters::escapeHtml($_presenter->link("Homepage:"), ENT_COMPAT) ?>">Vizitky</a>
            </div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    <ul class="nav navbar-nav">
		    <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Sprava vizitek<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
			  <li><a href="#">Action</a></li>
			  <li><a href="#">Another action</a></li>
			  <li><a href="#">Something else here</a></li>
			  <li class="divider"></li>
			  <li><a href="#">Separated link</a></li>
			  <li class="divider"></li>
			  <li><a href="#">One more separated link</a></li>
			</ul>
		    </li>
		    <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Sprava vizitek<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
			  <li><a href="#">Action</a></li>
			  <li><a href="#">Another action</a></li>
			  <li><a href="#">Something else here</a></li>
			  <li class="divider"></li>
			  <li><a href="#">Separated link</a></li>
			  <li class="divider"></li>
			  <li><a href="#">One more separated link</a></li>
			</ul>
		    </li>
		    </ul>
		    
		</div>
		
	    
	</div>
    </div>
</nav>