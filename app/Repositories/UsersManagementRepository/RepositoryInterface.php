<?php

namespace App\Repositories\UsersManagementRepository;

interface RepositoryInterface {

	/**
	 * Description
	 *
	 * @param object $request
	 * @return boolean
	 * @method POST
	 * 
	 */
	public function createAccount($request);

	/**
	 * Description
	 *
	 * @param object $request
	 * @return array
	 * @method POST
	 * 
	 */
	public function loginAccount($request);
	
}