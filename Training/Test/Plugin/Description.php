<?php
namespace Training\Test\Plugin;

class Description 
{
public function beforeToHtml(
                        \Magento\Catalog\Block\Product\View\Description $subject
                         )
    {
        $subject->getProduct()->setDescription('Test description');
    }
}