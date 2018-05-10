<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 07-May-18
 * Time: 11:20 AM
 */

namespace Loc\Post\Model;

use Loc\Post\Model\ResourceModel\Post\CollectionFactory;
use Magento\Store\Model\StoreManagerInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param CollectionFactory $employeeCollectionFactory
     * @param array $meta
     * @param array $data
     */
    protected $loadedData;
    protected $storeManager;
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $postCollectionFactory,
        StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $postCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->storeManager = $storeManager;
    }

    /**
     * Get data
     *
     * @return array
     */

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();
        foreach ($items as $item) {
            $_data = $item->getData();
            $item->load($item->getId());
            //var_dump($item->getImagePath());exit;
            if (isset($_data['image'])) {
                $image = [];
                $_data['image'] = $image;
            }
            $item->setData($_data);
            $this->loadedData[$item->getId()] = $_data;
        }
        /*foreach ($items as $model) {
            $this->loadedData[$model->getId()] = $model->getData();
            //var_dump($model->getImage());exit;
            if ($model->getImage()) {
                $m['image'][0]['name'] = $model->getImage();
                $m['image'][0]['url'] = $this->getMediaUrl().$model->getImage();
                $fullData = $this->loadedData;
                $this->loadedData[$model->getId()] = array_merge($fullData[$model->getId()], $m);
            } else {
                $this->loadedData[$model->getId()] = $model->getData();
            }
        }*/
        //var_dump($this->loadedData);exit;
        return $this->loadedData;
    }
    public function getMediaUrl()
    {
        $mediaUrl = $this->storeManager->getStore()
                ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA).'loc_post/files/tmp/';
        return $mediaUrl;
    }

}