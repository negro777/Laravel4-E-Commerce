<?php


class Order extends Eloquent  {


	protected $fillable = array('address', 'city', 'county', 'post_code', 'card_name', 'card_number', 'card_expire', 'card_csv');

	public static $rules = array(
		'address'=>'required|min:3|max:255',

		'city'=>'required|min:3|max:80|alpha',

		'county'=>'required|min:3|max:80|alpha',

		'post_code'=>'required|min:6|max:8|alpha_num',

		'card_name'=>'required|min:3|max:80',

		'card_number'=>'required|digits:16|integer',

		'card_expire'=>'required|digits:4|integer',
		
		'card_csv'=>'required|digits:3|integer'
	);


}