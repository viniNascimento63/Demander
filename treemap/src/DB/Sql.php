<?php

namespace Demander\DB;

class Sql
{

	const HOSTNAME = "127.0.0.1";
	const USERNAME = "root";
	const PASSWORD = "";
	const DBNAME = "db_demander";

	private $conn;

	public function __construct()
	{	
		$this->conn = new \PDO(
			"mysql:dbname=" . Sql::DBNAME . ";host=" . Sql::HOSTNAME,
			Sql::USERNAME,
			Sql::PASSWORD
		);
	}

	private function setParams($statement, $parameters = array())
	{
		foreach ($parameters as $key => $value) {

			$this->bindParam($statement, $key, $value);
		}
	}

	private function bindParam($statement, $key, $value)
	{
		$statement->bindParam($key, $value);
	}

	// Executa uma consulta
	public function query($rawQuery, $params = array())
	{
		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();
	}

	// Executa uma consulta e retorna um valor
	public function select($rawQuery, $params = array()): array
	{
		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
}
