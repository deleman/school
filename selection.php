<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
            require_once('./theme/header.php');
            echo $_SESSION['user_id'];
            
                if(!isset($_POST['submit_selection'])){  
                    require_once('test.php');
                }
            
            //show proccess in here 
            require_once('./submit_process.php');
            $submit = new submit();
            if(isset($_POST['submit_selection'])){    
                if(count($submit->show_info())<=0){
                    $alert = $submit->insert_info_before_saveed($_POST);
                    echo '<pre> alert informations => ';print_r($alert);echo '</pre>';
                }
            }
            // echo 'session'.$_SESSION['user_id'].'<br ';
        ?>
    </head>
    <body>
    <body class="container-fluid" id="SlateBlue">
        <div id="app">
        <!-- adding nav bar -->
            <?php
            require_once('./submit_process.php');
            $submit = new submit();
            ?>
        <?php require_once('./theme/navbar.php');  ?>
            <?php
            //call function menues
            navbar_start();
                // var_dump($submit->sign_of_edit());
                if(($submit->sign_of_edit())){
                    navbar_link('ویرایش اطلاعات','change_selection.php',true);
                }else{
                    navbar_link('ثبت اطلاعات','selection.php',true);
                }
                navbar_link('اطلاعات من','submit_selection.php',true);
                navbar_link(' نمایش کلی','#',true);
                navbar_link('  راهنما','#',true);

            navbar_destroy();
            ?>
        <?php
        //show alert
        if(isset($alert['code'])){ ?>

            <div class="modal fade " id="newModal" role="dialog">
            <div class="modal-dialog">
            
            <div class="modal-content text-right <?php if($alert['code']==4){echo 'bg-primary text-light';}else{echo 'bg-warning';} ?> ">
                <div class="modal-header my-modal-header" >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <p class="modal-title my-modal-title"><?php echo $alert['info']; ?></p>
                </div>
                <div class="modal-body">
                <p>لطفا مشخصات خود را درست وارد کنید!!!</p>
                </div>
            </div>
            
            </div>
            </div>
        <?php } ?>
      

        <section class="container selection_body mt-4">

        <form action="<?php if(count($submit->show_info())){ echo 'submit_selection.php';}else{echo 'selection.php';} ?>" method="post" class="pb-5" id="form_inputs">
        <article class="container row pt-2">

            <div class="form-inline ">
                
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">ورودی سال</label>
                <select class="custom-select my-1 mr-sm-2" name="a[]" id="intry">
                    <option selecte value="">انتخاب کنید...</option>
                    <option value="year_94_95">94-95</option>
                    <option value="year_95_96">95-96</option>
                    <option value="year_96_97">96-97</option>
                </select>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label class="my-1 mr-2" name="a[]" for="inlineFormCustomSelectPref">انتخاب کتاب از ترم</label>
                <select class="custom-select my-1 mr-sm-2" id="term_name">
                    <option selected>انتخاب کنید....</option>
                    <option value="1">یک</option>
                    <option value="2">دو</option>
                    <option value="3">سه</option>
                    <option value="4">چهار</option>
                    <option value="5">پنج</option>
                    <option value="6">شش</option>
                    <option value="7">هفت</option>
                    <option value="8">هشت</option>
                </select>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div>
            </article>
            <hr color="orange">
            <!-- finish head selection -->
            <!-- finish head selection -->

            <div calss="row mb-5">  
           
                <div class="remove_inputs">
                </div>
                
                <button type="submit"  class="btn btn-info ml-2 mt-3 mb-5" id="add_selection">افزودن</button>
                <button type="submit" name="submit_selection"  class="btn btn-primary ml-3 mt-3 mb-5" >ثبت اطلاعات</button>
        </form>
                  
</div>

        <section>
        <?php
            require_once('./theme/footer.php');
            add_index_file(true);

            if(isset( $alert['code'])){   
                echo "<script>
                $(document).ready(function(){
                    $('#newModal').modal('show');
                    
                    $('#button1').click(function(){
                        $('#newModal').modal('hide');
                    });
                });
                </script>";
            }
        ?>
        </div>
    </body>
</html>