<?php

/**
 * The MIT License
 *
 * Copyright (c) 2014, Gab Amba <gamba@gabbydgab.com>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace TelcoMsgTest;

/**
 * TelcoMsgTest\ConfigTest
 *
 * @package TelcoMsgTest
 */
class ConfigTest extends \PHPUnit_Framework_TestCase
{
    protected $moduleConfig;
    protected $controllerConfig;    
    protected $servicesConfig;
    protected $routesConfig;


    public function setUp()
    {
        $this->moduleConfig =  require __DIR__ . "/../../config/module.config.php";
        $this->controllerConfig = require __DIR__ . "/../../config/controllers.config.php";
        $this->servicesConfig = require __DIR__ . "/../../config/services.config.php";
        $this->routesConfig = require __DIR__ . "/../../config/routes.config.php";
    }
    
    public function getModuleConfigKeys()
    {
        return [
            ['telcomsg'],
            //Add more here
        ];
    }


    public function getControllerConfigKeys()
    {
        return [
            ['factories'],
            ['abstract_factories'],
            ['aliases'],
            ['invokables']
        ];
    }
    
    public function getServiceConfigKeys()
    {
        return [
            ['factories'],
            ['abstract_factories'],
            ['aliases'],
            ['shared'],
            ['invokables'],
            ['services']
        ];
    }
    
    public function getHttpRoutesConfigKeys()
    {
        return [
            ['msg-inbox']
        ];
    }

    /**
     * 
     * @dataProvider getModuleConfigKeys
     */
    public function validateModuleConfigKeyOptions($key)
    {
        $this->assertArrayHasKey(
                $key,
                $this->moduleConfig,
                "Missing key '{$key}' in module.config.php"
        );
    }
    
    /**
     * @test
     * @dataProvider getControllerConfigKeys
     */
    public function validateControllerConfigKeyOptions($key)
    {
        $this->assertArrayHasKey(
                $key,
                $this->controllerConfig,
                "Missing key '{$key}' in controllers.config.php"
        );
    }
    
    /**
     * @test
     * @dataProvider getServiceConfigKeys
     */
    public function validateServiceConfigKeyOptions($key)
    {
        $this->assertArrayHasKey(
                $key,
                $this->servicesConfig,
                "Missing key '{$key}' in ". __NAMESPACE__ . "/config/services.config.php"
        );
    }
    
    /**
     * @test
     * @dataProvider getHttpRoutesConfigKeys
     */
    public function validateHttpRoutesConfigKeyOptions($key)
    {
        $this->assertArrayHasKey(
                'router', 
                $this->routesConfig, 
                "Missing 'router' (parent) config"
        );
        $this->assertArrayHasKey(
                'routes', 
                $this->routesConfig['router'],
                "Missing 'routes' handler config"
        );
        
        $this->assertArrayHasKey(
                $key,
                $this->routesConfig['router']['routes'],
                "Missing key '{$key}' in ". __NAMESPACE__ . "/config/routes.config.php"
        );
    }
}
