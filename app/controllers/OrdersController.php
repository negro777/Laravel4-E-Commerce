<?php

class OrdersController extends BaseController {

	public function __construct() {
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	public function postCreate() {

		$validator = Validator::make(Input::all(), Order::$rules);

		if ($validator->passes()) {
			$order = new Order;
			$order->address = Input::get('address');
			$order->city = Input::get('city');
			$order->county = Input::get('county');
			$order->post_code = Input::get('post_code');			
			$order->card_name = Input::get('card_name');
			$order->card_number = Input::get('card_number');
			$order->card_expire = Input::get('card_expire');
			$order->card_csv = Input::get('card_csv');			
			$order->first_name = Input::get('first_name');
			$order->last_name = Input::get('last_name');
			$order->email = Input::get('email');
			$order->products = Input::get('products');
			$order->total = Input::get('total');			
			$order->save();
			Cart::destroy();
			$order = Order::find(Input::get('id'));

			return Redirect::to('store/complete');
			
				
		}

		return Redirect::to('store/order')
			->with('message', 'Something went wrong')
			->withErrors($validator)
			->withInput();
	}


	
}