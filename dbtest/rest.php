<?php
    include_once "db.php";
    include_once "util.php";
    $debug_mode = false;

    if ($_SERVER['REQUEST_METHOD']=='GET') {
        debug_text("GET METHD Process....",$debug_mode);
        echo json_encode(show_data($debug_mode));
    }else if($_SERVER['REQUEST_METHOD']=='POST'){
        debug_text("POST METHD Process....",$debug_mode);
        $message = array("status"=>print_r($_POST));
        echo json_encode($message);
    }else{
        debug_text("Error this site ",$debug_mode);
        http_response_code(405);
    }
    function show_data($debug_mode){
        $mydb = new db("root","","personal",$debug_mode);
        $data = $mydb->query("select * from data");
        $mydb->close();
        return $data;
    }
function add_data(){
    
}
?>