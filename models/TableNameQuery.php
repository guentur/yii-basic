<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TableName]].
 *
 * @see TableName
 */
class TableNameQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return TableName[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return TableName|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
