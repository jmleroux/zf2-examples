<?php

namespace MvcApplicationTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class IndexControllerTest extends AbstractHttpControllerTestCase
{
    public function setUp()
    {
        $this->setApplicationConfig(
            include 'config/application.config.php'
        );
        parent::setUp();
    }

    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('MvcApplication');
        $this->assertControllerName('MvcApplication\Controller\Index');
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('home');
    }

    public function testIndexActionResponse()
    {
        $this->dispatch('/');
        $response = $this->getResponse();
        $this->assertContains('<h1>Welcome to <span class="zf-green">Zend Framework 2</span></h1>', $response->getContent());
        $this->assertNotContains('unknown text', $response->getContent());
    }
}