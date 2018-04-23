<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 23-Apr-18
 * Time: 9:13 AM
 */

namespace LocNb\Turtorial\Controller\Index;

use \Magento\Framework\App\Action\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;


class Index extends Action
{

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        // TODO: Implement execute() method.
        $page = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}