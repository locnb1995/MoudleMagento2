<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 09-May-18
 * Time: 10:51 AM
 */

namespace Loc\Post\Controller\Index;


class Test extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $textDisplay = new \Magento\Framework\DataObject(array('text' => 'Loc'));
        $this->_eventManager->dispatch('loc_post_display_text', ['mp_text' => $textDisplay]);
        echo $textDisplay->getText();
        exit;
    }
}