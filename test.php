<?php
    require_once('sign_in.php');
if(isset($_POST['submit_sign_in'])){
    $infos = new sign();
    
    if(!( $infos->is_subscriber($_POST))){
        
        function alert(){
            ?>
                        <!-- Large modal
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>
    
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                ...
                </div>
            </div>
            </div> -->
        <?php        
        }
    }
    if(isset($_SESSION['user_id'])){
        // echo 'true';
    }else{
        $_SESSION['user_id']=$infos->get_user_id();
    }
    
    $infos->validate_user('http://localhost:8080/u1/selection.php','http://localhost:8080/u1/index.php?alert=true');

}else{
    header("Location: http://localhost:8080/u1/?alert=invalid");
    exit();
}
?>

