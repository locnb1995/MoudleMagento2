<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 09-May-18
 * Time: 10:54 AM
 */

namespace Loc\Post\Observer;


class ChangeDisplayText implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $displayText = $observer->getData('mp_text');
        echo $displayText->getText() . " - Event </br>";
        $displayText->setText('Execute event successfully.');

        return $this;
    }
}