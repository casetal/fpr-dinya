
<div class="row xcont xmbot">

        <div class="col-sm-11 xpad10">

            



<form action="/login" class="form-horizontal" enctype="multipart/form-data" id="loginForm" method="post">	

<div class="form-group">

		<div class="col-sm-offset-4 col-sm-8">

			

			<? if(!empty($error)): ?>

				

				<font color="red"><?=$error?></font>

			

			<? endif; ?>

			

		</div>

	</div>

	<div class="form-group">

		

		<label for="" class="control-label col-sm-4">E-Mail/Username        <span>*</span>

</label>

		<div class="col-sm-8">

			<input class="form-control" name="login" type="text" required>

		</div>

	</div>

	<div class="form-group">

		<label for="Password" class="control-label col-sm-4">Password        <span>*</span>

</label>

		<div class="col-sm-8">

			<input class="form-control" name="password" type="password" required>

		</div>

	</div>

	<div class="form-group">

		<div class="col-sm-offset-4 col-sm-8">

			<div id="passlostPopOpener">

				<p>Forgot your password?</p>

			</div>

		</div>

	</div>

	<div class="form-group">

		<div class="col-sm-offset-4 col-sm-8">
			<a href="/register" class="btn btn-primary floatleft">Registration</a>
			

			<button id="idLoginAnmelden" value="" type="submit" class="btn btn-primary floatright">

				Log in

			</button>

		</div>

	</div>



</form>





        </div>

    </div>