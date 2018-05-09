<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 02-May-18
 * Time: 2:10 PM
 */

namespace Loc\Post\Block\Adminhtml;


class Post extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_post';
        $this->_blockGroup = 'Loc_Post';
        $this->_headerText = __('Posts');
        $this->_addButtonLabel = __('New Post');
        parent::_construct();
    }
}