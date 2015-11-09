<?php
namespace saso\classes\base;

class Dispatcher{
    private $_sysRoot;
    
    public function setSystemRoot($path){
        $this->_sysRoot = rtrim($path, '/');
    }
    public function dispatch(){
        $param = preg_replace('/\/?$/', '', $_SERVER['REQUEST_URI']);
        $program_dir = preg_replace('/\//','\/',PROGRAM_DIR);
        $param = preg_replace('/'.$program_dir.'/', '', $param);
        $param = preg_replace('/^\/*/', '', $param);
        
        $params = array();
        if('' != $param){
            $params = explode('/', $param);
        }
        
        //_GET(UrlParameter用)
        if(2 < count($params)){
            if(1 == count($params)%2){
                array_pop($params);
            }
            for($i = 2; $i < count($params); $i++){
                $_GET[$i] = $params[$i];
            }
        }
       
        //controller
        if(isset($params[0]) && 'start' == $params[0] && 'start' == $params[1]){
            header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/',TRUE,'301');
        }
        
        $controller = 'start';
        if(0 < count($params)){
            $controller = $params[0];
        }
        
        $className = ucfirst(strtolower($controller)) . 'Controller';
        $className = '\\saso\\classes\\controllers\\' . $className;
        try{
            $controllerInstance = new $className();
        }catch(\Exception $e){
            $ctrlbase = new \saso\classes\controllers\ControllerBase();
            $ctrlbase->error($e->getMessage());
            die();
        }
        
        //action
        if(isset($params[0]) && !isset($params[1])){
            header('Location: http://'.$_SERVER['HTTP_HOST'] . '/' . PROGRAM_DIR . '/' . $controller . '/start/',TRUE,'301');
        }

        $action = 'start';
        if(1 < count($params)){
            $action = $params[1];
        }
        
        $actionMethod = $action . 'Action';
        try{
            if(!method_exists($controllerInstance, $actionMethod)){
                throw new \Exception('notFound');
            }
            $controllerInstance->$actionMethod();
        }catch(\Exception $e){
            $ctrlbase = new \saso\classes\controllers\ControllerBase();
            $ctrlbase->error($e->getMessage());
            die();
        }
    }
}

