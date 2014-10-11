<?php
namespace DB;
final class MySQL {
	private $link;

	public function __construct($hostname, $username, $password, $database) {
		if (!$this->link = mysql_connect($hostname, $username, $password)) {
			trigger_error('Error: Could not make a database link using ' . $username . '@' . $hostname);
		}

		if (!mysql_select_db($database, $this->link)) {
			trigger_error('Error: Could not connect to database ' . $database);
		}

		mysql_query("SET NAMES 'utf8'", $this->link);
		mysql_query("SET CHARACTER SET utf8", $this->link);
		mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $this->link);
		mysql_query("SET SQL_MODE = ''", $this->link);
		
		/* @multitenant */
		/* pass tenant_id value to db context */
		global $tenant_id;
		if ($tenant_id > -1 || $tenant_id == -99) {
			mysql_query("DECLARE @COMPANY_ID BIGINT", $this->link);
			mysql_query("SET @COMPANY_ID = " . $tenant_id, $this->link);
		
			mysql_query("DECLARE @TENANT_ID BIGINT", $this->link);
			mysql_query("SET @TENANT_ID = " . $tenant_id, $this->link);
		}
	}

	public function query($sql) {
		if ($this->link) {
			$resource = mysql_query($sql, $this->link);

			if ($resource) {
				if (is_resource($resource)) {
					$i = 0;

					$data = array();

					while ($result = mysql_fetch_assoc($resource)) {
						$data[$i] = $result;

						$i++;
					}

					mysql_free_result($resource);

					$query = new stdClass();
					$query->row = isset($data[0]) ? $data[0] : array();
					$query->rows = $data;
					$query->num_rows = $i;

					unset($data);

					return $query;
				} else {
					return true;
				}
			} else {
				$trace = debug_backtrace();

				trigger_error('Error: ' . mysql_error($this->link) . '<br />Error No: ' . mysql_errno($this->link) . '<br /> Error in: <b>' . $trace[1]['file'] . '</b> line <b>' . $trace[1]['line'] . '</b><br />' . $sql);
			}
		}
	}

	public function escape($value) {
		if ($this->link) {
			return mysql_real_escape_string($value, $this->link);
		}
	}

	public function countAffected() {
		if ($this->link) {
			return mysql_affected_rows($this->link);
		}
	}

	public function getLastId() {
		if ($this->link) {
			return mysql_insert_id($this->link);
		}
	}

	public function __destruct() {
		if ($this->link) {
			mysql_close($this->link);
		}
	}
}