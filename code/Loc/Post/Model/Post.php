<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 24-Apr-18
 * Time: 2:54 PM
 */

namespace Loc\Post\Model;


class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{

    /**
     * Return unique ID(s) for each object in system
     *
     * @return string[]
     */
    const CACHE_TAG = 'loc_post_post';

    protected $_cacheTag = 'loc_post_post';

    protected $_eventPrefix = 'loc_post_post';

    protected function _construct()
    {
        $this->_init('Loc\Post\Model\ResourceModel\Post');
    }
    
    public function getIdentities()
    {
        // TODO: Implement getIdentities() method.
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }

}