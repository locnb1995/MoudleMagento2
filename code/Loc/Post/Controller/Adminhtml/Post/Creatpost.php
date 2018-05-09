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
            $sql = "Insert Into " . $tableName . " (title, post_description, image, status) Values ('".$title."','".$des."','".$image."','".$status."')";
            $conn->query($sql);

            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('*/*/index');
            return $resultRedirect;
        }else {
            $title = $data['title'];
            $des = $data['post_description'];
            $status = $data['status'];
            if(isset($data['image'][0]['name'])){
                $image = $data['image'][0]['name'];
                $sql = "UPDATE ".$tableName." SET title='$title',post_description='$des',image='$image',status='$status' WHERE id=".$data['id'];
                $conn->query($sql);

                $resultRedirect = $this->resultRedirectFactory->create();
                $resultRedirect->setPath('*/*/index');
                return $resultRedirect;
            } else{
                $sql = "UPDATE ".$tableName." SET title='$title',post_description='$des',status='$status' WHERE id=".$data['id'];
                $conn->query($sql);

                $resultRedirect = $this->resultRedirectFactory->create();
                $resultRedirect->setPath('*/*/index');
                return $resultRedirect;
            }

        }


    }

}