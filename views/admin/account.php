<main>
<div class="container">
  <div class="row">

     <a href="#addEvent" data-toggle="modal" data-backdrop="static">
	    <div class="addEvent  col-md-2 col-md-offset-5">
	    	<p>Add event</p>
	    </div>
	</a>

  </div>
	<div class="modal fade" id="addEvent">
	 <div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
		 <button type="button" class="close" data-dismiss="modal">X</button>
		 <h1 class="col-md-6">Add new event</h1>
	     <img src="public/img/slogan.png" class="sloganEvent col-md-3 col-md-offset-2" alt="le slogan du site">
	    </div>
	    <div class="modal-body">
	    <form action="addEvents" method="POST" class="modalEvent">
		     <div class="container">
			   <table>
			   	 <tr>
		  			<td><label for="nameEvent">Name of the event</label></td>
		  		</tr>
		  		<tr class="col-md-12">
		  			<td><input type="text" id="nameEvent" name="nameEvent"  placeholder="Nom de l'équipe" class="form-group form-control inputNameEvent"></td>
		  		</tr>
			   	<tr>
		  			<td><label for="nameTeamDom">Name of team home</label><label for="nameTeamExt" class="col-md-offset-3">Name of team outside</label></td>
		  		</tr>
		  		<tr  class="col-md-12">
		  			<td><input type="text" id="nameTeamDom" name="nameTeamsDom"  placeholder="Home" class="form-group inputTeam col-md-11"></td>
		  			<td><p class="col-md-offset-12">VS</p></td>
		  			<td><input type="text" id="nameTeamExt" name="nameTeamsExt"  placeholder="Outside" class="form-group inputTeam col-md-offset-3 col-md-11"></td>
		  		</tr>
		  		<tr>
		  			<td><label for="cotesDom">CotesDom</label><label for="cotesNull" class="col-md-offset-3">CoteNull</label><label for="cotesExt" class="col-md-offset-3">CoteExt</label></td>
		  		</tr>
		  		<tr class="col-md-12">
		  			<td><input type="text" id="cotesDom" name="coteDom"  placeholder="Cote team home" class="inputCote"></td>
		  			<td><input type="text" id="cotesNull" name="coteNull"  placeholder="Cote match null"  class="inputCote"></td>
		  			<td><input type="text" id="cotesExt" name="coteExt"  placeholder="Cote team outside"  class="inputCote"></td>
		  		</tr>
		  		<tr>
		  			<td><label class="finishEvent">End date of the event</label></td>
		  		</tr>
		  		<tr>
		  			<td>
		  			  <select name="months">
		  			   <!-- <option value="months" disabled selected>Months</option> -->
	  			  		<?php
	  			  		  for ($i=12; $i >= 1; $i--) {
	  			  		  	if ($i <= 9) {
	  			  		  		$i = '0'.$i;
	  			  		  	}
	  			  		   	echo '<option value=\'' . $i . '\'>' . $i . '</option>';
	  			  		   } 
	  			  		?>
		  			  </select>
		  			  <select name="years">
		  			  <!-- <option value="years" disabled selected>Years</option> -->
	  			  		<?php
	  			  		$later = date("Y") + 5;
	  			  		$now = date("Y");
	  			  		  for ($i=$now ; $i <= $later; $i++) { 
	  			  		   	echo '<option value=\'' . $i . '\'>' . $i . '</option>';
	  			  		   } 
	  			  		?>
		  			  </select>
		  			  <select name="days">
		  			  <!-- <option value="days" disabled selected>Days</option> -->
	  			  		<?php
	  			  		  for ($i=31; $i >= 1; $i--) { 
	  			  		  	if ($i <= 9) {
	  			  		  		$i = '0'.$i;
	  			  		  	}
	  			  		   	echo '<option value=\'' . $i . '\'>' . $i . '</option>';
	  			  		   } 
	  			  		?>
		  			  </select>
		  			</td>
		  		</tr>
			   </table>
			  </div>
			  <button class="btn btn-success col-md-offset-5" type="submit">Add <span class="glyphicon glyphicon-plus"></span></button>
			</form>
	    </div>
	    <div class="modal-footer">
	    <button class="btn btn-success" data-dismiss="modal">Close</button>
	    </div>
	   </div>
	  </div>
	</div>
	<script
  	src="https://code.jquery.com/jquery-3.2.1.min.js"
  	integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  	crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <div class="col-md-offset-1 col-md-12">
	  <?php
	   foreach ($scope['myEvents'] as $key) {
		echo "<table class='col-md-3 events'>
				<caption class='nameOfEvent'>".$key->name_event."</caption>
				  <tr>
				    <td class='cotesMatch'>
				      <span class='displayCotes'>
				          <span class='choice'>1</span>".$key->coteDom."
				      </span>
				    </td>
				    <td class='cotesMatch'>
				      <span class='displayCotes'>
				          <span class='choice'>N</span>".$key->coteNull."
				      </span>
				    </td>
				    <td class='cotesMatch'>
				      <span class='displayCotes'>
				          <span class='choice'>2</span>".$key->coteExt."
				      </span>
				    </td>
				  </tr>
			</table>";
	   }
	  ?>
	</div>

  </div>
</main>
