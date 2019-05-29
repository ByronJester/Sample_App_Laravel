<?php

namespace App\Repositories\HomepageManagementRepository;

interface HomepageRepositoryInterface {
	/**
	 * Create Post
	 *
	 * @param  Object $request
	 * @return Boolean
	 * @method POST
	 * 
	 */
	public function createPost($request);


	/**
	 * Get All Post
	 *
	 * @param
	 * @return Array
	 * @method GET
	 *
	 */
	public function getPosts($request);

	/**
	 * Delete Specific Post
	 *
	 * @param  Int
	 * @return Boolean
	 * @method DELETE
	 *
	 */
	public function deletePost($id);


	/**
	 * Edit Specific Post
	 *
	 * @param  Int && Object
	 * @return Boolean
	 * @method PATCH
	 *
	 */
	public function editPost($request, $id);

	/**
	 * Like Post
	 *
	 * @param  Object
	 * @return Boolean
	 * @method POST
	 *
	 */
	public function likePost($request);

}