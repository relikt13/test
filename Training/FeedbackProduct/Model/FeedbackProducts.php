<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.01.2019
 * Time: 23:09
 */

namespace Training\FeedbackProduct\Model;


class FeedbackProducts
{
    private $feedbackDataLoader;
    private $feedbackProductsResource;
    public function __construct(
        \Training\FeedbackProduct\Model\FeedbackDataLoader $feedbackDataLoader,
        \Training\FeedbackProduct\Model\ResourceModel\FeedbackProducts $feedbackProductsResource
    ) {
        $this->feedbackDataLoader = $feedbackDataLoader;
        $this->feedbackProductsResource = $feedbackProductsResource;
    }
    public function loadProductRelations($feedback)
    {
        $productIds = $this->feedbackProductsResource->loadProductRelations($feedback->getId());
        return $this->feedbackDataLoader->addProductsToFeedbackByIds($feedback, $productIds);
    }
    public function saveProductRelations($feedback)
    {
        $productIds = [];
        $products = $feedback->getExtensionAttributes()->getProducts();
        foreach ($products as $product) {
            $productIds[] = $product->getId();
        }
        $this->feedbackProductsResource->saveProductRelations($feedback->getId(), $productIds);
        return $this;
    }
}