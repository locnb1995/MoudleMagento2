<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 09-May-18
 * Time: 5:36 PM
 */

namespace Loc\Post\Observer;


use Magento\Framework\Event\Observer;

class ChangeDisplayAction implements \Magento\Framework\Event\ObserverInterface
{

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        // TODO: Implement execute() method.
        $displayText = $observer->getData('id');
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $conn = $resource->getConnection();
        $tableName = $resource->getTableName('loc_post_post');

        if($displayText != null){
            $id = $displayText->getText();
            $action = 'Updated at : '.date('Y-m-d H:i:s');
            $sql = "UPDATE ".$tableName." SET observer='$action' WHERE id=".$id;
            $conn->query($sql);
        } else{
            $displayText = $observer->getData('action_text');
            $ob = $displayText->getText();
            $action = 'Created at : '.date('Y-m-d H:i:s');
            $sql = "UPDATE ".$tableName." SET observer='$action' ORDER BY id DESC LIMIT 1";
            $conn->query($sql);
        }
        //var_dump($displayText->getText());exit;



        return $this;
    }
}