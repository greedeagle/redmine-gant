<?php

class Controller_api extends Controller_Rest
{

	protected $format = 'json';
	protected $no_data_status = 404;
	protected $no_method_status = 404;
   // HTTP メソッドが GET の場合
    public function get_book($bookid = null)
    {
		//DBから取得
        $list = Model_MBook::getBookList($bookid);

        // $this->responseに配列として設定する
       return $this->response($list);
    }
    // HTTP メソッドが POST の場合
    public function post_book()
    {
    	$name = Input::param('name');
    	$isbn = Input::param('isbn');

    	if(is_null($name) || '' == $name)
    	{
    		return $this->response(array(),400);

    	}
    	//DBから取得
    	$list = Model_MBook::insertBookList($name,$isbn);

    	// $this->responseに配列として設定する
    	return $this->response($list);
    }

    // HTTP メソッドが Update の場合
    // null指定は不可
    public function put_book($bookid = null)
    {
    	if(is_null($bookid))
    	{
    		return $this->response(null,400);
    	}
    	$param = Input::param();

    	//DB更新
    	$list = Model_MBook::updateBookList($bookid,$param);

    	// $this->responseに配列として設定する
    	return $this->response($list);
    }
    // HTTP メソッドが Update の場合
    // null指定は不可
    public function delete_book($bookid)
    {


    	//DB更新
    	$list = Model_MBook::deleteBookList($bookid);

    	// $this->responseに配列として設定する
    	return $this->response($list);
    }
}
