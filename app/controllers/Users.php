<?php

class Users extends Controller
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                "name" => trim($_POST["name"]),
                "email" => trim($_POST["email"]),
                "password" => trim($_POST["password"]),
                "confirm_password" => trim($_POST["confirm_password"]),
                "name_err" => "",
                "email_err" => "",
                "password_err" => "",
                "confirm_password_err" => ""
            ];

            if (empty($data["name"])) {
                $data["name_err"] = "Please enter name";
            }

            if (empty($data["email"])) {
                $data["email_err"] = "Please enter email";
            } else {
                if ($this->userModel->findUserByEmail($data["email"])) {
                    $data["email_err"] = "Email is already registered";
                }
            }

            if (empty($data["password"])) {
                $data["password_err"] = "Please set a password";
            } elseif (strlen($data["password"]) < 8) {
                $data["password_err"] = "Password should be atleast 8 charecter long";
            }

            if (empty($data["confirm_password"])) {
                $data["confirm_password_err"] = "Please confirm the password";
            } elseif ($data["password"] !== $data["confirm_password"]) {
                $data["confirm_password_err"] = "Password doesn't match";
            }

            if (empty($data["name_err"]) && empty($data["email_err"]) && empty($data["password_err"]) && empty($data["confirm_password_err"])) {
                $data["password"] = password_hash($data["password"], PASSWORD_BCRYPT);

                if ($this->userModel->register($data)) {
                    flash("register_success", "You have successfully registered now you can login");
                    redirect("/users/login");
                } else {
                    die("Something went wrong");
                }
            } else {
                $this->view("templates/users/register", $data);
            }
        } else {
            $data = [
                "name" => "",
                "email" => "",
                "password" => "",
                "confirm_password" => "",
                "name_err" => "",
                "email_err" => "",
                "password_err" => "",
                "confirm_password_err" => ""
            ];

            $this->view("templates/users/register", $data);
        }
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                "email" => trim($_POST["email"]),
                "password" => trim($_POST["password"]),
                "email_err" => "",
                "password_err" => "",
            ];
            if (empty($data["email"])) {
                $data["email_err"] = "Please enter email";
            }

            if (!$this->userModel->findUserByEmail($data["email"])) {
                $data["email_err"] = "This email is not registered";
            }

            if (empty($data["password"])) {
                $data["password_err"] = "Please enter password";
            }

            if (empty($data["email_err"]) && empty($data["password_err"])) {
                $loggedInUser = $this->userModel->login($data["email"], $data["password"]);
                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data["password_err"] = "Incorrect password";
                    $this->view("templates/users/login", $data);
                }
            } else {
                $this->view("templates/users/login", $data);
            }
        } else {
            $data = [
                "email" => "",
                "password" => "",
                "name_err" => "",
                "password_err" => ""
            ];

            $this->view("templates/users/login", $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION["user_id"] = $user->id;
        $_SESSION["user_name"] = $user->name;
        $_SESSION["user_email"] = $user->email;
        redirect("posts");
    }

    public function logout()
    {
        unset($_SESSION["user_id"]);
        unset($_SESSION["user_name"]);
        unset($_SESSION["user_email"]);
        redirect("/users/login");
    }
}
