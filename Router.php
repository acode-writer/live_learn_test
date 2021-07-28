<?php 

// namespace App;

class Router {
    
    public function route() {
        if(isset($_GET["url"])) {
            $url = $_GET["url"];
            $url = explode("/",filter_var($url,\FILTER_SANITIZE_URL));
            var_dump($url);
        }
    }
}
