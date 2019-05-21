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

}