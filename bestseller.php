<!-- START SMALL-PRODUCT-AREA -->
						<div class="small-product-area carosel-navigation best hidden-sm hidden-xs">
							<div class="row">
								<div class="col-md-12">
									<div class="area-title">
										<h3 class="title-group gfont-1">Bestseller</h3>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="active-bestseller sidebar">
										<? $counter = 0; ?>
										<? foreach($this->shop_data['products_sale'] as $product_sale): ?>
										<? if($counter % 4 == 0): ?> <div class="col-xs-12"> <? endif ?>
										<? $counter++; ?>										
										<!-- Start Single-Product -->
										<div class="single-product">
											<div class="product-img">
												<a href="/product/<?=$product['id']?>-<?=$product['name_url']?>">
													<img class="primary-img" src="/data/images/thumb/<?=$product_sale['id']?>.jpg" alt="<?=$product_sale['name']?>">
												</a>
											</div>
											<div class="product-description">
												<h5><a href="/product/<?=$product_sale['id']?>-<?=$product_sale['name_url']?>"><?=$product_sale['name']?></a></h5>
												<div class="price-box">
													<span class="price"><?=$product_sale['price']?> EUR</span>
													<span class="old-price debbug-hide">$110.00</span>
												</div>
												<span class="rating debbug-hide">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</span>
											</div>
										</div>
										<!-- End Single-Product -->
										
									<? if($counter % 4 == 0): ?> </div> <? endif ?>
									<? endforeach ?>
								</div></div>
							</div>
						</div>
						<!-- END SMALL-PRODUCT-AREA -->