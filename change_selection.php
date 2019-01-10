<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
            require_once('./theme/header.php');
            
            // echo $_SESSION['user_id'];
            //show proccess in here 
            require_once('./submit_process.php');
            $submit = new submit();
            
            echo '<pre>';
                // print_r($submit->get_all_info('year_94_95','1'));
                // print_r($submit->show_info());
                // print_r($submit->get_year());

                // print_r($submit->show_info_selected());
                
                print_r($submit->get_all_informations());
            echo '</pre>';
            if(isset($_POST['submit_selection'])){
                // echo 'submited <pre>';
                //print_r($_POST);echo '</pre>';
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
                navbar_link(' نمایش کلی','#',true);
                navbar_link('  راهنما','#',true);

            navbar_destroy();
            ?>


<section class="container selection_body mt-4">

<form action="submit_selection.php" method="post" class="" id="form_inputs">
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
        <?php 
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
                echo '<select class="custom-select" name="a[]" id="inputGroupSelect02">';
                echo '</select>';
                    //option is in here    
                echo '<button type="button" class="close" data-dismiss="alert" id="closealert" aria-label="Close">';
                echo '<span aria-hidden="true">&times;</span>';
                echo '</button>';

                echo '</div>';
                ?>
        </div>
        
        <button type="submit"  class="btn btn-info ml-2 mt-3 mb-5 hide_show d-none" id="add_selection">افزودن</button>
        <button type="submit" name="submit_selection"  class="btn btn-primary ml-3 mt-3 mb-5 hide_show d-none" >ثبت تغییرات</button>
</form>
          
</div>

<section>




        <section class="container selection_body mt-4">

            <!-- finish head selection -->
           
            <article calss="row mb-5">  
    

            </article>

            <article>    

            </article>

            <article>
       
            </article>

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