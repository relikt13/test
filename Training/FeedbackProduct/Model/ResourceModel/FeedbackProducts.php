<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 21.01.2019
 * Time: 23:11
 */

namespace Training\FeedbackProduct\Model\ResourceModel;


class FeedbackProducts extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('training_feedback_product', 'row_id');
    }
    public function saveProductRelations($feedbackId, $productIds)
    {
        $savedProductIds = $this->loadProductRelations($feedbackId);
        $productIdsToAdd = array_diff($productIds, $savedProductIds);
        $productIdsToDelete = array_diff($savedProductIds, $productIds);
        $dataToAdd = [];
        foreach ($productIdsToAdd as $productId) {
            $dataToAdd[] = ['feedback_id' => $feedbackId, 'product_id' => $productId];
        }
        $this->getConnection()->insertMultiple($this->getTable('training_feedback_product'), $dataToAdd);
        $this->getConnection()->delete(
            $this->getTable('training_feedback_product'),
            ['feedback_id = ?' => $feedbackId, 'product_id IN (?)' => $productIdsToDelete]
        );
        return $this;
    }
    public function loadProductRelations($feedbackId)
    {
        $adapter = $this->getConnection();
        $select = $adapter->select()
            ->from($this->getTable('training_feedback_product'), 'product_id')
            ->where('feedback_id = ?', (int)$feedbackId);
        return $adapter->fetchCol($select);
    }
}