<?php
/**
 * @category    ClassyLlama
 * @copyright   Copyright (c) 2017 Classy Llama Studios, LLC
 */

namespace ClassyLlama\AvaTax\Model\ResourceModel;

class CreditMemo extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('avatax_sales_creditmemo', 'entity_id');
    }

    public function loadByParentId($creditMemoId){
        $table = $this->getMainTable();
        $where = $this->getConnection()->quoteInto("parent_id = ?", $creditMemoId);
        $sql = $this->getConnection()->select()->from($table,array('entity_id'))->where($where);
        $id = $this->getConnection()->fetchOne($sql);
        return $id;
    }
}
