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
use OCP\Share;

/**
 * Class Sharing logs the sharing actions
 *
 * @package OCA\Admin_Audit_DB\Actions
 */
class Sharing extends Action {
	/**
	 * Logs sharing of data
	 *
	 * @param array $params
	 */
	public function shared(array $params) {
		if($params['shareType'] === Share::SHARE_TYPE_LINK) {
			$this->logDb('shared_link', null, $params);
		} elseif($params['shareType'] === Share::SHARE_TYPE_USER) {
			$this->logDb('shared_user', null, $params);
		} elseif($params['shareType'] === Share::SHARE_TYPE_GROUP) {
			$this->logDb('shared_group', null, $params);
		}
	}

	/**
	 * Logs unsharing of data
	 *
	 * @param array $params
	 */
	public function unshare(array $params) {
		if($params['shareType'] === Share::SHARE_TYPE_LINK) {
			$this->logDb('unshared_link', null, $params);
		} elseif($params['shareType'] === Share::SHARE_TYPE_USER) {
			$this->logDb('unshared_user', null, $params);
		} elseif($params['shareType'] === Share::SHARE_TYPE_GROUP) {
			$this->logDb('unshared_group', null, $params);
		}
	}

	/**
	 * Logs the updating of permission changes for shares
	 *
	 * @param array $params
	 */
	public function updatePermissions(array $params) {
		$this->logDb('permission_changed', null, $params);
	}

	/**
	 * Logs the password changes for a share
	 *
	 * @param array $params
	 */
	public function updatePassword(array $params) {
		$this->logDb('public_share_password_changed', null, $params);
	}

	/**
	 * Logs the expiration date changes for a share
	 *
	 * @param array $params
	 */
	public function updateExpirationDate(array $params) {
		$this->logDb('public_share_expiration_date_changed', null, $params);
	}

	/**
	 * Logs access of shared files
	 *
	 * @param array $params
	 */
	public function shareAccessed(array $params) {
		$this->logDb('shared_accessed', null, $params);
	}
}
