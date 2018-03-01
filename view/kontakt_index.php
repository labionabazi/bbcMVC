<article class="hreview open special">
  <?php if (empty($kontakte)): ?>
	<div class="dhd">
	  <h2 class="item title">Es sind keine Kontakte vorhanden.</h2>
	</div>
  <?php else: ?>
	<div class="panel panel-default">
	  <div class="panel-body">
		<table class="table table-striped table-condensed">
		  <thead>
			<tr>
			  <th></th>
			  <th>Nachname</th>
			  <th>Vorname</th>
			  <th>Strasse</th>
			  <th>PLZ</th>
			  <th>Ort</th>
			  <th>E-Mail</th>
			  <th>Telefon</th>
			</tr>
		  </thead>
		  <tbody>
		  <?php
		    // Schleife über alle Kontakte, die jeweils in einer Tabellenzeile angezeigt werden.
			foreach($kontakte as $kontakt) {
			  echo "<tr>
				<td><a title='Löschen' href='".$GLOBALS['appurl']."/kontakt/delete?kid=".$kontakt->kid."' onklick='return confdel();'>
				<img src='../public/images/delete.png' border='no' onclick='return confdel();'></a></td>
				<td><a href='".$GLOBALS['appurl']."/kontakt/edit?kid=".$kontakt->kid."'>".$kontakt->nachname."</a></td>
				<td>".$kontakt->vorname."</td>
				<td>".$kontakt->strasse."</td>
				<td>".$kontakt->plz."</td>
				<td>".$kontakt->ort."</td>
				<td>".$kontakt->email."</td>
				<td>".$kontakt->tel."</td>
				</tr>\n";
			}
		  ?>
		  </tbody>
		</table>
	  </div>
	</div>
  <?php endif ?>
</article>
