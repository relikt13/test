<?php
namespace Training\Test\Controller\Action;

class Index extends \Magento\Framework\App\Action\Action
{
/**
* @var \Magento\Framework\Controller\Result\RawFactory
*/
private $resultRawFactory;
/**
* @var \Magento\Framework\View\LayoutFactory
*/
private $layoutFactory;
/**
* @param \Magento\Backend\App\Action\Context $context
* @param \Magento\Framework\Controller\Result\RawFactory $resultRawFactory
* @param \Magento\Framework\View\LayoutFactory $layoutFactory
*/
public function __construct(
                        \Magento\Backend\App\Action\Context $context,
                        \Magento\Framework\Controller\Result\RawFactory $resultRawFactory,
                        \Magento\Framework\View\LayoutFactory $layoutFactory
                            )
    {
        $this->layoutFactory = $layoutFactory;
        $this->resultRawFactory = $resultRawFactory;
        parent::__construct($context);
    }

public function execute()
    {
        $layout = $this->layoutFactory->create();
        $block = $layout->createBlock('Training\Test\Block\Test');
        $block->setTemplate('test.phtml');
        /** @var \Magento\Framework\Controller\Result\Raw $resultRaw */
        $resultRaw = $this->resultRawFactory->create();
        return $resultRaw->setContents($block->toHtml());
    }
}