<?php
namespace app\components\db;

class Connection extends \yii\db\Connection
{
    /**
     * @see \yii\db\Connection::createCommand
     */
    public function createCommand($sql = null, $params = [])
    {
        $this->open();
        $command = new Command([ // ʹ���˼̳���֮���Command��..
            'db' => $this,
            'sql' => $sql,
        ]);

        return $command->bindValues($params);
    }
}