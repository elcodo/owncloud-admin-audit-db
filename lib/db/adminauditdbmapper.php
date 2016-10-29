<?php
// db/authormapper.php

namespace OCA\Admin_Audit_DB\Db;

use OCP\IDBConnection;
use OCP\AppFramework\Db\Mapper;

class AdminAuditDBMapper extends Mapper {
    protected $tableName = 'admin_audit_db';

    public function __construct(IDBConnection $db) {
        parent::__construct($db, $this->tableName);
    }

    /**
     * @throws \OCP\AppFramework\Db\DoesNotExistException if not found
     * @throws \OCP\AppFramework\Db\MultipleObjectsReturnedException if more than one result
     */
    public function find($id) {
        $sql = 'SELECT * FROM `*PREFIX*' . $this->tableName . '` ' .
            'WHERE `id` = ?';
        return $this->findEntity($sql, [$id]);
    }

    public function findAll($limit=null, $offset=null) {
        $sql = 'SELECT * FROM `*PREFIX*' . $this->tableName . '`';
        return $this->findEntities($sql, $limit, $offset);
    }
}
