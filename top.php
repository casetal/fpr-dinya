<!DOCTYPE html>

<html style="" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage no-websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients no-cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang="en-US">



<? require_once 'head.php'; ?>

<body class="">


<!-- HEADER-AREA START -->
		<header class="header-area">
			<!-- HEADER-TOP START -->
			<div class="header-top hidden-xs">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="top-menu">
								<!-- Start Language -->
								<ul class="language">
									<li class="debbug-hide"><a href="#"><img class="right-5" src="/views/frontend/images/flags/gb.png" alt="#">English<i class="fa fa-caret-down left-5"></i></a>
										<ul>
											<li><a href="#"><img class="right-5" src="/views/frontend/images/flags/fr.png" alt="#">French</a></li>
											<li><a href="#"><img class="right-5" src="/views/frontend/images/flags/gb.png" alt="#">English</a></li>
											<li><a href="#"><img class="right-5" src="/views/frontend/images/flags/gb.png" alt="#">English</a></li>
										</ul>
									</li>
								</ul>
								<!-- End Language -->
								<!-- Start Currency -->
								<ul class="currency debbug-hide">
									<li><a href="#"><strong>$</strong> USD<i class="fa fa-caret-down left-5"></i></a>
										<ul>
											<li><a href="#">$ EUR</a></li>
											<li><a href="#">$ GBP</a></li>
											<li><a href="#">$ USD</a></li>
										</ul>
									</li>
								</ul>
								<!-- End Currency -->
								<p class="welcome-msg">Default welcome msg!</p>
							</div>
							<!-- Start Top-Link -->
							<div class="top-link">
								<ul class="link">
								
									<li><a href="/login"><i class="fa fa-user"></i> 
									<? if($this->user): ?>

									Hello <?=$this->user['username']?>

								<? else: ?>

									My Account

								<? endif; ?>
									</a></li>
									<li class="debbug-hide"><a href="wishlist.html"><i class="fa fa-heart"></i> Wish List (0)</a></li>
									<li class="debbug-hide"><a href="checkout.html"><i class="fa fa-share"></i> Checkout</a></li>
									
									<? if($this->user): ?>

										<li><a href="/logout"><i class="fa fa-unlock-alt"></i> Log out</a></li>

									<? else: ?>

										<li><a href="#" class="modal-view" data-toggle="modal" data-target="#loginModal"><i class="fa fa-unlock-alt"></i> Log in</a></li>

									<? endif; ?>
									
									
								</ul>
							</div>
							<!-- End Top-Link -->
						</div>
					</div>
				</div>
			</div>
			<!-- HEADER-TOP END -->
			<!-- HEADER-MIDDLE START -->
			<div class="header-middle">
				<div class="container">
					<!-- Start Support-Client -->
					<div class="support-client hidden-xs">
						<div class="row">
							<!-- Start Single-Support -->
							<div class="col-md-3 hidden-sm">
								<div class="single-support">
									<div class="support-content">
										<i class="fa fa-clock-o"></i>
										<div class="support-text">
											<h1 class="zero gfont-1">working time</h1>
											<p>Mon- Sun: 8.00 - 18.00</p>
										</div>
									</div>
								</div>
							</div>
							<!-- End Single-Support -->
							<!-- Start Single-Support -->
							<div class="col-md-3 col-sm-4">
								<div class="single-support">
									<i class="fa fa-truck"></i>
									<div class="support-text">
										<h1 class="zero gfont-1">Free shipping</h1>
										<p>On order over $199</p>
									</div>
								</div>
							</div>
							<!-- End Single-Support -->
							<!-- Start Single-Support -->
							<div class="col-md-3 col-sm-4">
								<div class="single-support">
									<i class="fa fa-money"></i>
									<div class="support-text">
										<h1 class="zero gfont-1">Money back 100%</h1>
										<p>Within 30 Days after delivery</p>
									</div>
								</div>
							</div>
							<!-- End Single-Support -->
							<!-- Start Single-Support -->
							<div class="col-md-3 col-sm-4">
								<div class="single-support">
									<i class="fa fa-phone-square"></i>
									<div class="support-text">
										<h1 class="zero gfont-1">Phone: 0123456789</h1>
										<p>Order Online Now !</p>
									</div>
								</div>
							</div>
							<!-- End Single-Support -->
						</div>
					</div>
					<!-- End Support-Client -->
					<!-- Start logo & Search Box -->
					<div class="row">
						<div class="col-md-3 col-sm-12">
							<div class="logo">
								<a href="/" title="Malias"><img src="/views/frontend/images/Logo.png" alt="Logo"></a>
							</div>
						</div>
						<div class="col-md-9 col-sm-12">
		                    <div class="quick-access">
		                    	<div class="search-by-category">
		                    		<div class="search-container">
			                    		<select>
			                    			<option class="all-cate">All Categories</option>
								<? foreach($this->category_all as $cat): ?>
											<optgroup  class="cate-item-head" label="<?=$cat['name']?>">
												<? if(count($cat['child']) != 0): ?>
												<? foreach ($cat['child'] as $subcat): ?>
												<option class="cate-item-title"><?=$subcat['name']?></option>
												<? endforeach ?>
												<? endif ?>
											</optgroup>
		
								<? endforeach ?>
			                    		</select>
		                    		</div>
		                    		<div class="header-search">
		                    			<form action="#">
			                    			<input type="text" placeholder="Search">
			                    			<button type="submit"><i class="fa fa-search"></i></button>
		                    			</form>
		                    		</div>
		                    	</div>
		                    	<div class="top-cart">
		                    		<ul>
		                    			<li>
			                    			<a href="/cart">
			                    				<span class="cart-icon"><i class="fa fa-shopping-cart"></i></span>
			                    				<span class="cart-total">
			                    					<span class="cart-title">shopping cart</span>
				                    				<span class="cart-item"><span id="cart_quantity"><?=$this->shop_data['cart_quantity']?></span> items </span>
				                    				<span class="top-cart-price"><?=$this->shop_data['cart']['price_total']?> EUR</span>
			                    				</span>
			                    			</a>
											<div class="mini-cart-content">
												<div class="mini-cart-list">
												<? foreach($this->shop_data['cart']['products'] as $product_cart): ?>
												<div class="cart-img-details">
													<div class="cart-img-photo">
														<a href="/product/<?=$product_cart['id']?>-<?=$product_cart['name_url']?>"><img src="/data/images/thumb/<?=$product_cart['id']?>.jpg" alt="<?=$product_cart['name']?>"></a>
													</div>
													<div class="cart-img-content">
														<a href="/product/<?=$product_cart['id']?>-<?=$product_cart['name_url']?>"><h4><?=$product_cart['name']?></h4></a>
														<span>
															<strong class="text-right"><?=$product_cart['quantity']?> x</strong>
															<strong class="cart-price text-right"><?=$product_cart['price']?> EUR</strong>
														</span>
													</div>
													<!--<div class="pro-del">
														<a href="#"><i class="fa fa-times"></i></a>
													</div>-->
												</div>
												<div class="clear"></div>
												<? endforeach; ?>
												</div>
												<div class="cart-inner-bottom">
													<span class="total">
														Total:
														<span class="amount"><?=$this->shop_data['cart']['price_total']?> EUR</span>
													</span>
													<span class="cart-button-top">
														<a href="/cart">View Cart</a>
														<!--<a href="checkout.html">Checkout</a>-->
													</span>
												</div>
											</div>
		                    			</li>
		                    		</ul>
		                    	</div>
		                    </div>
		                </div>
					</div>
					<!-- End logo & Search Box -->
				</div> 
			</div>
			<!-- HEADER-MIDDLE END -->
			<!-- START MAINMENU-AREA -->
			<div class="mainmenu-area">
				<div class="container">
					<div class="row">

						<div class="col-md-12">
							<div class="mainmenu hidden-sm hidden-xs">
								<nav>
									<? $this->template_functions->build_category_menu( $this->category_all ); ?>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN-MENU-AREA -->
			<!-- Start Mobile-menu -->
			<div class="mobile-menu-area hidden-md hidden-lg">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<nav id="mobile-menu">
								<? $this->template_functions->build_category_menu( $this->category_all ); ?>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- End Mobile-menu -->
		</header>
		<!-- HEADER AREA END -->

	
		<!-- CANOQ -->
		<!-- Category slider area start -->
		<div class="category-slider-area">	
			<div class="container">
				<div class="row" style="position: relative">
				<img src="/views/frontend/images/arrow.png" class="toggle-siebar">
			<? if($this->action != 'register'): ?>
					<div class="col-md-3 side">
						<!-- CATEGORY-MENU-LIST START -->
	                    <div class="left-category-menu hidden-sm hidden-xs">
	                        <div class="left-product-cat">
	                            <div class="category-heading">
	                                <h2>categories</h2>
	                            </div>
	                            <div class="category-menu-list">
								
									<? $this->template_functions->build_category_menu( $this->category_all, 1, "side" ); ?>
									
	                            </div>
	                        </div>
	                    </div>
	                    <!-- END CATEGORY-MENU-LIST -->
						<? if($this->action != 'category' && $this->action != 'main'): ?>
							<? require_once 'bestseller.php'; ?>
						<?endif ?>
						<? if($this->action == 'category'): ?>
						<!-- shop-filter start -->
						<div class="shop-filter">
							<div class="area-title">
								<h3 class="title-group gfont-1">Filters Products</h3>
							</div>
							<h4 class="shop-price-title">Price</h4>
							<form id="priceform" method="post">
							<div class="info_widget">
								<div class="price_filter">
									<div id="slider-range"></div>
									<div id="priceSlider" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 0%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 100%;"></span></div>
									<div class="price_slider_amount">
										<input type="text" id="amount" name="price" readonly  placeholder="Add Your Price" />
										<input class="debbug-hide" type="submit"  value="Filter"/>  
									</div>
									
								</div>
							</div>
							</form>
						</div>
						<!-- shop-filter start -->
						<!-- filter-by start -->
						<div class="accordion_one">
							<h4><a class="accordion-trigger" data-toggle="collapse" href="#divone">PRODUCT CATEGORIES</a></h4>



							<div id="divone" class="collapse in">
								<? $this->template_functions->build_left_category_menu( $category_left_menu, $category_ids_checked ); ?>
							</div>
													</div>
						<!-- filter-by end -->
						
				<? endif ?><? endif ?>
	                </div>
	                <div class="col-md-9 content">
                		<? if($this->action == 'main') require_once 'slider.php'; ?>
				<? if($this->action != 'main' && $this->action != 'register' && $this->action != 'product' && $this->action != 'login') require_once 'banner.php'; ?>
