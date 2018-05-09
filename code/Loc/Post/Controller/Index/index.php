<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 24-Apr-18
 * Time: 2:04 PM
 */

namespace Loc\Post\Controller\Index;


use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;

class index extends \Magento\Framework\App\Action\Action
{

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        // TODO: Implement execute() method.
        /*$page = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $page;*/
        return $this->_pageFactory->create();
    }
}