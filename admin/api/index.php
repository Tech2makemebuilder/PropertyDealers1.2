<?php

/*
* Hey guys! Arc here
* So this is just a single file api that has very basic functionality to be used by very basic applications
* All the functions here are clearly documented
* If you still need help with understanding what's happening here, feel free to ping me via email
* Here's my email nairadisi18ce@student.mes.ac.in
*/

// Database Connection
require_once '../../wp-config.php';

// start the session
session_start();

// connect to DB
DB::connect();

// receive JSON input - process - send JSON output
echo json_encode(process(json_decode(file_get_contents('php://input'))));

// function to process input
function process($input) {
  // check if query is present in input
  if (isset($input->query)) {
    // check if query processor exists
    if (class_exists($input->query)) {
      // check if query does not require authentication or if already authenticated
      if (!$input->query::requiresAuthentication() || isset($_SESSION['id'])) {
        // pass parameters to the query processor if any
        if (isset($input->params)) {
          return $input->query::process($input->params);
        }
        else return $input->query::process();
      }
      else return handleError(ErrorCode::AUTH_REQUIRED);
    }
    else return handleError(ErrorCode::NOT_FOUND);
  }
  else return handleError(ErrorCode::QUERY_NOT_DEFINED);
}

// function to handle errors
function handleError($code) {
  switch($code) {
    case ErrorCode::AUTH_REQUIRED:
      $responseCode = 403;
      $responseMessage = 'You need to be authenticated!';
      break;
    case ErrorCode::NOT_FOUND:
      $responseCode = 404;
      $responseMessage = 'What you\'re asking is out of my capabilities!';
      break;
    case ErrorCode::QUERY_NOT_DEFINED:
      $responseCode = 400;
      $responseMessage = 'What are you asking me?';
      break;
    case ErrorCode::AUTHORIZATION_NOT_PRESENT:
      $responseCode = 400;
      $responseMessage = 'Basic Authorization token is not present!';
      break;
    case ErrorCode::DB_CONNECTION_ERROR:
      $responseCode = 500;
      $responseMessage = 'There is an issue with the database connection!';
      break;
    case ErrorCode::USER_NOT_FOUND:
      $responseCode = 404;
      $responseMessage = 'Email not found! Do you really have access to this panel?';
      break;
    case ErrorCode::INCORRECT_PASSWORD:
      $responseCode = 400;
      $responseMessage = 'Your password is incorrect!';
      break;
    default:
      $responseCode = 500;
      $responseMessage = 'Unknown error';
  }
  // respond
  http_response_code($responseCode);
  return $responseMessage;
}

// abstract class for error codes
abstract class ErrorCode {
  const NOT_FOUND = 404;
  const AUTH_REQUIRED = 1001;
  const QUERY_NOT_DEFINED = 1002;
  const AUTHORIZATION_NOT_PRESENT = 1003;
  const DB_CONNECTION_ERROR = 500;
  const USER_NOT_FOUND = 1004;
  const INCORRECT_PASSWORD = 1005;
}

// database connection instance
abstract class DB {
  private const HOST = DB_HOST;
  private const DATABASE = DB_NAME;
  private const USERNAME = DB_USER;
  private const PASSWORD = DB_PASSWORD;
  public static $conn = null;
  public static function connect() {
    try {
      self::$conn = new PDO('mysql:host='.self::HOST.';dbname='.self::DATABASE, self::USERNAME, self::PASSWORD);
      self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
      die(handleError(ErrorCode::DB_CONNECTION_ERROR));
    }
  }
}

abstract class QueryProcessor {
  public static abstract function requiresAuthentication();
  public static abstract function process($params = null);
}

class Login extends QueryProcessor {
  public static function requiresAuthentication() {
    return false;
  }
  public static function process($params = null) {
    // check if authorization header is present
    $headers = getallheaders();
    if (isset($headers['Authorization'])) {
      $rawData = explode(' ', $headers['Authorization']);
      if ($rawData[0] === 'Basic') {
        // decode base64 auth data
        $data = base64_decode($rawData[1]);
        [$email, $password] = explode(':', $data);
        // get info from db
        $PDOStatement = DB::$conn->prepare('SELECT password, aid FROM csipce_admins WHERE email = :email');
        $PDOStatement->bindParam(':email', $email, PDO::PARAM_STR);
        $PDOStatement->execute();
        $userInfo = $PDOStatement->fetch(PDO::FETCH_ASSOC);
        // check if user exists
        if ($userInfo !== false) {
          // verify password
          if (password_verify($password, $userInfo['password'])) {
            // set session
            $_SESSION['id'] = $userInfo['id'];
            return 'Successful login!';
          }
          else return handleError(ErrorCode::INCORRECT_PASSWORD);
        }
        else return handleError(ErrorCode::USER_NOT_FOUND);
      }
      else return handleError(ErrorCode::AUTHORIZATION_NOT_PRESENT);
    }
    else return handleError(ErrorCode::AUTHORIZATION_NOT_PRESENT);
  }
}

class GetCommittee extends QueryProcessor {
  public static function requiresAuthentication() {
    return false;
  }
  public static function process($params = null) {
    $data = DB::$conn->query('SELECT id, name, post, image, term FROM csipce_committee ORDER BY term DESC')->fetchAll(PDO::FETCH_ASSOC);
    $PDOStatement = DB::$conn->prepare('SELECT name, image FROM csipce_subcommittee WHERE head = :head');
    foreach($data as &$item) {
      $PDOStatement->bindValue(':head', $item['id'], PDO::PARAM_INT);
      $PDOStatement->execute();
      $item['members'] = $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
    }
    return $data;
  }
}




class AddCommittee extends QueryProcessor {
  public static function requiresAuthentication() {
    return false;
  }
  public static function process($params = null) {
    $data = explode(',', $params->image);
    $fileName = $params->name.uniqid().'.'.explode(';', explode('/', $data[0])[1])[0];
    $file = fopen('../../wp-content/uploads/committee/'.$fileName, 'wb');

    fwrite($file, base64_decode($data[1]));
    fclose($file);
    $PDOStatement = DB::$conn->prepare('INSERT INTO csipce_committee (name, post, image, term) VALUES (:name, :post, :image, :term)');
    $PDOStatement->bindParam(':name', $params->name, PDO::PARAM_STR);
    $PDOStatement->bindParam(':post', $params->post, PDO::PARAM_STR);
    $PDOStatement->bindParam(':image', $fileName, PDO::PARAM_STR);
    $PDOStatement->bindParam(':term', $params->term, PDO::PARAM_STR);
    $PDOStatement->execute();
    return ['id' => DB::$conn->lastInsertId(), 'image' => $fileName];
  }
}

class UpdateCommittee extends QueryProcessor {
  public static function requiresAuthentication() {
    return false;
  }
  public static function process($params = null) {
    $PDOStatement = DB::$conn->prepare('UPDATE csipce_committee SET name = :name, post = :post, image = :image, term = :term WHERE id = :id');
    $PDOStatement->bindParam(':name', $params->name, PDO::PARAM_STR);
    $PDOStatement->bindParam(':post', $params->post, PDO::PARAM_STR);
    $PDOStatement->bindParam(':image', $params->image, PDO::PARAM_STR);
    $PDOStatement->bindParam(':term', $params->term, PDO::PARAM_STR);
    $PDOStatement->bindParam(':id', $params->id, PDO::PARAM_INT);
    $PDOStatement->execute();
  }
}

class DeleteCommittee extends QueryProcessor {
  public static function requiresAuthentication() {
    return false;
  }
  public static function process($params = null) {
    $PDOStatement = DB::$conn->prepare('DELETE FROM csipce_committee WHERE id = :id');
    $PDOStatement->bindParam(':id', $params->id, PDO::PARAM_INT);
    $PDOStatement->execute();
  }
}


//FROM HERE SUBCOMMITEE STARTS DONE BY Bhushan Pradhan

class GetSubCommittee extends QueryProcessor {
  public static function requiresAuthentication() {
    return false;
  }
  public static function process($params = null) {
    $data = DB::$conn->query('SELECT id, name,  image, head FROM csipce_subcommittee ORDER BY head')->fetchAll(PDO::FETCH_ASSOC);
    $PDOStatement = DB::$conn->prepare('SELECT name, image FROM csipce_subcommittee WHERE head = :head');
    foreach($data as &$item) {
      $PDOStatement->bindValue(':head', $item['id'], PDO::PARAM_INT);
      $PDOStatement->execute();
      $item['members'] = $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
    }
    return $data;
  }
}



class AddSubCommittee extends QueryProcessor {
  public static function requiresAuthentication() {
    return false;
  }
  public static function process($params = null) {
    $data = explode(',', $params->image);
    $fileName = $params->name.uniqid().'.'.explode(';', explode('/', $data[0])[1])[0];
    $file = fopen('../../wp-content/uploads/committee/'.$fileName, 'wb');
    fwrite($file, base64_decode($data[1]));
    fclose($file);
    $PDOStatement = DB::$conn->prepare('INSERT INTO csipce_subcommittee (name, image, head) VALUES (:name, :image, :head)');
    $PDOStatement->bindParam(':name', $params->name, PDO::PARAM_STR);
    $PDOStatement->bindParam(':image', $fileName, PDO::PARAM_STR);
    $PDOStatement->bindParam(':head', $params->head, PDO::PARAM_STR);
    $PDOStatement->execute();
    return ['id' => DB::$conn->lastInsertId(), 'image' => $fileName];
  }
}



class DeleteSubCommittee extends QueryProcessor {
  public static function requiresAuthentication() {
    return false;
  }
  public static function process($params = null) {
    $PDOStatement = DB::$conn->prepare('DELETE FROM csipce_subcommittee WHERE id = :id');
    $PDOStatement->bindParam(':id', $params->id, PDO::PARAM_INT);
    $PDOStatement->execute();
  }
}
