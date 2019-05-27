<?php

namespace App\Repositories\ProfileManagementRepository;

interface ProfileRepositoryInterface {

	/**
	 * Description
	 *
	 * @param object $request
	 * @return boolean
	 * @method POST
	 * 
	 */
	public function setupProfile($request, $id);

	/**
	 * Description
	 *
	 * @param int $request
	 * @return array
	 * @method HEAD|GET
	 * 
	 */
	public function checkUser($id);

	/**
	 * Description
	 *
	 * @param int && array $request
	 * @return boolean
	 * @method PUT|PATCH
	 * 
	 */
	public function updateUserProfile($request, $id);

	/**
	 * Description
	 *
	 * @param int $request
	 * @return boolean
	 * @method DELETE
	 * 
	 */
	public function deleteProfile($id);
}