<?php
require_once '../repository/KontaktRepository.php';
require_once '../repository/OrtRepository.php';
/**
 * Controller für die Kontakte, siehe Dokumentation im DefaultController.
 */
  class KontaktController
  {
    /**
     * Default-Seite für die Kontakte: Zeigt alle Kontakte in einer Liste an
	 * Dispatcher: /kontakt
     */
    public function index()
    {
      $kontaktRepository = new KontaktRepository();
      $view = new View('kontakt_index');
      $view->title = 'Kontaktliste';
      $view->heading = 'Kontaktliste';
      $view->kontakte = $kontaktRepository->readAll();
      $view->display();
    }
    /**
     * Zeigt das Formular an zum Erfassen eines neuen Kontakts
	 * Dispatcher: /kontakt/create
     */
    public function create()
    {
      $kontaktRepository = new KontaktRepository();
      $ortRepository = new OrtRepository();
      $view = new View('kontakt_create');
      $view->title = 'Kontakt erfassen';
      $view->heading = 'Kontakt erfassen';
      $view->orte = $ortRepository->readAll();
      $view->display();
    }
    /**
     * Speichert einen neuen Kontakt in die DB und ruft die Indexseite auf
     */
    public function doCreate()
    {
      if ($_POST['send']) {
        $nachname = $_POST['nachname'];
        $vorname = $_POST['vorname'];
        $strasse = $_POST['strasse'];
        $oid = $_POST['oid'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $kontaktRepository = new KontaktRepository();
        $kontaktRepository->create($nachname, $vorname, $strasse, $oid, $email, $tel);
      }
      // Anfrage an die URI /entry weiterleiten (HTTP 302)
      header('Location: '.$GLOBALS['appurl'].'/kontakt');
    }
    /**
     * Zeigt das Formular an zum Editieren eines Kontakts
	 * Dispatcher: /kontakt/edit
     */
    public function edit()
    {
      $kontaktRepository = new KontaktRepository();
      $ortRepository = new OrtRepository();
      $view = new View('kontakt_create');
      $view->title = 'Kontakt editieren';
      $view->heading = 'Kontakt editieren';
      $view->kontakt = $kontaktRepository->readById($_GET['kid']);
      $view->orte = $ortRepository->readAll();
      $view->display();
    }
    /**
     * Speichert die Änderungen eines Kontakts in die DB und ruft die Indexseite auf
     */
    public function doEdit()
    {
      if ($_POST['send']) {
		$kid =  $_POST['kid'];
        $nachname = $_POST['nachname'];
        $vorname = $_POST['vorname'];
        $strasse = $_POST['strasse'];
        $oid = $_POST['oid'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $kontaktRepository = new KontaktRepository();
        $kontaktRepository->edit($kid, $nachname, $vorname, $strasse, $oid, $email, $tel);
      }
      // Anfrage an die URI /entry weiterleiten (HTTP 302)
      header('Location: '.$GLOBALS['appurl'].'/kontakt');
    }
    /**
     * Löscht auf der Indexseite einen Kontakt und ruft diese wieder auf
     */
    public function delete()
    {
      $kontaktRepository = new KontaktRepository();
      $kontaktRepository->deleteById($_GET['kid']);
      // Anfrage an die URI /entry weiterleiten (HTTP 302)
      header('Location: '.$GLOBALS['appurl'].'/kontakt');
    }
}
?>