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
	public function getPosts($request);

	/**
	 * Delete Specific Post
	 *
	 * @param  Int
	 * @return boolean
	 * @method DELETE
	 *
	 */
	public function deletePost($id);


	/**
	 * Edit Specific Post
	 *
	 * @param  Int && Object
	 * @return boolean
	 * @method PATCH
	 *
	 */
	public function editPost($request, $id);

}