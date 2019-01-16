<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
            require_once('./theme/header.php');
            
            //show proccess in here 
            require_once('./submit_process.php');
            $submit = new submit();
            
            if(isset($_POST['submit_selection'])){
                $alert = $submit->insert_info($_POST);
            }else{
                echo 'false';
            }
            $submit->show_info();

        ?>
    </head>
    <body>
    <body class="container-fluid" id="SlateBlue">            
        
        <div id="app">

        <?php require_once('./theme/navbar.php');  ?>
            <?php
            //call function menues
            navbar_start();
                if(($submit->sign_of_edit())){
                    navbar_link('ویرایش اطلاعات','change_selection.php',true);
                }else{
                    navbar_link('ثبت اطلاعات','selection.php',true);
                }
                navbar_link('اطلاعات من','submit_selection.php',true);
                navbar_link(' نمایش کلی','show_all.php',true);
                navbar_link('  راهنما','#',true);

            navbar_destroy();
            ?>


<section class="container selection_body mt-4">

<form action="submit_selection.php" method="post" class="" id="form_inputs">
<article class="container row pt-2">

    <div class="form-inline ">
        
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">ورودی سال</label>
        <select class="custom-select my-1 mr-sm-2"  name="a[]" id="intry">
            <option  value="">انتخاب کنید...</option>
            <?php foreach($submit->get_all_term_names() as $key => $value){ ?>
            <option value="year_<?php echo $value;?>"  <?php 
                $year = trim($submit->get_year());
                $val =trim('year_'.trim($value));
                if($year == $val){
                    echo 'selected';
            
                }    
            ?>><?php echo $value; ?></option>
            
            <?php } ?>
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
        <?php 
                foreach($submit->show_info() as $key => $book_id){
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
                        echo '<select class="custom-select" name="a[]" id="inputGroupSelect02">';
                            //option is in here 
                            $selected_books_id=$submit->show_info();
                            foreach($submit->get_all_info_by_term_name() as $key => $value){
                                if($key % 7 ==0){
                                    echo "<option ";
                                    if($value ==$book_id){echo 'selected';};
                                    echo ">";
                                    
                                }
                                echo $value.' - ';
                                if($key % 7 ==6){
                                    echo '</option>';
                                }

                            }
                        echo '</select>';
                        echo '<button type="button" class="close" data-dismiss="alert" id="closealert" aria-label="Close">';
                            echo '<span aria-hidden="true">&times;</span>';
                        echo '</button>';
                    echo '</div>';
                    }


                ?>
        </div>
        
        <button type="submit"  class="btn btn-info ml-2 mt-3 mb-5 hide_show " id="add_selection">افزودن</button>
        <button type="submit" name="submit_selection"  class="btn btn-primary ml-3 mt-3 mb-5 hide_show " >ثبت تغییرات</button>
</form>
          
</div>

<section>




        
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
        <?php } 
        //finish show alert
            //add foot 
            require_once('./theme/footer.php');
            //show alrts
            
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
        <script src="./js/change_selection.js"></script>
        </div>

    </body>
</html>