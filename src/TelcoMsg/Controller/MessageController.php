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

namespace TelcoMsg\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * TelcoMsg\Controller\MessageController
 *
 * @package TelcoMsg\Controller
 */
class MessageController extends AbstractActionController
{
    protected $messages = [
                [
                    'id'=> "213",
                    'details' => [
                        'contact_number'=> "09170000000",
                        'message'=> "Inbox text message. Lorem ipsum dolor myatay aki",
                        'date_received'=> "2014-03-20 5:13:32",
                        'sender_name' => "Juan Dela Cruz"
                    ]
                ],
                [
                    'id'=> "231",
                    'details' => [
                        'contact_number'=> "09170000001",
                        'message'=> "Hi there. This is my first time.",
                        'date_received'=> "2014-03-20 5:13:32",
                        'sender_name' => "Juan Tamad"
                    ]
                ],
            ];
    
    public function newAction()
    {
        
    }
    
    public function viewAction()
    {
        $id = $this->params()->fromRoute('id');
        
        //USE Find by ID service
        foreach ($this->messages as $message) {
            if ($id == $message['id']) {
                return new ViewModel(['sms'=> $message['details']]);
            }
        }
    }
    
//    public function sendAction($recipients = [], $message)
//    {
//        return ['responses' => ['code'=> '401', 'message' => 'Request denied']];
//    }
//    
//    public function viewSentAction()
//    {
//        
//    }
}
