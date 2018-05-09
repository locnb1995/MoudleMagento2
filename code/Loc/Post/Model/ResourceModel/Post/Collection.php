<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 24-Apr-18
 * Time: 2:59 PM
 */

namespace Loc\Post\Model\ResourceModel\Post;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Loc\Post\Model\Post', 'Loc\Post\Model\ResourceModel\Post');
    }
}