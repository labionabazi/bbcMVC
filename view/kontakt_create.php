<?php
  /**
   * Formular zum Erstellen und Ändern eines Kontaktes.
   * Das Formular wird mithilfe des Formulargenerators erstellt.
   */
  $lblClass = "col-md-2";
  $eltClass = "col-md-4";
  if (!empty($kontakt)) {
	$kid = "<input type='hidden' name='kid' value='{$kontakt->kid}' />\n";
	$nachname = $kontakt->nachname;
	$vorname = $kontakt->vorname;
	$strasse = $kontakt->strasse;
	$oid = $kontakt->oid;
	$email = $kontakt->email;
	$tel = $kontakt->tel;
	$action = "doEdit";
  } else {
	$kid = "";
	$nachname = "";
	$vorname = "";
	$strasse = "";
	$oid = 0;
	$email = "";
	$tel = "";
	$action = "doCreate";
  }
  $form = new Form($GLOBALS['appurl']."/kontakt/$action");
  $select = new SelectBuilder();
  $button = new ButtonBuilder();
  echo $kid;
  echo $form->input()->label('Nachname')->name('nachname')->type('text')->value($nachname)->lblClass($lblClass)->eltClass($eltClass);
  echo $form->input()->label('Vorname')->name('vorname')->type('text')->value($vorname)->lblClass($lblClass)->eltClass($eltClass);
  echo $form->input()->label('Strasse')->name('strasse')->type('text')->value($strasse)->lblClass($lblClass)->eltClass($eltClass);
  echo $select->label('PLZ + Ort')->name('oid')->lblClass($lblClass)->eltClass($eltClass);
  foreach($orte as $ort) {
	$selected = "";
	if ($oid == $ort->oid) $selected = "selected";
	echo "<option value='".$ort->oid."' $selected>".$ort->plz." ".$ort->ort."</option>\n";
  }
  echo $select->end();
  echo $form->input()->label('E-Mail')->name('email')->type('email')->value($email)->lblClass($lblClass)->eltClass($eltClass);
  echo $form->input()->label('Telefon')->name('tel')->type('text')->value($tel)->lblClass($lblClass)->eltClass($eltClass);
  echo $button->start($lblClass, $eltClass);
  echo $button->label('speichern')->name('send')->type('submit')->class('btn-success');
  echo $button->label('abbrechen')->name('abort')->type('link')->class('btn-warning')->link('/kontakt');
  echo $button->end();
  echo $form->end();
?>