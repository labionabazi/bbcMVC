<?php
  require_once '../lib/Repository.php';
/**
 * Datenbankschnittstelle für die Orte
 */
  class OrtRepository extends Repository
  {
    protected $tableName = 'orte';
	protected $tableId = 'oid';
	protected $order = 'ort';
	/**
	* Gibt alle Orte in einem 2dimensonalen Array zurück
	*/
    public function readAll()
    {
      $query = "SELECT * FROM {$this->tableName} ORDER BY {$this->order}";
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
      return $rows;
    }
}
?>