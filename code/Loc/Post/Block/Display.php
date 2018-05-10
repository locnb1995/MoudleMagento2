<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 24-Apr-18
 * Time: 3:32 PM
 */

namespace Loc\Post\Block;
use Magento\Store\Model\StoreManagerInterface;

class Display extends \Magento\Framework\View\Element\Template
{
    protected $_postFactory;
    protected $storeManager;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Loc\Post\Model\PostFactory $postFactory,
        StoreManagerInterface $storeManager
    )
    {
        $this->_postFactory = $postFactory;
        parent::__construct($context);
        $this->storeManager = $storeManager;
    }

    public function sayHello()
    {
        return __('Hello World');
    }

    public function getPostCollection(){
        $post = $this->_postFactory->create();
        $post1 = $post->getCollection();
        return $post1;
    }
    public function getMediaUrl()
    {
        $mediaUrl = $this->storeManager->getStore()
                ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA).'loc_post/files/tmp/';
        return $mediaUrl;
    }
    public function getStoreId(){
        return $this->storeManager->getStore()->getId();
    }
}