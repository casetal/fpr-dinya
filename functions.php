<?php



class functions

{

    

	function build_left_category_menu($category_left_menu, $category_ids_checked=[])

	{?>

		

		<? // print_r( $category_ids_checked ); ?>

		

		

		

		

		<form id="cgform" class="" method="post">

			<div class="form-group">

				<div>

					<input type="radio">

					<label class="cgform_imglbl xpointer"></label>

					<text>&nbsp;</text>

					<span class="xpointer" category_id="<?=$category_left_menu['id']?>">All</span>

				</div>

			

				<? foreach($category_left_menu['child'] as $category): ?>

				 

					<? 

					   $menu_href[0] = $category['name_url']; 					

					   $selected 	 = (in_array($category['id'], $category_ids_checked))? 'selected':'';					

					?>

				 

				 <div>

					<input class="x_pointer" type="radio">

					<label class="cgform_imglbl xpointer <?=$selected?>"></label>

					<text>&nbsp;</text>

					<span class="xpointer <?=$selected?>" category_id="<?=$category['id']?>">

						<?=$category['name']?>

						<? if(!empty($category['child'])): ?><b class="caret"></b><? endif; ?>

					</span>

					

								

					<? if(!empty($category['child'])): ?>

						

						<? $display = ($selected)? 'block' : 'none'; ?>

						

						<div class="cgform_sub" style="display: <?=$display?>;">

								

								<? // echo 'found is: ' . $found; ?>

								

								<? 

								   $found = 0;

								   foreach($category['child'] as $category_child) 

								   { 

									  // print_r( $category_child );

									  if(in_array($category_child['id'],$category_ids_checked))

									  {

										  $found = 1;

									  }

								   }

								   

								   $selected = (!$found && $selected)? 'selected':'';								   

								 ?>

							<div>

								<input class="x_pointer" type="radio">

								<label class="cgform_imglbl xpointer <?=$selected?>"></label>

								<span class="xpointer <?=$selected?>" category_id="<?=$category['id']?>">All</span>

							</div>

							<? foreach($category['child'] as $category_child): ?>

							

								<? $selected = (in_array($category_child['id'],$category_ids_checked))? 'selected':''; ?>

								<div>

									<input type="radio">

									<label class="cgform_imglbl xpointer <?=$selected?>"></label>

									<span class="xpointer <?=$selected?>" category_id="<?=$category_child['id']?>"><?=$category_child['name']?></span>

								</div>

							

							<? endforeach; ?>

							

						</div>

					

					<? endif; ?>

					

					

				 </div>

				 

				<? endforeach; ?>

									

			</div>

		 </form>		

	<?}

	

	

	function build_category_menu($category_data, $level = 1, $side = "")

    {

        $collapse = 0;



        if ($level === 1) {

            ?> <ul> <?php

        }



        foreach ($category_data as $category) {



            if ($category["full_menu"] === "1") {

				   $menu_href[0] = $category['name_url'];				   

                ?> <li class="dropdown menu-large"> <?php

                    ?> <a href="#" id="" data-toggle="dropdown" class="dropdown-toggle"><?= $category["name"] ?> <b class="caret"></a></b> <?php

                    ?> <ul class="dropdown-menu megamenu row"> <?php



                    foreach ($category["child"] as $child) {

						$menu_href[1] = $child['name_url'];

						?> <li class="col-sm-4"> <?php

                            ?> <ul> <?php

                                ?> <li class="dropdown-header"><?= $child["name"] ?></li> <?php



                                foreach ($child["child"] as $subChild) 

								{

									$menu_href[2] = $subChild['name_url'];

                                    if (!empty($subChild["child"])) {

                                        $collapse++;

                                        ?> <li class="" role="presentation"><a data-toggle="collapse" href="#collapse<?= $collapse  ?><?= $side ?>" class="collapsed"><img src="<?= $subChild["icon"] ?>"> <?= $subChild["name"] ?> <b class="caret"></b></a></li> <?php



                                        ?> <li><div id="collapse<?= $collapse  ?><?= $side ?>" class="panel-collapse collapse" style="height: 0px;"> <?php

                                            ?> <ul class="sub"> 

											   

												  <li role="presentation"><a href="/<?=$menu_href[0]?>/<?=$menu_href[1]?>/<?=$menu_href[2]?>/all">All</a></li>

											

											  <?php

                                                foreach ($subChild["child"] as $subSubChild) {

													

                                                    ?> <li role="presentation"><a href="<?= $subSubChild["href"] ?>"><?= $subSubChild["name"] ?></a></li> <?php

                                                }

                                            ?> </ul> <?php

                                        ?> </div></li> <?php

                                    } else {

                                        ?> <li class=""><a href="<?= $subChild["href"] ?>"><img src="<?= $subChild["icon"] ?>"> <?= $subChild["name"] ?></a></li> <?php

                                    }

                                }



                            ?> </ul> <?php

                        ?> </li> <?php

                    }



                    ?> </ul> <?php

                ?> </li> <?php



            } else if (!empty($category["child"])) {

				   $menu_href[0] = $category['name_url'];

				   // echo $level_first_href; exit();



                ?> <li class="dropdown"> <?php

                    ?> <a href="#" id="" data-toggle="dropdown" class="dropdown-toggle"><?= $category["name"] ?> <b class="caret"></a></b> <?php

                    ?> <ul class="dropdown-menu"> <?php



                    foreach ($category["child"] as $child) {

						 $menu_href[1] = $child['name_url'];

  					     if (!empty($child["child"])) {

                            $collapse++;

                            ?> <li class="toggle-sub" role="presentation"><a data-toggle="collapse" href="#collapse<?= $collapse  ?><?= $side ?>" class="collapsed"><? if(!empty($child['icon'])): ?><img src="<?= $child["icon"] ?>"/><? endif; ?> <?= $child["name"] ?> <b class="caret"></b></a></li> <?php



                            ?> <div id="collapse<?= $collapse  ?><?= $side ?>" class="panel-collapse collapse" style="height: 0px;"> <?php

                                ?> <ul class="sub"> 

									

									<li role="presentation"><a href="/<?=$menu_href[0]?>/<?=$menu_href[1]?>/all">All</a></li>

									

									<?php

                                    foreach ($child["child"] as $subChild) {

                                        ?> <li role="presentation"><a href="<?= $subChild["href"] ?>"><?= $subChild["name"] ?></a></li> <?php

                                    }

                                ?> </ul> <?php

                            ?> </div> <?php

                        } else {

                            ?> <li class=""><a href="<?= $child["href"] ?>"><? if(!empty($child['icon'])): ?><img src="<?= $child["icon"] ?>"/><? endif; ?> <?= $child["name"] ?></a></li> <?php

                        }

                    }



                    ?> </ul> <?php

                ?> </li> <?php



            } else {

				$menu_href[0] = $category['name_url'];

				// echo $level_first_href; exit();

                ?> <li> <?php

                ?> <a href="<?= $category["href"] ?>" id="" data-toggle="dropdown" class="dropdown-toggle"><?= $category["name"] ?></a></b> <?php

                ?> </li> <?php



            }



        }



        ?> </ul> <?php



    }

}