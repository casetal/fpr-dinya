<? require_once 'top.php'; ?>





<script type="text/javascript">

	$(document).ready(function()

	{

		  function cart_update(product_id, action)

		  {

			 var product_current = $(document).find('tr.bask_row[product_id='+product_id+']');

			 

			 if(action != 'remove')

			 {

								 

				 // обновляем количество текущего продукта

				 var quantity_input = $(product_current).find('input.quantity');

				 var quantity_total = parseInt( $(quantity_input).val() );

				 

				 if(action == 'plus')

				 {

					 quantity_total = quantity_total + 1;

					 var cart_quantity = parseInt( $('span#cart_quantity').text() ) + 1;

					 $('span#cart_quantity').text( cart_quantity )

				 }

				 else if(action == 'minus')

				 {

					 quantity_total = quantity_total - 1;

					 var cart_quantity = parseInt( $('span#cart_quantity').text() ) - 1;

					 $('span#cart_quantity').text( cart_quantity )

					 

					 // alert( quantity_total );

					 

					 if(quantity_total == 0)

					 {

						 product_delete( product_id );

						 $(product_current).remove();

						 var action = 'remove';

					 }

				 }

				 

				 if(action != 'remove')

				 {

					 // обновляем данные на сервере

					 $.ajax({

								url: '/cart/update',

								data: {product_id: product_id, quantity: quantity_total},

								method: 'POST',

								dataType : "json",                   

								success: function (response)

								{

								}

							});



					 

					 quantity_input.val( quantity_total );					 





					 // высчитываем цену текущего продукта

					 var product_price_input = $(product_current).find('input.product_price');

					 var product_price		 = parseFloat( $(product_price_input).val() );

					 var total_price 		 = product_price * quantity_total;

					 if(!Number.isInteger( total_price ))

					 {

						total_price         = total_price.toFixed(2);
					 }

								 

					 var product_price_total_input = $(product_current).find('td.bask_col_price');

					 $(product_price_total_input).text( total_price );

				 }				 

			 }

			 else

			 {

				 $(product_current).remove();

			 }

				

				

			 // обновляем общую цену продуктов

			 var total_price = 0;

			 

			 $('td.bask_col_price').each(function()

			 {

				var product_price_total = parseFloat ( $(this).text() );

					total_price = total_price + product_price_total;				 				 

			 });

			 

			 if(!Number.isInteger( total_price ))

			 {

				total_price = total_price.toFixed(2);

			 }

			 		

			 $('span#price_total').text( total_price );

		  }

		  

		  

		 

          $('input.quantity').change(function()

		  {

			 cart_update($(this), 'change');			 		

			 return false;

		  });

		 

		 

		  $('button.cart_plus').click(function()

		  {

			 var product_id = $(this).closest('tr.bask_row').attr('product_id');

			 

			 cart_update(product_id, 'plus');			 		

			 return false;

		  });

		  

		  

		  $('button.cart_minus').click(function()

		  {

			 var product_id = $(this).closest('tr.bask_row').attr('product_id');

			 

			 cart_update(product_id, 'minus');			 		

			 return false;

		  });



		  $('.product_delete').click(function()

		  {

				var product_id = $(this).closest('tr.bask_row').attr('product_id');

				product_delete( product_id );

		  });

		  

		  function product_delete(product_id)

		  {

			  var product_current = $(document).find('tr.bask_row[product_id='+product_id+']');

			  

			  $.ajax({

						url: '/cart/delete',

						data: {product_id: product_id},

						method: 'POST',

						dataType : "json",                   

						success: function (response)

						{

							cart_update(product_id, 'remove');

						}

					 });

			  

			  return false;			  

			  

		  };

		  

	});

</script>

		


        

        









<div class="table-responsive vislinkreg">

<form action="/cart/checkout" method="post">    

	<div class="shopping-cart">
							<div class="row" style="margin: 0;padding: 0 -15px">
								<div class="col-md-12">
									<div class="cart-title">
										<h2 class="entry-title">Shopping Cart</h2>
									</div>
									<!-- Start Table -->
									<div class="table-responsive" style="overflow-x: hidden">
										<table class="table table-bordered">
											<thead>
												<tr>
													<td class="text-center">Image</td>
													<td class="text-left">Item</td>
													<td class="text-left">Quantity</td>
													<td class="text-right">In stock</td>
													<td class="text-right">Price</td>
												</tr>
											</thead>
											<tbody>
        

		<? foreach($cart['products'] as $product): ?>

						

			<tr product_id="<?=$product['id']?>" class="bask_row">

								

				<td class="bask_col_foto">

					<a href="/product/<?=$product['id']?>-<?=$product['name_url']?>">

						<img src="/data/images/thumb/<?=$product['id']?>.jpg" class="img-thumbnail" alt="Foto">

					</a>

				</td>

				

				<td class="bask_col_artic">

					<a href="/product/<?=$product['id']?>-<?=$product['name_url']?>">

						<?=$product['name']?>

					</a>

				</td>

				

				<td class="bask_col_menge">    

					<div class="bask_col_menge_cont">

						<!--<div class="bask_col_menge_left">

							<button class="cart_minus baskBig_SpritImgMinus baskBig_ImgMinus">

						</div>

						<div class="bask_col_menge_right">

							<button onclick="return false;" class="cart_plus baskBig_SpritImgPlus baskBig_ImgPlus">

						</div>

						<div class="bask_col_menge_center">

							<input type="text" name="product[<?=$product['id']?>][quantity]" value="<?=$product['quantity']?>" class="quantity bask_col_menge_center_text">

						</div>-->

						<input class="form-control quantity bask_col_menge_center_text" name="product[<?=$product['id']?>][quantity]" value="<?=$product['quantity']?>" type="number" placeholder="1" /><br>
						<div class="input-group-btn cart-buttons">
							<div class="btn btn-primary debbug-hide" data-toggle="tooltip" title="Update">
																	<i class="fa fa-refresh"></i>
							</div>
							<div class="btn btn-danger product_delete" data-toggle="tooltip" title="Remove">
																	<i class="fa fa-times-circle"></i>
							</div>
						</div>

						

						<div class="clearfix"></div>			

					</div>



				</td>

				<td class="bask_col_verfug">        

					<span>Available within 24 hours</span>

				</td>

				

				<input type="hidden" class="product_id"    value="<?=$product['id']?>">

				<input type="hidden" class="product_price" value="<?=$product['price']?>">

				

				<td class="bask_col_price"><?=$product['price'] * $product['quantity']?></td>

			</tr>

			

		<? endforeach; ?>

    </tbody>

    </table>



<!-- </form> -->

</div>
</div>




									<h3 class="title-group-3 gfont-1 debbug-hide">What would you like to do next?</h3>
									<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
									<!-- Accordion start -->
									<div class="accordion-cart debbug-hide">
										<div class="panel-group" id="accordion">
											<!-- Start Coupon -->
											<div class="panel panel_default">
												<div class="panel-heading">
													<h4 class="panel-title">
														<a class="accordion-trigger" data-toggle="collapse" data-parent="#accordion" href="#coupon">Use Coupon Code<i class="fa fa-caret-down"></i> </a>
													</h4>
												</div>
												<div id="coupon" class="collapse in">
													<div class="panel-body">
														<div class="col-sm-2">
															<p>Enter your coupon here</p>
														</div>
														<div class="input-group">
															<input class="form-control" type="text" placeholder="Enter your coupon here" />
															
															<button id="ID_GutschAdd" valye="add" type="submit" class="btn btn-primary">Apply Coupon</button>
														</div>
													</div>
												</div>
											</div>
											<!-- End Coupon -->
										</div>
									</div>




<div class="row">
										<div class="col-sm-4 col-sm-offset-8">
											<table class="table table-bordered">
												<tbody>
													<tr>
														<td class="text-right">
															<strong>Sub-Total:</strong>
														</td>
														<td class="text-right"><?=$cart['price_total']?> EUR</td>
													</tr>
													<tr>
														<td class="text-right">
															<strong>Total:</strong>
														</td>
														<td class="text-right"><?=$cart['price_total']?> EUR</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="shopping-checkout">
										<button type="submit" id="idZurKasse" value="" class="btn btn-primary pull-right">Checkout
										</button>
										
									</div>
<br>

</div>

        </div>

    </div>

    

</form>        

</div>

    </div>

    



</div>



	



<? require_once 'bottom.php'; ?>