<?php

class UserController extends Controller implements ControllerInterface
{

  public function index()
  {
    try {
      switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
          // verify if the user is logged in
          if (!isset($_SESSION['user_id'])) {
            throw new DisplayedException(401);
          }
          $userModel = $this->model('UserModel');
          $data = $userModel->getUserById($_SESSION['user_id']);
          // print_r($data);
          $editProfilerPage = $this->view('user', 'EditProfile', get_object_vars($data));
          $editProfilerPage->render();
          exit;

        case 'POST':
        // verify if the user is logged in
        // $userModel = $this->model('UserModel');
        // $userId = $userModel->login($_POST);
        // $_SESSION['user_id'] = $userId;

        // // send response redirect to client 
        // header('Content-Type: application/json');
        // http_response_code(201);
        // $url = json_encode(["url" => BASE_URL . "/home"]);
        // echo $url;
        // die();

        default:
          throw new DisplayedException(405);
      }
    } catch (DisplayedException $e) {
      if ($e->getCode() === 401) {
        http_response_code(401);
        header("location: " . BASE_URL . "/Unauthorized");
      } else {
        // http_response_code($e->getCode());
      }
      
      die();
    }
  }

  public function login()
  {
    try {
      switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
          $loginPage = $this->view('user', 'Login');
          $loginPage->render();
          exit;

        case 'POST':
          // verify if the username and password are correct
          $userModel = $this->model('UserModel');
          $userId = $userModel->login($_POST);
          $_SESSION['user_id'] = $userId;

          // send response redirect to client 
          header('Content-Type: application/json');
          http_response_code(201);
          $url = json_encode(["url" => BASE_URL . "/home"]);
          echo $url;
          die();

        default:
          throw new DisplayedException(405);
      }
    } catch (DisplayedException $e) {
      http_response_code($e->getCode());
      die();
    }
  }

  public function register()
  {
    try {
      switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
          $registerPage = $this->view('user', 'Register');
          $registerPage->render();
          exit;

        case 'POST':
          // verify if the username are available
          $userModel = $this->model('UserModel');
          $userModel->register($_POST);

          // send response redirect to client 
          header('Content-Type: application/json');
          http_response_code(201);
          $url = json_encode(["url" => BASE_URL . "/home"]);
          echo $url;
          die();

        default:
          throw new DisplayedException(405);
      }
    } catch (Exception $e) {
      http_response_code($e->getCode());
      die();
    }
  }
  // public function test()
  // {
  //   $userModel = $this->model('UserModel');
  //   $data = array(
  //     'username' => 'asd',
  //     'password' => 'asd',
  //   );
  //   $result = $userModel->login($data);
  //   echo $result;
  // }
}