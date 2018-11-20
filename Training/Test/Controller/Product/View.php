<?php
namespace Training\Test\Controller\Product;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class View extends \Magento\Catalog\Controller\Product\View
{
    private $redirectFactory;
    
    protected $customerSession;

    protected $viewHelper;

    protected $resultForwardFactory;

    protected $resultPageFactory;

    public function __construct(
        Context $context,
        \Magento\Catalog\Helper\Product\View $viewHelper,
        \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory,
        PageFactory $resultPageFactory,
        \Magento\Framework\Controller\Result\RedirectFactory $redirectFactory,
        \Magento\Customer\Model\Session $customerSession
    ) {
        $this->viewHelper = $viewHelper;
        $this->resultForwardFactory = $resultForwardFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->redirectFactory = $redirectFactory;
        $this->customerSession = $customerSession; 
        parent::__construct($context,
                            $viewHelper,
                            $resultForwardFactory,
                            $resultPageFactory);
    }

    
    public function execute()
    {
       if (!$this->customerSession->isLoggedIn()) {
                    return $this->redirectFactory->create()->setPath('customer/account/login');
       }
        return parent::execute();
    }
}