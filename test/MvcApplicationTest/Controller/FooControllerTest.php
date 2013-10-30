<?php

namespace MvcApplicationTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class FooControllerTest extends AbstractHttpControllerTestCase
{
    public function setUp()
    {
        /** @noinspection PhpIncludeInspection */
        $this->setApplicationConfig(
            include 'config/application.config.php'
        );
        parent::setUp();
    }

    public function testIndexActionCanBeAccessedWithDefaultRoute()
    {
        $this->dispatch('/application/foo');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('MvcApplication');
        $this->assertControllerName('MvcApplication\Controller\Foo');
        $this->assertControllerClass('FooController');
        $this->assertMatchedRouteName('application/default');
    }

    public function testIndexActionCanBeAccessedWithOwnRoute()
    {
        $this->dispatch('/examples/foo');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('MvcApplication');
        $this->assertControllerName('MvcApplication\Controller\Foo');
        $this->assertControllerClass('FooController');
        $this->assertMatchedRouteName('foo');
    }

    public function testIndexActionResponse()
    {
        $this->dispatch('/application/foo');
        $response = $this->getResponse();
        $this->assertContains('Another controller', $response->getContent());
        $this->assertNotContains('unknown text', $response->getContent());
    }
}