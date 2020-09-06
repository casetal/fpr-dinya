<?
class frontend extends base
 { 	 
	 protected $category_all;
	 protected $shop_data;
	 protected $user;
	 
	 function _init()
	  {		  		 
		 // $this->_init_base();		 
		 $this->_load_data();
		 $this->_router_shop();
		 // $this->_router();
		 // $this->models['user']->login(6);
	  }
	 
	 function activate_account($code)
	 {
		 $result = $this->models['user']->activate($code);
		 
		 if($result['status'])
		 {
			$result['message'] = 'You have been activated!';
			
			$this->models['user']->login($result['user_id']);
			$this->user = $this->models['user']->get();
		 }
		 		 
		 $this->_show('frontend/message', $result);
	 }
	 
	 function register()
	 {
		 $data = [];
		 
		 if(!empty($_POST))
		 {
			 $result = $this->models['user']->add($_POST);
			 if($result['status'])
			 {
				 $this->models['user']->send_activation($result['user_id']);
			 }
			 
			 echo json_encode($result);
		 }
		 else
		 {
			$this->_show('frontend/register', $data);
		 }
	 }
	 
	 function login()
	 {
		 if(!empty($_POST))
		 {
			 $_POST['login'] 	= (isset($_POST['login']))   ? $_POST['login']    : '';
			 $_POST['password'] = (isset($_POST['password']))? $_POST['password'] : '';
			 $user_id           = $this->models['user']->auth($_POST['login'], $_POST['password']);
			 
			 if($user_id)
			 {
				$this->user = $this->models['user']->get($user_id);
				$this->_show('frontend/main');
			 }
			 else
			 {
				$data['error'] = 'user not found';
				$this->_show('frontend/login', $data); 
			 }
		 }
		 else
		 {
			 $this->_show('frontend/login'); 
		 }
		 
	 }
	 
	 function logout()
	 {
		 $this->models['user']->logout();
		 $this->user = false;	
		 $this->_show('frontend/login');		 
	 }
		 
	 function _router_shop()
	 {
		 $category_all = $this->models['category']->category_name_get_first_level();
		 		
		 $request_raw = (!empty($_GET['request_raw']))? $_GET['request_raw'] : '';
		 $request 	  = explode('/', $request_raw);
		 $action      = (!empty($request[0]))? $request[0] : '';
		 
		 foreach($request as $key=>$item) { if(empty($item)) unset($request[$key]); }
		 // unset($request[0]);
		 
		 // print_r($request); exit();
		 
		 // $args = (!empty($request))? array_values($request) : [];		 
		 $args = (!empty($request))? $request : [];
		 
		 // проверяем, является ли первый аргумент категорией
		 if(in_array($action, $category_all))
		 {
			 // формируем задачи для роутера
			 
			 $router = ['action' => 'category',
					    'args'   => $args];
			 // print_r($router); exit();
			 // echo 'категория: ';
			 $this->_router( $router );
		 }
		 else
		 {			 	 
			 // проверяем, является ли аргумент обращением к cart
			 if($action == 'cart')
			 {
				 if(!empty($args[1]))
				 {
					 // echo $args[0]; exit();
					 $action_cart = 'cart' . '_' . $args[1];
					 if(method_exists($this, $action_cart))
					 {
						 $action = $action_cart;
						 $router = ['action' => $action,
									'args'   => $args];
						 $this->_router( $router );
					 }
					 else
					 {
						 exit('404');
					 }
				 }
				 else
				 {
					 $this->cart();
				 }
			 }
			 else
			 {
				 // если первый аргумент не является категорией товара - вызываем основной роутер как обычно
				 $this->_router();
			 }
		 }
	 }
	 	 
	 function cart()
	 {
		 // print_r($_POST); 
		 
		 $data['cart'] = $this->models['cart']->get_full();
		 // print_r($data); exit();
		 $this->_show('frontend/cart', $data);
	 }
	 
	 function cart_checkout()
	 {
		 // формируем данные для покупки
		 $order_id = $this->models['order']->order_save();

		 $data['message'] = "Thank you for order! Your order number is #$order_id";
		 $this->_shop_data_update('cart_quantity', 0 );	
		
		 $this->_show('frontend/message', $data);
	 }
	 
	 function cart_add()
	 {	 	

		 // проверяем, заданы ли аргументы
		 if(!isset($_POST['product_id']))
		 {
			 exit('Недостаточно аргументов');
		 }


		 $this->models['cart']->product_add( $_POST['product_id'], $_POST['quantity'] );		 
		 $cart = $this->models['cart']->get_full();
		
		 $this->_shop_data_update('cart_quantity', $cart['quantity_total'] );			 
		 
		 echo json_encode( $cart );
		 
		 // $this->cart();
	 }
	 
	 function cart_update()
	 {
		 // print_r($_POST);
		 
		 $this->models['cart']->product_update( (int)$_POST['product_id'], (int)$_POST['quantity'] );
		 echo json_encode([]);
	 }
	 
	 function cart_delete()
	 {
		 // echo $_POST['product_id']; exit();
		 $this->models['cart']->product_delete( (int)$_POST['product_id'] );
		 $data['cart_quantity'] = $this->models['cart']->get_product_quantity();
		 $this->_shop_data_update('cart_quantity', $data['cart_quantity'] );

		 echo json_encode([]);
	 }
	 
	 function _shop_data_update($var, $value)
	 {
		 $this->shop_data[$var] = $value;
	 }
	 
	 function products_in_category_ajax()
	 {
		
		 // $this->models['category']->filter_save( $_POST );
														
		 $result['products'] = $this->models['product']->product_get_by_category(
																					(int)$_POST['category_id'], 
																					(int)$_POST['per_page'], 
																					(int)$_POST['recursive'],
																					(int)$_POST['price_min'],
																					(int)$_POST['price_max'],
																					(int)$_POST['sort_by']
																				 );
		 
		 $result['price_min'] = $this->models['product']->product_min_price((int)$_POST['category_id'], (int)$_POST['recursive']);
		 $result['price_max'] = $this->models['product']->product_max_price((int)$_POST['category_id'], (int)$_POST['recursive']);
		 
		 // print_r($result);
				 
		 echo json_encode($result);
	 }
	 
	 function filter_save_ajax()
	 {
		 print_r($_POST); exit();
	 }
	 
	 function product()
	 {
		 // получаем ID продукта
		 $product_id = explode( '-', $this->args[0] )[0];
		 
		 $data['product'] = $this->models['product']->get($product_id);
		 
		 if(!$data['product']) { exit('404: Product not found'); }
		 
		 // получаем продукты той же категории
		 $data['products_additional'] = $this->models['product']->product_get_by_category( $data['product']['category_id'], 10 );
		 $data['products_additional'] = $this->models['product']->product_filter_from_result( $data['products_additional'], $data['product']['id'] );
		 
		 // print_r( $data['products_additional'] );
		 
		 $this->_show('frontend/product', $data);		 
	 }
	 
	 function category()
	 {
		 // $filter = $this->models['category']->filter_get();
		 // print_r($filter); exit();
		 
		 // $all = $this->models['category']->get_data('category_all');
		 // print_r($all); exit();
		 
		 // получаем минимальную и максимальную цену продукта
		 
		 // print_r($this->args);
		 $data['category'] = $this->models['category']->category_get_by_name( $this->args );
		 if(!$data['category']) exit('404 - категория не найдена');
		 
		
		 $data['product_min_price'] = $this->models['product']->product_min_price($data['category']['id']);
		 $data['product_max_price'] = $this->models['product']->product_max_price($data['category']['id']);
		 
		 foreach($data['category']['tree'] as $item) $data['category_ids_checked'][] = $item['id'];
		
		 // получаем список категорий для левого столбца
		 $data['category_left_menu'] = $this->models['category']->left_menu_get( $this->args );
		 // print_r( $data['category_left_menu'] ); exit();
		 
		 // получаем продукты
		 $data['products'] = $this->models['product']->product_get_by_category( $data['category']['id'] );		
		 
		 $this->_show('frontend/category', $data);
	 }
	 
	 function main()
	 {         
		 // $category_model = new model_category;
		 // $data['category_all'] = $this->category_all;
		 // print_r($category_all);
		 // print_r($_SESSION); exit();
		 $data['products_for_main'] = $this->models['product']->products_for_main();
		 $data['products_latest']   = $this->models['product']->latest();
		 $data['products_sale']     = $this->models['product']->random_get(15);
		 $data['products_random']   = $this->models['product']->random_get(15);
		 
		 // $data = [];
		 $this->_show('frontend/main', $data);
	  }	 
	  

	  
	  
	 function _load_data()
	 {
		$this->_load_models(['category','product','cart','order','user']);
		// $this->_load_controllers(['cart']);
		$GLOBALS['controllers']['frontend'] = $this;
		
		$this->user = $this->models['user']->get();
		
		$this->shop_data['cart_quantity'] = $this->models['cart']->get_product_quantity();
		$this->shop_data['cart'] 		  = $this->models['cart']->get_full();		
		
		
		
		// print_r( $this->shop_data['cart'] ); exit();
		
		// $this->shop_data['cart_quantity'];
		
		// $this->_lang_load( $this->model->lang_get() );
		
		$this->category_all = $this->models['category']->get_data('category_all');		
		
		// print_r( $this->category_all ); exit();
		
	 }
 }

?>