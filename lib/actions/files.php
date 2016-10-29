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

/**
 * Class Files logs the actions to files
 *
 * @package OCA\Admin_Audit_DB\Actions
 */
class Files extends Action {
	/**
	 * Logs file read actions
	 *
	 * @param array $params
	 */
	public function read(array $params) {
		$this->logDb('file_accessed', null, $params);
	}

	/**
	 * Logs rename actions of files
	 *
	 * @param array $params
	 */
	public function rename(array $params) {
		$this->logDb('file_renamed', null, $params);
	}

	/**
	 * Logs creation of files
	 *
	 * @param array $params
	 */
	public function create(array $params) {
		$this->logDb('file_created', null, $params);
	}

	/**
	 * Logs copying of files
	 *
	 * @param array $params
	 */
	public function copy(array $params) {
		$this->logDb('file_copied', null, $params);
	}

	/**
	 * Logs writing of files
	 *
	 * @param array $params
	 */
	public function write(array $params) {
		$this->logDb('file_written', null, $params);
	}

	/**
	 * Logs update of files
	 *
	 * @param array $params
	 */
	public function update(array $params) {
		$this->logDb('file_updated', null, $params);
	}

	/**
	 * Logs deletions of files
	 *
	 * @param array $params
	 */
	public function delete(array $params) {
		$this->logDb('file_deleted', null, $params);
	}
}
