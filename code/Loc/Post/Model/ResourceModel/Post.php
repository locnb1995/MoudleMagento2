<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 24-Apr-18
 * Time: 2:56 PM
 */

namespace Loc\Post\Model\ResourceModel;


class Post extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Resource initialization
     *
     * @return void
     */
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        // TODO: Implement _construct() method.
        $this->_init('loc_post_post', 'id');
    }
}