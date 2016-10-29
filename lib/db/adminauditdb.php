<?php
namespace OCA\Admin_Audit_DB\Db;

use OCP\AppFramework\Db\Entity;

class AdminAuditDB extends Entity {
    protected $uid;
    protected $type;
    protected $time;
    protected $params;
    protected $filename;
}
