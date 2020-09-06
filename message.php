<? require_once 'top.php'; ?>


	<div class="row xmbot">
		<div class="col-xs-12 xcont xpad10">
			<p></p>
			
			<? if(!empty($error)): ?>
				
				<? if(is_array($error)): ?>
				
					<? foreach($error as $error_message): ?>
						
						<font color="red"><?=$error_message?></font><br>
					
					<? endforeach; ?>
				
				<? else: ?>

					<font color="red"><?=$error?></font><br>
				
				<? endif; ?>
			
			<? else: ?>
			
				<h2><?=$message?></h2>
			
			<? endif; ?>
			
			<p></p>
		</div>
	</div>

<? require_once 'bottom.php'; ?>