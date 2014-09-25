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

namespace TelcoMsgTest\Controller;

/**
 * TelcoMsgTest\Controller\MessageControllerTest
 *
 * @package TelcoMsgTest\Controller
 */
class MessageControllerTest extends \PHPUnit_Framework_TestCase
{
    protected $controller;
    
    public function setUp()
    {
        $this->controller = new \TelcoMsg\Controller\MessageController();
    }
    
    /**
     * @test
     */
    public function cannotSendMessageWith401ResponseCode()
    {
        $mock = $this->getMockBuilder("TelcoMsg\Controller\MessageController")
                ->disableOriginalConstructor()->getMock();
        
        $mock->expects($this->any())
                ->method('sendAction')
                ->will($this->returnValue(['response'=> ['code'=> '401', 'message'=> 'Request denied.']]));
        
        $result = $mock->sendAction(['09173052588'], "test message");
        
        $this->assertArrayHasKey(
                'response',
                $result,
                "Missing key 'response' in TelcoMsg\Controller\MessageController::send() action"
        );
        
        $this->assertEquals($result['response']['code'], "401", "Something is wrong");
    }
}