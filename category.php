<? require_once 'top.php'; ?>

<style>
	.product_name {
text-overflow: ellipsis;
    overflow: hidden;

    white-space: nowrap;
    float: left;
    width: 160px;
	}
</style>

<input type="hidden" id="product_min_price" value="<?=$product_min_price?>">

			<input type="hidden" id="product_max_price" value="<?=$product_max_price?>">

			<input type="hidden" id="category_last"     value="<?=$category['id']?>">

			<input type="hidden" id="price_min_slider">

						<input type="hidden" id="price_max_slider">

			<script type="text/javascript" src="/views/frontend/js/articlist.js"></script>

			<script type="text/javascript">

				

					function update_products_ajax(category_id=false, recursive=false)

					{				
						var span 		= $('span.xpointer.selected').last();

						

						if(!category_id)

						{

							// получаем ID текущей выбранной категории

							// alert('no cat'); return false;

							category_id = $(span).attr('category_id');

						}

						

						if(recursive === false)

						{

							var sub_div   = $(this).parent('div').find('div.cgform_sub');

							

							recursive = 0;

							

							// проверяем, есть ли подпункты в указанном пункте

							if( $(sub_div).length == 1 ) { recursive = 1; }

							

							if( $(span).text() == 'All') { recursive = 1; }

						}

						

						

						var post = {

									  'category_id': category_id,

									  'recursive'  : recursive,

									  'price_min'  : $('input#price_min_slider').val(),

									  'price_max'  : $('input#price_max_slider').val(),

									  'per_page'   : $('.per_page_filter').val(),

									  'sort_by'    : $('select#sort_by_filter').val(),
									  'page' : page_num

								   };

									

						 //alert( category_id );

						

						// загружаем товары

						$.ajax({

									url: '/products_in_category_ajax',

									data: post,

									method: 'POST',

									dataType : "json",                   

									success: function (response)

									{				
										product_add( response['products'] );
										
										$('.pagination ul').empty();
										
										//pagination start
										if(page_num >= 3) {
												$('.pagination ul').append('<li><a class="page_num" data-page-num="1" href="#">|<</a></li>');
												
												
										}
										
										if(page_num >= 2)
													$('.pagination ul').append('<li><a class="page_num" data-page-num="' + (page_num - 1) + '" href="#"><</a></li>');
										
										if(response['page_max'] <= 5) {
											for(var i = 1; i < response['page_max'] + 1; i++) {
												
													
												if(i == page_num)
													$('.pagination ul').append('<li class="active"><a class="page_num" data-page-num="' + i + '" href="#">' + i + '</a></li>');
												else
													$('.pagination ul').append('<li><a class="page_num" data-page-num="' + i + '" href="#">' + i + '</a></li>');
											}
										} else {
											if(page_num - 1 >= 1)
												$('.pagination ul').append('<li><a class="page_num" data-page-num="' + (page_num - 1) + '" href="#">' + (page_num - 1) + '</a></li>');
											$('.pagination ul').append('<li class="active"><a class="page_num" data-page-num="' + page_num + '" href="#">' + page_num + '</a></li>');
											
											if(page_num + 1 <= response['page_max'])
												$('.pagination ul').append('<li><a class="page_num" data-page-num="' + (page_num + 1) + '" href="#">' + (page_num + 1) + '</a></li>');
										}
										
										if(page_num != response['page_max']) {
												if(page_num <= response['page_max'] - 1)
													$('.pagination ul').append('<li><a class="page_num" data-page-num="' + (page_num + 1) + '" href="#">></a></li>');
													if(page_num <= response['page_max'] - 2)
														$('.pagination ul').append('<li><a class="page_num" data-page-num="' + response['page_max'] + '" href="#">>|</a></li>');		
										}
										
										$('.current_page').text(page_num); //$('.per_page_filter').val()
										
										$('.from_count').text(Object.keys(response['products']).length == $('.per_page_filter').val() ? ((Object.keys(response['products']).length * page_num) + 1 - $('.per_page_filter').val()) : (($('.per_page_filter').val() * (page_num - 1)) + 1 ) );
										 
										$('.to_count').text(Object.keys(response['products']).length == $('.per_page_filter').val() ? Object.keys(response['products']).length * page_num : ($('.per_page_filter').val() * (page_num - 1)) + Object.keys(response['products']).length );
										//pagination end		
												

										if(category_id != $('input#category_last').val())

										{										

											$('input#category_last').val( category_id );

											

											if(response['price_min'] == 0 && response['price_max'] == 0)

											{

												$('div.filterPanel_slider').hide();

											}

											else

											{

												$('div.filterPanel_slider').show();

												slider_start( response['price_min'], response['price_max'] );

											}

										}

									},
									error: function(r) {
										console.log(r['responseText'])
									}

							   });								

					}				

				



					function product_add( products )

					{
						var template	  = $('div#product_template');
						
						var template_list	  = $('div#product_template_list');

						var product_table = $('div#products_table');
						
						var product_table_list = $('.listview');

						$(product_table).empty();
						$(product_table_list).empty();

						// return false;

						// alert( $(template).html() );

						

						$.each(products, function( index, product ) 

						{																					
							//template
							$(template).find('a.product_name, .product-img a').attr('href', product['href'] );

							$(template).find('a.product_name').text( product['name'] );
							
							$(template).find('.product_id').val( product['id'] );

							$(template).find('img.primary-img, img.secondary-img').attr('src', product['image_thumb']);

							$(template).find('span.price').text( product['price'] + " EUR" );
							
							//template_list
							$(template_list).find('a.product_name_full').attr('href', product['href'] );

							$(template_list).find('a.product_name_full').text( product['name'] );

							$(template_list).find('img.primary-img, img.secondary-img').attr('src', product['image_thumb']);
							
							$(template_list).find('.product_id').val( product['id'] );
							
							$(template_list).find('span.price').text( product['price'] + " EUR");

							


							

							$(product_table).append($(template).html());

							$(product_table_list).append($(template_list).html());							

											

						});


					}

					

		

					function slider_start(ps_min=false, ps_max=false)

					{

						// ползунок цены								

						if(!ps_min)

						{

							var ps_min = parseInt( $('input#product_min_price').val() );

						}

						

						if(!ps_max)

						{

							var ps_max = parseInt( $('input#product_max_price').val() );

						}

						

						var pcur = 'EUR';

						

						var ps    = ps_min + '-' + ps_max;

						var fvb = null;	

						ArticList.run(pcur, ps_min, ps_max, ps, fvb, "/Software/MQChange", "Software");

						$('input#price_min_slider').val ( ps_min );

						$('input#price_max_slider').val ( ps_max );						

					}

				var page_num = 1;

				$(document).ready(function()

				{														

										//pagination start
										$('.pagination ul').empty();
										if(page_num >= 3) {
												$('.pagination ul').append('<li><a class="page_num" data-page-num="1" href="#">|<</a></li>');
												
												
										}
										
										if(page_num >= 2)
													$('.pagination ul').append('<li><a class="page_num" data-page-num="' + (page_num - 1) + '" href="#"><</a></li>');
										
										if(<?=$data['page_max']?> <= 5) {
											for(var i = 1; i < <?=$data['page_max']?> + 1; i++) {
												
													
												if(i == page_num)
													$('.pagination ul').append('<li class="active"><a class="page_num" data-page-num="' + i + '" href="#">' + i + '</a></li>');
												else
													$('.pagination ul').append('<li><a class="page_num" data-page-num="' + i + '" href="#">' + i + '</a></li>');
											}
										} else {
											if(page_num - 1 >= 1)
												$('.pagination ul').append('<li><a class="page_num" data-page-num="' + (page_num - 1) + '" href="#">' + (page_num - 1) + '</a></li>');
											$('.pagination ul').append('<li class="active"><a class="page_num" data-page-num="' + page_num + '" href="#">' + page_num + '</a></li>');
											
											if(page_num + 1 <= <?=$data['page_max']?>)
												$('.pagination ul').append('<li><a class="page_num" data-page-num="' + (page_num + 1) + '" href="#">' + (page_num + 1) + '</a></li>');
										}
										
										if(page_num != <?=$data['page_max']?>) {
												if(page_num <= <?=$data['page_max']?> - 1)
													$('.pagination ul').append('<li><a class="page_num" data-page-num="' + (page_num + 1) + '" href="#">></a></li>');
													if(page_num <= <?=$data['page_max']?> - 2)
														$('.pagination ul').append('<li><a class="page_num" data-page-num="' + <?=$data['page_max']?> + '" href="#">>|</a></li>');		
										}
										
										$('.current_page').text(page_num); //$('.per_page_filter').val()
										
										$('.from_count').text(<?=count($products)?> == $('.per_page_filter').val() ? ((<?=count($products)?> * page_num) + 1 - $('.per_page_filter').val()) : (($('.per_page_filter').val() * (page_num - 1)) + 1 ) );
										 
										$('.to_count').text(<?=count($products)?> == $('.per_page_filter').val() ? <?=count($products)?> * page_num : ($('.per_page_filter').val() * (page_num - 1)) + <?=count($products)?> );
										//pagination end	
					
					
					
					
					
					

					// ползунок цены								

					var ps_min = parseInt( $('input#product_min_price').val() );

					var ps_max = parseInt( $('input#product_max_price').val() );
					
					

					slider_start( ps_min, ps_max );

					//update_products_ajax();



										

					$('select#sort_by_filter').change(function()

					{
						page_num = 1;
						update_products_ajax();

					});

					

					

					$(document).on('click', 'a.page_num', function() {
					//$('a.page_num').on('click', function(e) {
						//e.preventDefault();
						page_num = $(this).data('page-num');
						update_products_ajax();
						
						return false;
					});
					

					// открываем подкатегорию					

					$('span.xpointer,label.xpointer').click(function()

					{

						// alert('hi');
						page_num = 1;
						

						// определяем, является ли это пунтком подкатегории

						if( $(this).closest('div.cgform_sub').length == 1 )

						{

							$(this).closest('div.cgform_sub').find('label.xpointer').removeClass('selected');

							$(this).closest('div.cgform_sub').find('span.xpointer').removeClass('selected');

						}

						else

						{

							// выполняем действия для основного пункта

							$('label.xpointer').removeClass('selected');

							$('span.xpointer').removeClass('selected');

							$('div.cgform_sub').hide();

						

											

							var recursive = 0;

							var sub_div   = $(this).parent('div').find('div.cgform_sub');

							// alert( $(sub_div).length );

							// проверяем, есть ли подпункты в указанном пункте

							if( $(sub_div).length == 1 )

							{

								// alert('test');

								// $(sub_div).find('label.xpointer').remove();

								$(sub_div).find('label.xpointer').removeClass('selected');

								$(sub_div).find('span.xpointer').removeClass('selected');

								$(sub_div).find('label.xpointer').first().addClass('selected');

								$(sub_div).find('span.xpointer').first().addClass('selected');

								// return false;

								recursive = 1;							

								

								// alert( $(sub_div).css('display') ); return false;

								// alert( $(sub_div).is(":visible") ); return false;

								

								// открываем либо закрываем подменю, если нажатие было на основной пункт

								if( $(sub_div).is(":visible") )

								{

									$(sub_div).hide();

								}

								else

								{

									$(sub_div).show();

								}

								

								// return false;

							}														

						}

						

						if( $(this).prop("tagName") == 'SPAN' )

						{

							$(this).parent('div').find('label.xpointer').first().addClass('selected');

							$(this).parent('div').find('span.xpointer').first().addClass('selected');

						}

						else

						{

							// alert('test');

							$(this).addClass('selected');

							$(this).siblings('span.xpointer').first().addClass('selected');

						}

												

						var category_name = $(this).parent('div').find('span.xpointer').first().text();

						if( category_name == 'All' )

						{

							var recursive = 1;

						}

						else

						{

							// var recursive = 0;

						}

						

						// $(this).parent('div').remove(); return false;

						// alert ( $(this).parent('div').find('span.xpointer.selected').length ); return false;

						

						var category_id = $(this).parent('div').find('span.xpointer.selected').attr('category_id');

						update_products_ajax(category_id, recursive);

						

					});	

						

					

					$('.per_page_filter').change(function()

					{
						page_num = 1;

						update_products_ajax();

						

						return false;

					});

					

				});

			

			</script>

			

			



			   					
				<div id="product_template" style="display:none">
					<div class="col-md-3 col-sm-4 col-xs-12" >
														<div class="single-product">
															<div class="product-img">
																<a href="#">
																	<img class="primary-img" src="img/product/mediam/2bg.jpg" alt="Product">
																	<img class="secondary-img" src="img/product/mediam/2.jpg" alt="Product">
																</a>
															</div>
															<div class="product-description">
																<h5><a class="product_name" href="#">Ultra Consequad</a></h5>
																<div class="price-box">
																	<span class="price">$88.00</span>
																	<span class="old-price debbug-hide">$110.00</span>
																</div>
																<span class="rating debbug-hide">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-o"></i>
																</span>
																<div class="product-action">
																	<div class="button-group">
																		<div class="product-button">
																			<form class="form-add" method="post" action="/cart/add" novalidate="novalidate">
																			<input class="bask_col_menge_center_text" data-val="true" data-val-length="#lbl4StringLen" data-val-length-max="10" data-val-regex="#EingabeFehler" data-val-regex-pattern="^[0-9]*$"  name="quantity" onchange="document.getElementById('Clicker').click();" type="hidden" value="1">

																			<input type="hidden" class="product_id" name="product_id" value="1">
																			<button type="submit"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
																		</form>
																		</div>
																		<div class="product-button-2">
																			<a href="#" class="debbug-hide" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
																			<a href="#" class="debbug-hide" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
																			<a href="#" class="modal-view" data-toggle="modal" data-product-id="<?=$product['id']?>" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
			</div>
			
			<div id="product_template_list"style="display:none">
				<div class="single-product">
															<div class="col-md-3 col-sm-4 col-xs-12">
																<div class="label_new debbug-hide">
																	<span class="new">new</span>
																</div>
																<div class="sale-off debbug-hide">
																	<span class="sale-percent">-55%</span>
																</div>
																<div class="product-img">
																	<a href="#">
																		<img class="primary-img" src="img/product/mediam/10.jpg" alt="Product">
																		<img class="secondary-img" src="img/product/mediam/10bg.jpg" alt="Product">
																	</a>
																</div>
															</div>
															<div class="col-md-9 col-sm-8 col-xs-12">	
																<div class="product-description">
																	<h5><a class="product_name_full" href="#">Various Versions</a></h5>
																	<div class="price-box">
																		<span class="price">$99.00</span>
																		<span class="old-price debbug-hide">$110.00</span>
																	</div>
																	<span class="rating debbug-hide">
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star-o"></i>
																	</span>
																	<p class="description">Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva..</p>
																	<div class="product-action">
																		<div class="button-group">
																			<div class="product-button">
																				<form class="form-add" method="post" action="/cart/add" novalidate="novalidate">
																			<input class="bask_col_menge_center_text" data-val="true" data-val-length="#lbl4StringLen" data-val-length-max="10" data-val-regex="#EingabeFehler" data-val-regex-pattern="^[0-9]*$"  name="quantity" onchange="document.getElementById('Clicker').click();" type="hidden" value="1">

																			<input type="hidden" class="product_id" name="product_id" value="1">
																			<button type="submit" ><i class="fa fa-shopping-cart"></i> Add to Cart</button>
																		</form>
																			</div>
																			<div class="product-button-2">
																				<a class="debbug-hide" href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
																				<a class="debbug-hide" href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
																				<a href="#" class="modal-view" data-toggle="modal" data-product-id="<?=$product['id']?>" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
			</div>

			

<!-- START PRODUCT-AREA -->
						<div class="product-area">
							<div class="row">
								<div class="col-xs-12">
									<!-- Start Product-Menu -->
									<div class="product-menu">
										<div class="product-title">
											<h3 class="title-group-3 gfont-1"><?=$category['name'] ?></h3>
										</div>
									</div>
									<div class="product-filter">
										<ul role="tablist">
											<li role="presentation" class="list">
												<a href="#display-1-1" role="tab" data-toggle="tab">
													<i class="icon-th-list"></i>
												</a>
											</li>
											<li role="presentation"  class="grid active">
												<a href="#display-1-2" role="tab" data-toggle="tab">
													<i class="icon-th-large"></i>
												</a>
											</li>
										</ul>
										<div class="sort">
											<label>Sort By:</label>
											<select id="sort_by_filter">
												<option value="2">Name ascending</option>

												<option value="3">Name descending</option>

												<option value="4">Price ascending</option>

												<option value="5">Price descending</option>
											</select>
										</div>
										<div class="limit">
											<label>Show:</label>
											<select class="per_page_filter">
												<option value="8">8</option>
												<option value="16">16</option>
												<option value="24">24</option>
												<option value="40">40</option>
												<option value="80">80</option>
												<option value="100">100</option>
											</select>
										</div>
									</div>
									
									<!-- End Product-Menu -->
									<div class="clear"></div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-md-12">		
									<!-- Start Product -->
									<div class="product">
										<div class="tab-content">
											<!-- Product -->
											<div role="tabpanel" class="tab-pane fade" id="display-1-1">
												<div class="row">
													<div class="listview artic_grid">
														<? foreach($products as $product): ?>

														<!-- Start Single-Product -->
														<div class="single-product">
															<div class="col-md-3 col-sm-4 col-xs-12">
																<div class="label_new debbug-hide">
																	<span class="new">new</span>
																</div>
																<div class="sale-off debbug-hide">
																	<span class="sale-percent">-55%</span>
																</div>
																<div class="product-img">
																	<a href="/product/<?=$product['id']?>-<?=$product['name_url']?>">
																		<img class="primary-img" src="/data/images/thumb/<?=$product['id']?>.jpg" alt="<?=$product['name']?>">
																		<img class="secondary-img" src="/data/images/thumb/<?=$product['id']?>.jpg" alt="<?=$product['name']?>">
																	</a>
																</div>
															</div>
															<div class="col-md-9 col-sm-8 col-xs-12">	
																<div class="product-description">
																	<h5><a class="product_name" href="/product/<?=$product['id']?>-<?=$product['name_url']?>"><?=$product['name']?></a></h5>
																	<div class="price-box">
																		<span class="price"><?=$product['price']?> EUR</span>
																		<span class="old-price debbug-hide">$110.00</span>
																	</div>
																	<span class="rating debbug-hide">
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star"></i>
																		<i class="fa fa-star-o"></i>
																	</span>
																	<p class="description">Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva..</p>
																	<div class="product-action">
																		<div class="button-group">
																			<div class="product-button">
																				<form class="form-add" method="post" action="/cart/add" novalidate="novalidate">
																			<input class="bask_col_menge_center_text" data-val="true" data-val-length="#lbl4StringLen" data-val-length-max="10" data-val-regex="#EingabeFehler" data-val-regex-pattern="^[0-9]*$"  name="quantity" onchange="document.getElementById('Clicker').click();" type="hidden" value="1">

																			<input type="hidden" name="product_id" value="<?=$product['id']?>">
																			<button type="submit" ><i class="fa fa-shopping-cart"></i> Add to Cart</button>
																		</form>
																			</div>
																			<div class="product-button-2">
																				<a href="#" class="debbug-hide" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
																				<a href="# class="debbug-hide" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
																				<a href="#" class="modal-view" data-toggle="modal" data-product-id="<?=$product['id']?>" data-target="#productModal" title="Quickview"><i class="fa fa-search-plus"></i></a>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<!-- End Single-Product -->
														<? endforeach ?>
													</div>
												</div>
												<!-- Start Pagination Area -->
												<div class="pagination-area">
													<div class="row">
														<div class="col-xs-5">
															<div class="pagination">
																<ul>
																	<li class="active"><a href="#">1</a></li>
																	<li><a href="#">2</a></li>
																	<li><a href="#">></a></li>
																	<li><a href="#">>|</a></li>
																</ul>
															</div>
														</div>
														<div class="col-xs-7">
															<div class="product-result">
																<span>Showing <span class="from_count">1</span> to <span class="to_count">8</span> (<span class="current_page">1</span> Page)</span>
															</div>
														</div>
													</div>
												</div>
												<!-- End Pagination Area -->
											</div>
											<!-- End Product -->
											<!-- Start Product-->
											<div role="tabpanel" class="tab-pane fade in  active" id="display-1-2">
												<div id="products_table" class="row">
													<? foreach($products as $product): ?>
													<!-- Start Single-Product -->
													<div class="col-md-3 col-sm-4 col-xs-12">
														<div class="single-product">
															<div class="label_new debbug-hide">
																<span class="new">new</span>
															</div>
															<div class="sale-off debbug-hide">
																<span class="sale-percent">-55%</span>
															</div>
															<div class="product-img">
																<a href="/product/<?=$product['id']?>-<?=$product['name_url']?>">
																	<img class="primary-img" src="/data/images/thumb/<?=$product['id']?>.jpg" alt="<?=$product['name']?>">
																	<img class="secondary-img" src="/data/images/thumb/<?=$product['id']?>.jpg" alt="<?=$product['name']?>">
																</a>
															</div>
															<div class="product-description">
																<h5><a href="/product/<?=$product['id']?>-<?=$product['name_url']?>"><?=$product['name']?></a></h5>
																<div class="price-box">
																	<span class="price"><?=$product['price']?> EUR</span>
																	<span class="old-price debbug-hide">$110.00</span>
																</div>
																<span class="rating debbug-hide">
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star"></i>
																	<i class="fa fa-star-o"></i>
																</span>
															</div>
															<div class="product-action">
																<div class="button-group">
																	<div class="product-button">
																		<form class="form-add" method="post" action="/cart/add" novalidate="novalidate">
																			<input class="bask_col_menge_center_text" data-val="true" data-val-length="#lbl4StringLen" data-val-length-max="10" data-val-regex="#EingabeFehler" data-val-regex-pattern="^[0-9]*$"  name="quantity" onchange="document.getElementById('Clicker').click();" type="hidden" value="1">

																			<input type="hidden" name="product_id" value="<?=$product['id']?>">
																			<button type="submit" ><i class="fa fa-shopping-cart"></i> Add to Cart</button>
																		</form>
																	</div>
																	<div class="product-button-2">
																		<a href="#" class="debbug-hide" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart-o"></i></a>
																		<a href="#" class="debbug-hide" data-toggle="tooltip" title="Compare"><i class="fa fa-signal"></i></a>
																		<a href="#" class="modal-view" data-toggle="modal" data-product-id="<?=$product['id']?>" data-target="#productModal"><i class="fa fa-search-plus"></i></a>
																	</div>
																</div>
															</div>												
														</div>
													</div>
													<!-- End Single-Product -->
													<? endforeach ?>
												</div>
												<!-- Start Pagination Area -->
												<div class="pagination-area">
													<div class="row">
														<div class="col-xs-5">
															<div class="pagination">
																<ul>
																	<? for($i = 1; $i < $data['page_max'] + 1; $i++): ?>
																	<!--<li class="active"><a href="#">1</a></li>
																	<li><a href="#">2</a></li>
																	<li><a href="#">></a></li>
																	<li><a href="#">>|</a></li>-->
																	<li><a class="page_num" data-page-num="<?=$i?>" href="#"><?=$i?></a></li>
																	<? endfor ?>
																</ul>
															</div>
														</div>
														<div class="col-xs-7">
															<div class="product-result">
																<span>Showing <span class="from_count">1</span> to <span class="to_count">8</span> (<span class="current_page">1</span> Page)</span>
															</div>
														</div>
													</div>
												</div>
												<!-- End Pagination Area -->
											</div>
											<!-- End Product = TV -->
										</div>
									</div>
									<!-- End Product -->
								</div>
							</div>
						</div>
						<!-- END PRODUCT-AREA -->
						
						<script>
						$(document).on('submit','.form-add',function()
						//$('.form-add').function() 
						

	  {

		  var post = $(this).serialize();

		  

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
						$('.mini-cart-list').append('<div class="cart-img-details"><div class="cart-img-photo"><a href="/product/' + product['id'] + '-' + product['name_url'] + '"><img src="/data/images/thumb/' + product['id'] + '.jpg" alt="' + product['name'] + '"></a></div><div class="cart-img-content"><a href="/product/' + product['id'] + '-' + product['name_url'] + '"><h4>' + product['name'] + '</h4></a><span><strong class="text-right">' + product['quantity'] + ' x</strong><strong class="cart-price text-right">' + product['price'] + ' EUR</strong></span></div></div>');
						
						});
						$('div#thank_you_message').show();

					},
					error: function() {
						alert('bad');
					}

				 });		  

		  

		  return false;

	  });
						
						</script>
						
						
						<? require_once 'bottom.php'; ?>