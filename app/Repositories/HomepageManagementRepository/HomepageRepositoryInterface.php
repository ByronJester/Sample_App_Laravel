<?php

namespace App\Repositories\HomepageManagementRepository;

interface HomepageRepositoryInterface {
	/**
	 * Create Post
	 *
	 * @param  Object $request
	 * @return boolean
	 * @method POST
	 * 
	 */
	public function createPost($request);


	/**
	 * Get All Post
	 *
	 * @param
	 * @return array
	 * @method GET
	 *
	 */
	public function getPosts();
}