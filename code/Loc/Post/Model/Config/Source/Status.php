<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 07-May-18
 * Time: 9:28 AM
 */

namespace Loc\Post\Model\Config\Source;


use Magento\Framework\Option\ArrayInterface;

class Status implements ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => '1', 'label' => __('Enable')],
            ['value' => '0', 'label' => __('Disable')],
        ];
    }
}