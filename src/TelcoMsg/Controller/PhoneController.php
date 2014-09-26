<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace TelcoMsg\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * TelcoMsg\Controller\PhoneController
 *
 * @package TelcoMsg\Controller
 */
class PhoneController extends AbstractActionController
{
    public function inboxAction()
    {
        //USE Message service to retrieve messages
        
        $messages = [
            [
                'id'=> "213",
                'contact_number'=> "09170000000",
                'short_message'=> "Inbox text message",
                'date_received'=> "2014-03-20 5:13:32",                
                'is_deleted'=> "0",
                'is_read'=> "0"
            ],
            [
                'id'=> "231",
                'contact_number'=> "09170000001",
                'short_message'=> "Hi there",
                'date_received'=> "2014-03-20 5:13:32",
                'is_deleted'=> "0",
                'is_read'=> "0"
            ],
        ];
        
        return new ViewModel(['messages' => $messages]);
    }
    
    public function replyToAction()
    {
        
    }
}
