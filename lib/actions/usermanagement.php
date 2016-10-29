<?php
/**
 * @copyright Copyright (c) 2016 Lukas Reschke <lukas@statuscode.ch>
 *
 * @author Bjoern Schiessle <bjoern@schiessle.org>
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
use OCP\IUser;

/**
 * Class UserManagement logs all user management related actions.
 *
 * @package OCA\Admin_Audit_DB\Actions
 */
class UserManagement extends Action {
	/**
	 * Log creation of users
	 *
	 * @param array $params
	 */
	public function create(array $params) {
		$this->logDb('user_created', null, $params);
	}

	/**
	 * Log deletion of users
	 *
	 * @param array $params
	 */
	public function delete(array $params) {
		$this->logDb('user_deleted', null, $params);
	}

	/**
	 * Logs changing of the user scope
	 *
	 * @param IUser $user
	 */
	public function setPassword(IUser $user) {
		if($user->getBackendClassName() === 'Database') {
			$this->logDb('password_changed', null, $params);
		}
	}
}
