<?php
namespace Training\Xml\Controller\Page;

use \Magento\Framework\Exception\NoSuchEntityException;

class View extends \Magento\Cms\Controller\Page\View
{
    protected $pageRepository;
    private $layout;
    private $resultRawFactory;
    
    public function __construct(
                    \Magento\Framework\App\Action\Context $context,
                    \Magento\Framework\Controller\Result\ForwardFactory $resultForwardFactory,
                    \Magento\Cms\Api\PageRepositoryInterface $pageRepository,
                    \Magento\Framework\View\Layout $layout,
                    \Magento\Framework\Controller\Result\RawFactory $resultRawFactory
                        ) 
    {
        $this->layout = $layout;
        $this->resultRawFactory = $resultRawFactory;
        $this->pageRepository = $pageRepository;
        parent::__construct($context,$resultForwardFactory);
    }
    
    public function execute()
    {
        
        if ($this->getRequest()->isAjax()) {
                                $xml = $this->layout->generateXml();
                                var_dump($xml);
                    }
        return parent::execute();
    }
}
