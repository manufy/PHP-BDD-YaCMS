<?php

include '/BDDCMS/Core/CoreCMS.class.php';

class DescribeWhenCreatingNewBDDCMS extends \PHPSpec\Context
{	
    private $BDDCMS;

	// ARRANGE parte of the Arrange-Act-Assert Pattern
	// Info at http://www.arrangeactassert.com/why-and-what-is-arrange-act-assert/
	// Here we define the CONTEXT for the specs
	// the Before function is first called when text executes
	
    public function Before()
    {
    	// ARRANGE all necessary preconditions and inputs. 
    	
    	// In this case, as a CMS, the input will be an URL
    	// Here we define the PHP Variables that "simulates"
    	// an URL request through any normal browser
    	
    	// Our CMS only will need this two "enironment" global variables to work as if
    	// were installed on any normal webserver wich php AKA Apache, ngnix ;)
    	
    	$_SERVER['REQUEST_URI'] = 'http:\\127.0.0.1\index.php';
		$_SERVER['SCRIPT_NAME'] = 'index.php';
		
		// Our index.php script will have only the instation of the CoreCMS class so
		// we only instantiate it
		// A typical index.php will look like this, the minimal code to work ;)
		//  index.php
		//	$iweb = new IWeb\Core\IWeb();
		//	$iweb->route();
		//
		// All URL requests that are not 200 OK are rerouted to indexphp by an 
		// apache .htaccess that looks like:
		// (I use xampp in this example, in the rewriterule)
		// Options +FollowSymLinks
		// IndexIgnore */*
		//    # Turn on the RewriteEngine
		//    RewriteEngine On
		//    #  Rules
		//    RewriteCond %{REQUEST_FILENAME} !-f
		//    RewriteCond %{REQUEST_FILENAME} !-d
		//	  RewriteRule ^(.*)\?*$ /xampp/iweb3/index.php?_route_=$1 [L,QSA]
		
		// ACT, common for all itShould... functions
		// In this context, WhenCreatingANewBDDCMD, we only will test the correct
		// component creation. If we need more complex Specs, we will need to create 
		// new DescribeWhatever... classes 
		
        $this->CoreCMS = new BDDCMS\Core\CoreCMS();
    }
		
	public function itShouldBeAnBehaviourDrivenDesignContentManagementSystem() {
		
		// ACT on the object or method under test.
		// We execute the SUT (System Under Test) here
		
		$act = $this->spec($this->CoreCMS);
		
		// ASSERT that the expected results have occurred
		
		$act->should->beAnInstanceOf('BDDCMS\Core\CoreCMS');	

	}
	
/*	public function itShouldCreateAndInitializeRainTemplateEngineOnBootStrap() {
		$this->spec($this->CoreCMS->TemplateEngine )->should->beAnInstanceOf('RainTPL'); 
	}
	
	public function itShouldCreateAndInitializeDoctrineEngineOnBootStrap() {
		$this->spec($this->CoreCMS->DoctrineEntityManager )->should->beAnInstanceOf('Doctrine\ORM\EntityManager');
		$this->spec($this->CoreCMS->DoctrineEventManager )->should->beAnInstanceOf('Doctrine\Common\EventManager'); 
		$this->spec($this->CoreCMS->DoctrineClassLoader )->should->beAnInstanceOf('Doctrine\Common\ClassLoader'); 		 
	}
	
	public function itShouldConfigureTemplatesOrmAndUri() {
		$this->spec($this->CoreCMS->NombreVista)->should->equal($_SERVER['SCRIPT_NAME'] );
		$this->spec($this->CoreCMS->RequestURI)->should->equal($_SERVER['REQUEST_URI']);
	}*/
}
?>
