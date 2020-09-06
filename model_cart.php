<?
class model_cart extends model_base
{
	 function _init()
	 {
		 // session_start();
		 // unset($_SESSION['cart']);
		 // $this->clean();
		 if(!isset($_SESSION['cart'])) $this->clean();
		 
		 $this->_load_models(['product']);
	 }
	 	 
	  
	 function clean()
	 {
		 $_SESSION['cart'] = ['products' => []];
	 }
	 
	 
	 function get_full()
	 {
		 // получаем список продуктов в корзине
		 $products = [];
		 
		 foreach($_SESSION['cart']['products'] as $product_session)
		 {
			 $product_db = $this->models['product']->get( $product_session['product_id'] );
			 unset( $product_session['product_id'] );
			 $products[] = array_merge($product_session, $product_db);
		 }
		 
		 // подсчитываем общую цену корзины
		 $price    = 0;
		 $quantity = 0;
		 
		 foreach($products as $product)
		 {
			 $price    = $price + $product['price'] * $product['quantity'];
			 $quantity = $quantity + $product['quantity'];
		 }
		 
		 $data['price_total'] 	 = $price;
		 $data['quantity_total'] = $quantity;
		 $data['products']    	 = $products;
		 
		 return $data;
	 }
	 
	 function get_total_price()
	 {
		 $cart = $this->get_full();
		 return $cart['price_total'];
	 }
	 
	 function get_product_quantity()
	 {
		 $quantity = 0;
		 foreach($_SESSION['cart']['products'] as $product)
		 {
			 $quantity = $quantity + $product['quantity'];
		 }
		 
		 return $quantity;
	 }
	 
	 function product_update($product_id, $quantity )
	 {
		 foreach($_SESSION['cart']['products'] as $key=>&$product)
		 {
			 // print_r($product);
			 if($product['product_id'] == $product_id)
			 {
				 $product['quantity'] = $quantity;
			 }
		 }		 
	 }
	 
	 function product_delete($product_id)
	 {
		 foreach($_SESSION['cart']['products'] as $key=>$product)
		 {
			 // print_r($product);
			 if($product['product_id'] == $product_id)
			 {
				 unset($_SESSION['cart']['products'][$key]);
			 }
		 }
	 }
	 
	 function product_add($product_id, $quantity=1)
	 {
		 // print_r($_SESSION);
		 // print_r($data);
		 
		 
		 // проверяем есть ли такой продукт		 
		 $product = $this->models['product']->get( $product_id );
		 
		 if(!$product) { exit('404: Нет такого продукта'); }
		 
		 // проверяем есть ли такой продукт в корзине
		 if( $this->product_check_exists($product_id) )
		 {
			 // обновляем количество
			 $this->product_add_quantity($product_id, $quantity);
		 }
		 else
		 {
			 // вносим продукт в корзину, если его там нету
			 $_SESSION['cart']['products'][] = ['product_id' => (int)$product_id,
												'quantity'   => (int)$quantity];
		 }
		 
	 }
	 
	 function product_add_quantity($product_id, $quantity)
	 {
		 foreach($_SESSION['cart']['products'] as &$product)
		 {
			 if($product_id == $product['product_id'])
			 {
				 $product['quantity'] = (int)$product['quantity'] + (int)$quantity;
				 break;
			 }
		 }
	 }	 
	 
	 function product_check_exists($product_id)
	 {
		 foreach($_SESSION['cart']['products'] as $product)
		 {
			 if($product_id == $product['product_id'])
			 {
				 return true;
			 }
		 }
		
		return false;
	 }
}
?>