<?php
/**
 * Created by PhpStorm.
 * User: nguye
 * Date: 26-Apr-18
 * Time: 3:34 PM
 */

namespace Loc\Post\Controller\Adminhtml\Post;


use Magento\Framework\App\ResponseInterface;

class Newpost extends \Magento\Backend\App\Action
{

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;
    protected $request;

    /**
     * Constructor
     *
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\App\Request\Http $request
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->request = $request;
    }

    /**
     * Load the page defined in view/adminhtml/layout/exampleadminnewpage_helloworld_index.xml
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function getIddata()
    {
        // use
        $this->request->getParams(); // all params
        return $this->request->getParam('id');
    }
    public function execute()
    {
        $a = $this->getIddata();
        //var_dump($a);exit;
        return  $resultPage = $this->resultPageFactory->create();
    }
}