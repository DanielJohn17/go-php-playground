<?php

namespace db;

use mysqli;
use mysqli_sql_exception;

global $conn;
$username = "root";
$password = "root";
$dbname = "student_list";

$conn = new DBConnection($username, $password, $dbname);

class DBConnection
{
  private $host;
  private $username;
  private $password;
  private $dbname;
  private $port;
  private $conn;

  public function __construct($username, $password, $dbname, $host = "localhost", $port = 3306)
  {
    $this->host = $host;
    $this->username = $username;
    $this->password = $password;
    $this->dbname = $dbname;
    $this->port = $port;

    $this->conn = $this->connect();
  }

  public function __destruct()
  {
    $this->close();
  }

  public function connect()
  {
    try {
      $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname, $this->port);

      if ($this->conn->connect_error) {
        throw new mysqli_sql_exception("Connection failed: " . $this->conn->connect_error);
      }

      $this->conn->set_charset("utf8mb4");
    } catch (mysqli_sql_exception $e) {
      echo "Connection failed: " . $e->getMessage();
      return false;
    }

    return $this->conn;
  }

  public function close()
  {
    if ($this->conn) {
      $this->conn->close();
    }
  }

  public function create_table()
  {
    $sql = "CREATE TABLE IF NOT EXISTS school_db (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(100),
            email VARCHAR(100),
            age INT
        )";

    if ($this->conn->query($sql) === TRUE) {
      echo "Table created successfully";
    } else {
      echo "Error creating table: " . $this->conn->error;
    }
  }

  public function fetch_students()
  {
    $result = $this->conn->query("SELECT * FROM school_db");
    $student_list = array();
    $student = array();
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $student['name'] = $row['name'];
        $student['email'] = $row['email'];
        $student['age'] = $row['age'];
        $student_list[$row["id"]] = $student;
        $student = array();
      }

      $result->close();
    } else {
      echo "0 results";
      return [];
    }

    return $student_list;
  }

  public function fetch_student($id)
  {
    $result = $this->conn->query("SELECT * FROM school_db WHERE id = $id");
    $student = array();
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $student['name'] = $row['name'];
        $student['email'] = $row['email'];
        $student['age'] = $row['age'];
      }
    } else {
      echo "0 results";
      return [];
    }

    return $student;
  }

  public function insert_data($name, $email, $age)
  {
    $insert_data = $this->conn->prepare("INSERT INTO school_db (name, email, age) VALUES (?, ?, ?)");
    $insert_data->bind_param("ssi", $name, $email, $age);

    if ($insert_data->execute()) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $insert_data->error;
      return false;
    }

    return true;
  }

  public function delete_data($id)
  {
    $delete_data = $this->conn->prepare("DELETE FROM school_db WHERE id = ?");
    $delete_data->bind_param("i", $id);

    if ($delete_data->execute()) {
      echo "Record deleted successfully";
    } else {
      echo "Error: " . $delete_data->error;
    }
  }

  public function update_data($id, $name, $email, $age)
  {
    $update_data = $this->conn->prepare("UPDATE school_db SET name = ?, email = ?, age = ? WHERE id = ?");
    $update_data->bind_param("ssii", $name, $email, $age, $id);

    if ($update_data->execute()) {
      echo "Record updated successfully";
    } else {
      echo "Error: " . $update_data->error;
      return false;
    }

    return true;
  }
}
