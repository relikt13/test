<?php
namespace Training\Feedback\Model\ResourceModel;
class Feedback extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('training_feedback', 'feedback_id');
    }

    public function getAllFeedbackNumber()
    {
        $adapter = $this->getConnection();
        $select = $adapter->select()
            ->from('training_feedback', new \Zend_Db_Expr('COUNT(*)'));
        return $adapter->fetchOne($select);
    }
    public function getActiveFeedbackNumber()
    {
        $adapter = $this->getConnection();
        $select = $adapter->select()
            ->from('training_feedback', new \Zend_Db_Expr('COUNT(*)'))
            ->where('is_active = 1', \Training\Feedback\Model\Feedback::STATUS_INACTIVE);
        return $adapter->fetchOne($select);
    }
}