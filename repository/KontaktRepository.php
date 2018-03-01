<?php
require_once '../lib/Repository.php';
/**
 * Datenbankschnittstelle für die Kontakte
 */
  class KontaktRepository extends Repository
  {
    protected $tableName = 'kontakte';
	protected $tableId = 'kid';
	protected $order = 'Nachname, Vorname';
	/**
	* Gibt alle Kontakte in einem 2dimensonalen Array zurück.
	* Die Methode überschreibt diejenige in Repository, weil ein JOIN notwendig ist,
	* um PLZ + Ort anzuzeigen.
	*/
    public function readAll()
    {
      $query = "SELECT * FROM {$this->tableName} k LEFT JOIN orte o ON k.oid = o.oid ORDER BY {$this->order}";

      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->execute();

      $result = $statement->get_result();
      if (!$result) {
        throw new Exception($statement->error);
      }

      // Datensätze aus dem Resultat holen und in das Array $rows speichern
      $rows = array();
      while ($row = $result->fetch_object()) {
		$rows[] = $row;
      }
	  $statement->close();
      return $rows;
    }
	/**
	* Fügt einen neuen Kontakt in die DB ein
	*/
    public function create($nachname, $vorname, $strasse, $oid, $email, $tel)
    {
      $query = "INSERT INTO $this->tableName (nachname, vorname, strasse, oid, email, tel) VALUES (?,?,?,?,?,?)";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('sssiss', $nachname, $vorname, $strasse, $oid, $email, $tel);

      if (!$statement->execute()) {
        throw new Exception($statement->error);
      }

	  $statement->close();
    }
	/**
	* Schreibt die Änderungen eines Kontakts in die DB
	*/
	public function edit($kid, $nachname, $vorname, $strasse, $oid, $email, $tel)
    {
	  $query = "UPDATE $this->tableName SET nachname=?, vorname=?, strasse=?, oid=?, email=?, tel=? WHERE $this->tableId=?";
      $statement = ConnectionHandler::getConnection()->prepare($query);
      $statement->bind_param('sssissi', $nachname, $vorname, $strasse, $oid, $email, $tel, $kid);

      if (!$statement->execute()) {
        throw new Exception($statement->error);
      }

	  $statement->close();
    }
  }
?>