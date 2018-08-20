<main>
	<div class="container-fluid">

	<div class="row">
		<a href="#sellTokens" data-toggle="modal" data-backdrop="static">
		    <div class="sellTokens  col-md-1 col-md-offset-9">
		    	<p>Sell Tokens </p><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
		    </div>
		</a>
		<a href="#addJetons" data-toggle="modal" data-backdrop="static">
		    <div class="buyTokens  col-md-1">
		    	<p>Buy tokens</p><i class="fa fa-cc-stripe" aria-hidden="true"></i>
		    </div>
		</a>
    </div>

    <div class="row">
      <?php
    	foreach ($info['infoUser'] as $key) {
    		echo "<div class='infoUser col-md-2'><h1>Profil user</h1><br/>
    		<i class='fa fa-user' aria-hidden='true'></i> : ".$key->login."<br/>
    		<i class='fa fa-envelope' aria-hidden='true'></i> : ".$key->email."<br/>
    		<i class='fa fa-calendar' aria-hidden='true'></i> : ".$key->date_inscription."<br/>
    		<i class='fa fa-try' aria-hidden='true'></i> : ".$key->tokens."<i class='fa fa-try' aria-hidden='true'></i><br/>
    		<i class='fa fa-gbp' aria-hidden='true'></i> : ".$key->gains."<i class='fa fa-gbp' aria-hidden='true'></i>
			<img src='public/img/offre.jpg' class='col-md-12 offre img-responsive' alt='image de l offre'>
    		</div>";

    		$id = $key->id;
    		$email = $key->email;
    	}
      ?>

    <div class="modal fade" id="sellTokens">
	 <div class="modal-dialog modal-sm">
	  <div class="modal-content">
	   <div class="modal-header">
	     <button type="button" class="close closeSellToken" data-dismiss='modal'>X</button>
	    <h1 class="titreSellToken"><strong>Sell tokens</strong></h1>
	   </div>
	   <div class="modal-body">
	   <form action="sellTokens" method="POST">
	    <h2 class="titleSellTokens"><strong>How many tokens you want to sell ?</strong></h2>
	     <input type="number" name="sellTokens" class="inputSellTokens col-md-offset-2" min="1">
	      <input type="hidden" name="email" value="<?php echo $email; ?>">
	     <button type="submit" class="btn btn-danger">Sale !</button>
	   </form>
	   </div>
	   <div class="modal-footer  modalSellTokens">
	    <button class="btn btn-danger" data-dismiss='modal'>Close</button>
	   </div>
	  </div>
	 </div>
	</div>

	<div class="modal fade" id="addJetons">
	 <div class="modal-dialog modal-sm">
	  <div class="modal-content modalBuyTokens">
	   <div class="modal-header">
	     <button type="button" class="close" data-dismiss='modal'>X</button>
	    <h1>Buy tokens</h1>
	   </div>
	   <div class="modal-body">
	    <div class="choiceRow">
	       <p class='col-md-6'>Buy 10 tokens</p>
	       <form action="buyTokens" method="POST" class="col-md-offset-6">
	       <input type="hidden" name="email" value="<?php echo $email; ?>">
	       <input type="hidden" name="tokens" value="10">
			<script
			    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
			    data-key="pk_test_Q09LlObaBEFvYbbFwCq41LPm"
			    data-amount="1000"
			    data-name="Demo Site"
			    data-description="Widget"
			    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
			    data-locale="auto"
			    data-email = "aaa@aaa.fr"
			    data-currency="eur">
			  </script>
		  </form>
		</div>
	    <div class="choiceRow">
		  <p class='col-md-6'>Buy 25 tokens</p>
	       <form action="buyTokens" method="POST" class="col-md-offset-6">
	        <input type="hidden" name="email" value="<?php echo $email; ?>">
	       <input type="hidden" name="tokens" value="25">
			<script
			    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
			    data-key="pk_test_Q09LlObaBEFvYbbFwCq41LPm"
			    data-amount="2500"
			    data-name="Demo Site"
			    data-description="Widget"
			    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
			    data-locale="auto"
			    data-email = "aaa@aaa.fr"
			    data-currency="eur">
			 </script>
		  </form>
		</div>
		<div class="choiceRow">
		  <p class='col-md-6'>Buy 50 tokens</p>
	       <form action="buyTokens" method="POST" class="col-md-offset-6">
	       <input type="hidden" name="email" value="<?php echo $email; ?>">
	       <input type="hidden" name="tokens" value="50">
			<script
			    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
			    data-key="pk_test_Q09LlObaBEFvYbbFwCq41LPm"
			    data-amount="5000"
			    data-name="Demo Site"
			    data-description="Widget"
			    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
			    data-locale="auto"
			    data-email = "aaa@aaa.fr"
			    data-currency="eur">
			</script>
		  </form>
		</div>
		<div class="choiceRow">
		  <p class='col-md-6'>Buy 100 tokens</p>
	       <form action="buyTokens" method="POST" class="col-md-offset-6">
	       <input type="hidden" name="email" value="<?php echo $email; ?>">
	       <input type="hidden" name="tokens" value="100">
			<script
			    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
			    data-key="pk_test_Q09LlObaBEFvYbbFwCq41LPm"
			    data-amount="10000"
			    data-name="Demo Site"
			    data-description="Widget"
			    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
			    data-locale="auto"
			    data-email = "aaa@aaa.fr"
			    data-currency="eur">
			</script>
		  </form>
		</div>
		<div class="choiceRow">
		  <p class='col-md-6'>Buy 500 tokens</p>
	       <form action="buyTokens" method="POST" class="col-md-offset-6">
	       <input type="hidden" name="email" value="<?php echo $email; ?>">
	       <input type="hidden" name="tokens" value="500">
			<script
			    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
			    data-key="pk_test_Q09LlObaBEFvYbbFwCq41LPm"
			    data-amount="50000"
			    data-name="Demo Site"
			    data-description="Widget"
			    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
			    data-locale="auto"
			    data-email = "aaa@aaa.fr"
			    data-currency="eur">
			</script>
		  </form>
		</div>
	   </div>
	   <div class="modal-footer">
	    <button class="btn btn-default" data-dismiss='modal'>Close</button>
	   </div>
	  </div>
	 </div>
	</div>

	<div class="col-md-offset-3">
	  <?php
	    foreach ($scope['myEvents'] as $key) {
	 		echo "<table class='col-md-3 events'>
	 				<caption class='nameOfEvent'>".$key->name_event."</caption>
	 				  <tr>
	 				    <td class='cotesMatch'>
	 				      <span class='displayCotes'>
	 				        <a href='#home' data-toggle=\"modal\" data-backdrop=\"static\">
	 				          <span class='choice'>1</span>".$key->coteDom.
	 				        "</a>
	 				      </span>
	 				    </td>
	 				    <td class='cotesMatch'>
	 				      <span class='displayCotes'>
	 				        <a href='#null' data-toggle=\"modal\" data-backdrop=\"static\">
	 				          <span class='choice'>N</span>".$key->coteNull.
	 				      	"</a>
	 				      </span>
	 				    </td>
	 				    <td class='cotesMatch'>
	 				      <span class='displayCotes'>
	 				        <a href='#outside' data-toggle=\"modal\" data-backdrop=\"static\">
	 				          <span class='choice'>2</span>".$key->coteExt.
	 				      "</a>
	 				      </span>
	 				    </td>
	 				  </tr>
	 			</table>";
	    }
	  ?>
	</div>

	<div class="modal fade" id="home">
	 <div class="modal-dialog modal-sm">
	  <div class="modal-content modalBetTokens">
	   <div class="modal-header">
	     <button type="button" class="close" data-dismiss='modal'>X</button>
	    <h1 class="titleBetToken"><strong>Bet for the home team</strong></h1>
	   </div>
	   <div class="modal-body">
	   <form action="betTokens" method="POST">
	    <h2 class="titleBetToken">How many tokens bet you ?</h2>
	     <input type="number" name="betTokens" class="inputbetTokens col-md-offset-2" min="1">
	      <input type="hidden" name="email" value="<?php echo $email; ?>">
	     <button type="submit" class="btn btn-success">Bet !</button>
	   </form>
	   </div>
	   <div class="modal-footer">
	    <button class="btn btn-success" data-dismiss='modal'>Close</button>
	   </div>
	  </div>
	 </div>
	</div>

	<div class="modal fade" id="null">
	 <div class="modal-dialog modal-sm">
	  <div class="modal-content">
	   <div class="modal-header">
	     <button type="button" class="close" data-dismiss='modal'>X</button>
	    <h1 class="titleBetToken"><strong>Betting for the match null</strong></h1>
	   </div>
	   <div class="modal-body">
	   <form action="betTokens" method="POST">
	    <h2 class="titleBetToken">How many tokens bet you ?</h2>
	     <input type="number" name="betTokens" class="inputbetTokens col-md-offset-2" min="1">
	      <input type="hidden" name="email" value="<?php echo $email; ?>">
	     <button type="submit" class="btn btn-success">Bet !</button>
	   </form>
	   </div>
	   <div class="modal-footer">
	    <button class="btn btn-success" data-dismiss='modal'>Close</button>
	   </div>
	  </div>
	 </div>
	</div>

	<div class="modal fade" id="outside">
	 <div class="modal-dialog modal-sm">
	  <div class="modal-content">
	   <div class="modal-header">
	     <button type="button" class="close" data-dismiss='modal'>X</button>
	    <h1 class="titleBetToken"><strong>Bet for the outside team</strong></h1>
	   </div>
	   <div class="modal-body">
	   <form action="betTokens" method="POST">
	    <h2 class="titleBetToken">How many tokens bet you ?</h2>
	     <input type="number" name="betTokens" class="inputbetTokens col-md-offset-2" min="1">
	      <input type="hidden" name="email" value="<?php echo $email; ?>">
	     <button type="submit" class="btn btn-success">Bet !</button>
	   </form>
	   </div>
	   <div class="modal-footer">
	    <button class="btn btn-success" data-dismiss='modal'>Close</button>
	   </div>
	  </div>
	 </div>
	</div>
	<script
  	src="https://code.jquery.com/jquery-3.2.1.min.js"
  	integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  	crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
    </div>
    
	</div>
</main>