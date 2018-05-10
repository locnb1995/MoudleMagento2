<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 28-Apr-18
 * Time: 10:13 AM
 */

namespace Loc\Post\Controller\Adminhtml\Post;


use Magento\Framework\App\ResponseInterface;

class Deletepost extends \Magento\Backend\App\Action
{

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    protected $resultRawFactory;

    public function __construct(\Magento\Backend\App\Action\Context $context) {
        parent::__construct($context);
    }


    public function execute()
    {
        // TODO: Implement execute() method.
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $conn = $resource->getConnection();
        $tableName = $resource->getTableName('loc_post_post');
        $data=$this->getRequest()->getPostValue();
        foreach ($data['selected'] as $value){
            $sql = "Delete FROM " . $tableName." Where id = ".$value;
            $conn->query($sql);
        }
        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('*/*/index');
        return $resultRedirect;


    }
}