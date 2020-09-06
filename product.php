<? // print_r($product); exit(); ?>

<? require_once 'top.php'; ?>

<? // print_r($product); exit(); ?>

<script type="text/javascript">



  $(document).ready(function()

  {

	  $('a#idMoreClicker').click(function()

	  {

		 if($('div#idMoreView').is(":visible"))

		 {

			$('div#idMoreView').hide();

		 }

		 else

		 {

			 $('div#idMoreView').show();

		 }

		 

		 return false;

	  });

	  

	  $('button#id2Bask').click(function()

	  {

		  var post = $('form#detailsForm').serialize();

		  

		  // отправляем товар в корзину через аякс

		  $.ajax({

			        url: '/cart/add',

					data: post,

					method: 'POST',

					dataType : "json",                   

					success: function (response)

					{
						$('span#cart_quantity').text( response['quantity_total'] );
						$('span.top-cart-price, .total .amount').text( response['price_total'] + " EUR" );
						
						$('.mini-cart-list').empty();
						
						$.each(response['products'], function( index, product ) {
						$('.mini-cart-list').append('<div class="cart-img-details"><div class="cart-img-photo"><a href="#"><img src="/data/images/thumb/' + product['id'] + '.jpg" alt="' + product['name'] + '"></a></div><div class="cart-img-content"><a href="#"><h4>' + product['name'] + '</h4></a><span><strong class="text-right">' + product['quantity'] + ' x</strong><strong class="cart-price text-right">' + product['price'] + ' EUR</strong></span></div></div>');
						
						});
						$('div#thank_you_message').show();

					},
					error: function() {
						alert('bad');
					}

				 });		  

		  

		  return false;

	  });

	  

	  $('button#cart_plus').click(function()

	  {

		 var quantity_total = parseInt($('input#quantity').val()) + 1;

		 $('input#quantity').val( quantity_total );

		 // var price_total = $('span#price_total').val();

		 // alert( price_total );

		 

		 return false;

	  });

	  

	  

	  $('button#cart_minus').click(function()

	  {

		 var quantity_total = parseInt($('input#quantity').val());

		 

		 if( quantity_total > 1 )

		 {

			var quantity_total = quantity_total - 1;

			$('input#quantity').val( quantity_total );

		 }

		 		 

		 

		 return false;

	  });

	  

  });

</script>


<div class="toch-prond-area" style="padding: 10px 0;">

							<div class="row">
								<div class="col-md-5 col-sm-5 col-xs-12">
									<div class="clear"></div>
									<div class="tab-content">
										<!-- Product = display-1-1 -->
										<div role="tabpanel" class="tab-pane fade in active" id="display-1">
											<div class="row">
												<div class="col-xs-12">
													<div class="toch-photo">
														<a href="#"><img src="/data/images/full/<?=$product['id']?>.jpg" data-imagezoom="true" alt="#" /></a>
													</div>
												</div>
											</div>
										</div>

										<!-- End Product = display-1-4 -->
									</div>
									<!-- Start Toch-prond-Menu -->
									<div class="toch-prond-menu">
										<ul role="tablist">
											<li role="presentation" class=" active"><a href="#display-1" role="tab" data-toggle="tab"><img src="/data/images/thumb/<?=$product['id']?>.jpg" alt="#" /></a></li>
										</ul>
									</div>
									<!-- End Toch-prond-Menu -->
								</div>
								<? // print_r($product); exit(); ?>
								
								<div class="col-md-7 col-sm-7 col-xs-12">
									<h2 class="title-product"><?=$product['name']?></h2>
									<div class="about-toch-prond">
										<p class="debbug-hide">
											<span class="rating">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</span>
											<a href="#">1 reviews</a>
											/
											<a href="#">Write a review</a>
										</p>
										<hr class="debbug-hide" />
										<p class="short-description debbug-hide">Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Vivamus adipiscing nisl ut dolor dignissim semper. Nul... </p>
										<hr />
										<span class="current-price"><?=$product['price']?> EUR</span>
										<span class="item-stock debbug-hide">Availability: <span class="text-stock">In Stock</span></span>
									</div>
									<form id="detailsForm" class="form-horizontal" method="post" action="/cart/add" novalidate="novalidate">
									<input type="hidden" name="product_id" value="<?=$product['id']?>">
									<div class="about-product debbug-hide">
									
										<div class="product-select product-color">
											<label><sup>*</sup>Color</label>
											<select class="form-control">
												<option> --- Please Select --- </option>
												<option>Black (+$10.00) </option>
												<option>White (+$8.00)</option>
												<option>Pink (+$30.00)</option>
												<option>Green (+$30.00)</option>
											</select>
										</div>
										<div class="product-select product-Size">
											<label><sup>*</sup>Size</label>
											<select class="form-control">
												<option> --- Please Select --- </option>
												<option>Small (+$10.00)</option>
												<option>Medium (+$20.00)</option>
												<option>Large (+$30.00)</option>
												<option>Extra Large (+$35.00)</option>
											</select>
										</div>
										<div class="product-select product-type">
											<label><sup>*</sup>Text</label>
											<input type="text"  class="form-control" placeholder="Text"/>
										</div>
										<div class="product-select product-date">
											<label><sup>*</sup>Date</label>
											<input type="text"  class="form-control" placeholder="2016/02/15"/>
										</div>
										<div class="product-select product-checkbox">
											<label><sup>*</sup>Checkbox</label>
											<label><input type="checkbox" /> Checkbox 1  (+$5.00)</label>
										</div>
										<div class="product-select product-button">
											<button type="submit" >
												<i class="fa fa-calendar"></i>
											</button>
										</div>
									</div>
									<div class="product-quantity">
										<span>Qty</span>
										<input class="bask_col_menge_center_text" data-val="true" data-val-length="#lbl4StringLen" data-val-length-max="10" data-val-regex="#EingabeFehler" data-val-regex-pattern="^[0-9]*$" id="quantity" name="quantity" onchange="document.getElementById('Clicker').click();" type="text" value="1">
										<!--input id="quantity" type="number" placeholder="1" /-->
										<button type="submit" id="id2Bask" class="toch-button toch-add-cart">Add to Cart</button>
										<button type="submit" class="toch-button toch-wishlist debbug-hide">wishlist</button>
										<button type="submit" class="toch-button toch-compare debbug-hide">Compare</button>
										<br>
										<div style="color: lime; display: none;" id="thank_you_message">Thank you for purchase!</div>
								
									</div>
									</form>
								</div>
							</div>
							<!-- Start Toch-Box -->
							<div class="toch-box">
								
								<div class="row">
									<div class="col-xs-12">
										<!-- Start Toch-Menu -->
										<div class="toch-menu">
											<ul role="tablist">
												<li role="presentation" class=" active"><a href="#description" role="tab" data-toggle="tab">Description</a></li>
												<li class="debbug-hide" role="presentation"><a href="#reviews" role="tab" data-toggle="tab">Reviews (1)</a></li>
											</ul>
										</div>
										<!-- End Toch-Menu -->
										<div class="tab-content toch-description-review">
											<!-- Start display-description -->
											<div role="tabpanel" class="tab-pane fade in active" id="description">
												<div class="row">
													<div class="col-xs-12">
														<div class="toch-description">
															<?=$product['description']?>
														</div>
													</div>
												</div>
											</div>
											<!-- End display-description -->
											<!-- Start display-reviews -->
											<div role="tabpanel" class="tab-pane fade" id="reviews">
												<div class="row">
													<div class="col-xs-12">
														<div class="toch-reviews">
															<div class="toch-table">
																<table class="table table-striped table-bordered">
																	<tbody>
																		<tr>
																			<td><strong>plaza theme</strong></td>
																			<td class="text-right"><strong>16/02/2016</strong></td>
																		</tr>
																		<tr>
																			<td colspan="2">
																				<p>It is part of Australia's network of offshore processing centres for irregular migrants who arrive by boat, and also houses New Zealanders facing deportation from Australia.</p>
																				<span><i class="fa fa-star"></i></span>
																				<span><i class="fa fa-star"></i></span>
																				<span><i class="fa fa-star"></i></span>
																				<span><i class="fa fa-star"></i></span>
																				<span><i class="fa fa-star-o"></i></span>
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
															<div class="toch-review-title">
																<h2>Write a review</h2>
															</div>
															<div class="review-message">
																<div class="col-xs-12">
																	<p><sup>*</sup>Your Name <br>
																		<input type="text" class="form-control" />
																	</p>
																	<p><sup>*</sup>Your Name <br>
																		<textarea class="form-control"></textarea>
																	</p>
																</div>
																<div class="help-block">
																	<span class="note">Note:</span>
																	 HTML is not translated!
																</div>
																<div class="get-rating">
																	<span><sup>*</sup>Rating </span>
																	Bad
																	<input type="radio" value="1" name="rating" />
																	<input type="radio" value="2" name="rating" />
																	<input type="radio" value="3" name="rating" />
																	<input type="radio" value="4" name="rating" />
																	<input type="radio" value="5" name="rating" />
																	Good
																</div>
																<div class="buttons clearfix">
																	<button class="btn btn-primary pull-right">Continue</button>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- End Product = display-reviews -->
										</div>
									</div>
								</div>
							</div>
							<!-- End Toch-Box -->
							<!-- START PRODUCT-AREA -->
							<div class="product-area">
							
								<div class="row">
									<div class="col-xs-12 col-md-12">
										<!-- Start Product-Menu -->
										<div class="product-menu">
											<div class="product-title">
												<h3 class="title-group-2 gfont-1">Related Products</h3>
											</div>
										</div>
									</div>
								</div>
								<!-- End Product-Menu -->
								<div class="clear"></div>
								<!-- Start Product -->
								<div class="product carosel-navigation">
									<div class="row">
										<div class="active-product-carosel">
											<? foreach($products_additional as $product): ?>
											<!-- Start Single-Product -->
											<div class="col-xs-12">
												<div class="single-product">
													<div class="product-img">
														<a href="/product/<?=$product['id']?>-<?=$product['name_url']?>">
															<img class="primary-img" src="/data/images/thumb/<?=$product['id']?>.jpg" alt="<?=$product['name']?>">
														</a>
													</div>
													<div class="product-description">
														<h5><a href="/product/<?=$product['id']?>-<?=$product['name_url']?>"><?=$product['name']?></a></h5>
														<div class="price-box">
															<span class="price"><?=$product['price']?> EUR</span>
														</div>
													</div>											
												</div>
											</div>
											<!-- End Single-Product -->
											<? endforeach ?>
										</div>
									</div>

								</div>
								<!-- End Product -->
							</div>
							<!-- END PRODUCT-AREA -->
						</div>
		
		
<? require_once 'bottom.php'; ?>