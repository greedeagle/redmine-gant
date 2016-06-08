<?php

use Fuel\Core\Model;

class Model_MBook extends Model
{
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('title', 'Title', 'required|max_length[255]');
		$val->add_field('content', 'Content', 'required');

		return $val;
	}

	/**
	 * DBより本のリストを取得。Bookid未指定の場合、すべてを返す
	 */
	public static function getBookList($bookid)
	{

		$sql = 'SELECT
					bookid,name,isbn
				FROM
					booklist
				';
		$where = "";
		if(!is_null($bookid))
		{
			$where = ' WHERE bookid = :bookid';
		}

		$query = DB::query($sql.$where);


		$result = $query->parameters(array('bookid'=> $bookid))->execute()	->as_array();

		#var_dump(\DB::last_query());
		#exit();
		return $result;
	}
	/**
	 * DBより本のリストを登録
	 */
	public static function insertBookList($bookname,$isbn)
	{
		$result = DB::insert('booklist')->set(array
				(
						'name'	=> $bookname,
						'isbn'		=> $isbn
				))->execute();

		return $result;
	}
	/**
	 * DBより本のリストを更新
	 */
	public static function updateBookList($bookid,$params)
	{
		$query = DB::update('booklist');

		if(isset($params['name']))
		{
			$query = $query->value('name',$params['name']);
		}
		if(isset($params['isbn']))
		{
			$query = $query->value('isbn',$params['isbn']);
		}
		$query = $query->where('bookid','=',$bookid);

		$result = $query -> execute();
				return $result;
	}
	/**
	 * DBより本のリストを削除
	 */
	public static function deleteBookList($bookid)
	{
		$query = DB::delete('booklist');
		$query = $query->where('bookid','=',$bookid);

		$result = $query -> execute();
		return $result;
	}
}
