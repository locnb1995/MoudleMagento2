<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 27-Apr-18
 * Time: 11:48 AM
 */

namespace Loc\Post\Controller\Adminhtml\Post;


use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Backend\App\Action;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Loc\Post\Model as Post;


class Creatpost  extends \Magento\Backend\App\Action
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
    protected $uploaderFactory;


    public function __construct(
        Action\Context $context,
        \Magento\MediaStorage\Model\File\UploaderFactory $uploaderFactory) {
        parent::__construct($context);
        $this->uploaderFactory = $uploaderFactory;
    }

    /**
     * @return $this|ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */

    public function execute()
    {
        // TODO: Implement execute() method.
        $this->_view->loadLayout();
        $this->_view->renderLayout();

        $data = $this->getRequest()->getParams();//var_dump($data);exit;

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $conn = $resource->getConnection();
        $tableName = $resource->getTableName('loc_post_post');
        //var_dump($data['image'][0]['name']);exit;
        if(!isset($data['id'])){
            $title = $data['title'];
            $des = $data['post_description'];
            $status = $data['status'];
            $image = $data['image'][0]['name'];
            $store_id = $data['store_id'][0];
            if($store_id == 0){
                $store_id = 1;
            }
            $sql = "Insert Into " . $tableName . " (title, post_description, image, status, store_id) Values ('".$title."','".$des."','".$image."','".$status."','".$store_id."')";
            $conn->query($sql);

            $action = 'Created at : '.date('Y-m-d H:i:s');
            $textDisplay = new \Magento\Framework\DataObject(array('text' => $action));
            $this->_eventManager->dispatch('loc_post_display_action', ['action_text' => $textDisplay]);

            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('*/*/index');
            return $resultRedirect;
        }else {
            $title = $data['title'];
            $des = $data['post_description'];
            $status = $data['status'];
            $store_id = $data['store_id'][0];
            if($store_id == 0){
                $store_id = 1;
            }

            $action = 'Updated at : '.date('Y-m-d H:i:s');
            $textDisplay = new \Magento\Framework\DataObject(array('text' => $data['id']));
            $this->_eventManager->dispatch('loc_post_display_action', ['id' => $textDisplay]);

            if(isset($data['image'][0]['name'])){
                $image = $data['image'][0]['name'];
                $sql = "UPDATE ".$tableName." SET title='$title',post_description='$des',image='$image',status='$status',store_id='$store_id' WHERE id=".$data['id'];
                $conn->query($sql);

                $resultRedirect = $this->resultRedirectFactory->create();
                $resultRedirect->setPath('*/*/index');
                return $resultRedirect;
            } else{
                $sql = "UPDATE ".$tableName." SET title='$title',post_description='$des',status='$status',store_id='$store_id' WHERE id=".$data['id'];
                $conn->query($sql);

                $resultRedirect = $this->resultRedirectFactory->create();
                $resultRedirect->setPath('*/*/index');
                return $resultRedirect;
            }

        }


    }

}