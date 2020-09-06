<html>
<head>
	<title>Privacy Shop</title>
	<script type="text/javascript" src="/views/frontend/js/jquery.min.js"></script>
</head>
<body>
	
	<script type="text/javascript">
	
		$(document).ready(function()
		{
			
			$('button#gamivo_get').click(function()
			{			
				var gamivo_link = $('#gamivo_link_field').val();
				
				$.ajax({
						   url: gamivo_link,
						   type:'GET',
						   success: function(data) 
						   {
							   // product = $(data).find('div.product-content').eq(1);
							   
							   // alert( $(product).text() );
							   
							   // получаем название продукта
							   var title = $(data).find('div.product-content').eq(1).find('h1').text().replace('Buy ','');
							   // alert(title);
							   $('div#gamivo_product').find('div#title').text( title );
							   
							   // получаем заглавную картинку
							   var picture = $(data).find('div.gallery').find('img.img-responsive').attr('src');
							   $('div#gamivo_product').find('div#picture').html( '<img src="' + picture + '"/>');	
							   
							   // получаем описание
							   var description = $(data).find('div.description');
								   description.find('div.description__seo').remove();
								   description.find('div.buttons').remove();
								   description = description.html();
								
							   $('div#gamivo_product').find('div#description').html( description );	
								
							   // получаем текущую цену
							   var price_old = $(data).find('span#lowest-price').text().replace('€','').replace(' ','');
							   $('div#gamivo_product').find('div#price_old').text( price_old + ' евро');
							   
							   // получаем новую цену
							   var price_new = price_old - (price_old / 100 * 10);
								   price_new = price_new.toFixed(2);
							   
							    $('div#gamivo_product').find('div#price_new').text( price_new + ' евро');
							   
							   
							   $('div#gamivo_product').show();
							   
						   }
					   });
			});
		});
	
	</script>
	
	<h1>прототип Privacy Shop</h1><br>
	
	<b>Не будь лохом! Покупай дешевле!!!</b> <br>
	
	Введите ссылку на товар Gamivo
	<input type="text" size="50" id="gamivo_link_field"><br>
	<button id="gamivo_get">Ок</button>
	
	<style>
		
		div#gamivo_product
		{
			display: none;
		}
		
		div#gamivo_product #price_old
		{
			text-decoration: line-through;
		}
		
		div#gamivo_product #title
		{
			font-weight: bold;
		}	
	
	</style>
	
	<div id="gamivo_product">
	
		<div id="picture"></div>
		<div id="title"></div>
		<div id="price_old"></div>
		<div id="price_new"></div>
		<button id="buy">Купить сейчас</button>
		<div id="description"></div>
		
		
	</div>
	
	<div id="tmp" style="display: none;"></div>

</body>
</html>