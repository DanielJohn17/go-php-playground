<?php

namespace db;

use mysqli;
use mysqli_sql_exception;

/**
 * Database connection script
 * 
 * This script establishes a connection to the database using credentials from environment variables.
 * It also includes methods for creating a table, fetching, inserting, updating, and deleting records.
 * 
 * @package db
 */

global $conn;
$username = "root";
$password = "root";
$dbname = "student_list";

if (!$username || !$password || !$dbname) {
  die("Database credentials are not set.");
}

$conn = new DBConnection($username, $password, $dbname);


/** 
 * Database connection class
 * 
 */
class DBConnection
{
  private $host;
  private $username;
  private $password;
  private $dbname;
  private $port;
  private $conn;

  /**
   * Constructor to initialize the database connection
   * 
   * @param string $username Database username
   * @param string $password Database password
   * @param string $dbname Database name
   * @param string $host Database host (default: localhost)
   * @param int $port Database port (default: 3306)
   */
  public function __construct($username, $password, $dbname, $host = "localhost", $port = 3306)
  {
    $this->host = $host;
    $this->username = $username;
    $this->password = $password;
    $this->dbname = $dbname;
    $this->port = $port;

    $this->conn = $this->connect();
  }

  /**
   * Destructor to close the database connection
   */
  public function __destruct()
  {
    $this->close();
  }

  /**
   * Establish a connection to the database
   * 
   * @return mysqli|false Returns the mysqli connection object on success, or false on failure
   */
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

  /**
   * Close the database connection
   */
  public function close()
  {
    if ($this->conn) {
      $this->conn->close();
    }
  }

  /**
   * Fetch all students from the database
   * 
   * @return array Returns an associative array of students
   */
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

  /**
   * Fetch a single student by ID
   * 
   * @param int $id The ID of the student to fetch
   * @return array Returns an associative array of the student
   */
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

  /**
   * Insert a new student into the database
   * 
   * @param string $name The name of the student
   * @param string $email The email of the student
   * @param int $age The age of the student
   * @return bool Returns true on success, or false on failure
   */
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

  /**
   * Delete a student from the database
   * 
   * @param int $id The ID of the student to delete
   * @return bool Returns true on success, or false on failure
   */
  public function delete_student($id)
  {
    $delete_data = $this->conn->prepare("DELETE FROM school_db WHERE id = ?");
    $delete_data->bind_param("i", $id);

    if ($delete_data->execute()) {
      echo "Record deleted successfully";
    } else {
      echo "Error: " . $delete_data->error;
      return false;
    }

    return true;
  }

  /**
   * Update a student's information in the database
   * 
   * @param int $id The ID of the student to update
   * @param string $name The new name of the student
   * @param string $email The new email of the student
   * @param int $age The new age of the student
   * @return bool Returns true on success, or false on failure
   */
  public function update_student($id, $name, $email, $age)
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
