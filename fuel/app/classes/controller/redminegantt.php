<?php
/**
 * redmineガントチャート表示機能基本
*/

/**
 * The Welcome Controller.
*
* A basic controller example.  Has examples of how to set the
* response body and status.
*
* @package  app
* @extends  Controller
*/

class Controller_Regminegantt extends Controller
{
	/**
	 * index
	 *
	 * @access  public
	 * @return  Response
	 */
	public function action_index()
	{
		return Response::forge(View::forge('redminegantt/index'));
	}

}
