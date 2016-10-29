<?php
/**
 * @copyright Copyright (c) 2016 Bjoern Schiessle <bjoern@schiessle.org>
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


use OCA\Admin_Audit_DB\Actions\Action;
use OCP\IGroup;
use OCP\IUser;

/**
 * Class GroupManagement logs all group manager related events
 *
 * @package OCA\Admin_Audit_DB
 */
class GroupManagement extends Action {

	/**
	 * log add user to group event
	 *
	 * @param IGroup $group
	 * @param IUser $user
	 */
	public function addUser(IGroup $group, IUser $user) {
		$this->logDb('user_added_to_group', null, $params);
	}

	/**
	 * log remove user from group event
	 *
	 * @param IGroup $group
	 * @param IUser $user
	 */
	public function removeUser(IGroup $group, IUser $user) {
		$this->logDb('user_removed_from_group', null, $params);
	}

}
