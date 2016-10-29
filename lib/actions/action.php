<?php
/**
 * @copyright Copyright (c) 2016 Lukas Reschke <lukas@statuscode.ch>
 *
 * @author Lukas Reschke <lukas@statuscode.ch>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
namespace OCA\Admin_Audit_DB\Actions;

use \DateTime;
use OCP\Db;
use OCP\ILogger;
use \OCA\Admin_Audit_DB\Db\AdminAuditDB;
use \OCA\Admin_Audit_DB\Db\AdminAuditDBMapper;

class Action {
	private $db;
	private $logger;

	/**
	 * @param ILogger $logger
	 */
	public function __construct(ILogger $logger) {
		$this->logger = $logger;
		$this->db = \OC::$server->getDb();
		$this->adminAuditDBMapper = new AdminAuditDBMapper($this->db);
	}

	public function logDb($type, $uid, $params) {
		$now = new DateTime();

		if(\OCP\User::isLoggedIn() && !$uid) {
			$uid = \OCP\User::getDisplayName();
		}

		$auditItem = new AdminAuditDB();
		$auditItem->setUid($uid);
		$auditItem->setType($type);
		$auditItem->setTime($now->format('Y-m-d H:i:s'));
		$auditItem->setParams(json_encode($params));

		if (isset($params['path'])) $auditItem->setFilename($params['path']);

		$this->adminAuditDBMapper->insert($auditItem);
	}
}
