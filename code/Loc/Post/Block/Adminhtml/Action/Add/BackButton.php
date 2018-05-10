<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 07-May-18
 * Time: 2:18 PM
 */

namespace Loc\Post\Block\Adminhtml\Action\Add;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;


class BackButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Back'),
            'on_click' => sprintf("location.href = '%s';", $this->getBackUrl()),
            'class' => 'back',
            'sort_order' => 10
        ];
    }

    /**
     * Get URL for back (reset) button
     *
     * @return string
     */
    public function getBackUrl()
    {
        return $this->getUrl('*/*/');
    }
}