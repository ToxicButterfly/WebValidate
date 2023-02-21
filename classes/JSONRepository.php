<?php
class JSONRepository
{
    private $data;
    private $filename= '\users.json';
    public function connect() {
        $data = file_get_contents(dirname(__FILE__,3).$this->filename);
        return json_decode($data, true);
    }

    //Сохраняем пользователя
    public function save($user) {
        $array = $this->data = $this->connect();
        if($this->unique_check($user->getLogin(),'login')){
            $error['login'] = 'Логин уже занят';
            return $error;
        }
        if($this->unique_check($user->getEmail(),'email')){
            $error['email'] = 'Почта уже использована';
            return $error;
        }
        $user->setPassword(crypt($user->getPassword(), md5($user->getLogin())));
        $array[] = $user;
        $jsonData = json_encode($array, JSON_PRETTY_PRINT);
        file_put_contents(dirname(__FILE__,3).$this->filename, $jsonData);
    }
    //Проверка на уникальность поля
    public function unique_check($check, $param): int
    {
        if(!empty($this->data)) {
            foreach ($this->data as $datum) {
                if ($datum[$param] == $check)
                    return 1;
            }
        }
        return 0;
    }
    //Проверка на существование пользователя
    public function user_check($login, $pass) {
        $array = $this->connect();
        $key=array_search($login, array_column($array, 'login'));
        if(empty($array))
            return $error['login'] = "Такого профиля нет";
        else if(hash_equals($array[$key]['password'], crypt($pass, md5($login))))
            return;
        else
            return $error['login'] = "Такого профиля нет";
    }
    public function delete($login){
        $arr=$this->connect();
        $key=array_search($login, array_column($arr, 'login'));
        unset($arr[$key]);
        $arr = array_values($arr);
        $jsonData = json_encode($arr, JSON_PRETTY_PRINT);
        file_put_contents(dirname(__FILE__,3).$this->filename, $jsonData);

    }
    public function updatePass($login, $oldPass, $newPass) {
        $arr=$this->connect();
        $key=array_search($login, array_column($arr, 'login'));
        if(hash_equals($arr[$key]['password'],  crypt($oldPass, md5($login)))){
            $arr[$key]['password'] = crypt($newPass, md5($login));
        }
        $arr = array_values($arr);
        $jsonData = json_encode($arr, JSON_PRETTY_PRINT);
        file_put_contents(dirname(__FILE__,3).$this->filename, $jsonData);
    }
}