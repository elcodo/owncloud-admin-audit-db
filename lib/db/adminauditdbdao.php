<?php
namespace OCA\Admin_Audit_DB\Db;
use OCP\IDBConnection;

class AdminAuditDBDAO {
    private $db;
    protected $tableName = 'admin_audit_db';

    public function __construct(IDBConnection $db) {
        $this->db = $db;
    }

    public function find($id) {
        $sql = 'SELECT * FROM `*PREFIX*' . $this->tableName . '` ' .
            'WHERE `id` = ?';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        $stmt->execute();

        $row = $stmt->fetch();

        $stmt->closeCursor();
        return $row;
    }
}
