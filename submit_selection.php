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
            echo 'session value is '.$_SESSION['user_id'].'<br >';
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
                if(($submit->show_info())){
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
        </div>
        
        <button type="submit"  class="hide_show btn btn-info ml-2 mt-3 mb-5 d-none" id="add_selection">افزودن</button>
        <button type="submit" name="submit_selection"  class="hide_show btn btn-primary ml-3 mt-3 mb-5 d-none" >ثبت تغییرات</button>
</form>
          
</div>

<section>




        <section class="container selection_body mt-4">

            <hr color="orange">
            <!-- finish head selection -->
            <table class="table table-primary text-right bordered table-hover table-responsive text-dark w-100 table-striped text-nowrap table-fixed">
                        <thead>
                        <tr class="bg-secondary">
                            <th>کد درس</th>
                            <th>نام درس</th>
                            <th> نظری</th>
                            <th> عملی</th>
                            <th>پیش نیاز</th>
                            <th>نوع</th>
                            <td>تعدادد فراد</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                            foreach($submit->show_all_book() as $key => $value){
                                foreach ($value as $k => $v) {
                                        ?>
                                            <?php
                                                echo '<tr>';
                                                echo '<td>'.$v->book_code.'</td>';
                                                echo '<td>'.$v->book_name.'</td>';
                                                echo '<td>واحد نظری '.$v->Theoretical_unit.'</td>';
                                                echo '<td>واحد عملی '.$v->Practical_unit.'</td>';
                                                echo '<td>پیش نیاز '.$v->prerequisite.'</td>';
                                                echo '<td>'.$v->book_type.'</td>';
                                                echo '<td>';
                                                       
                                                       ($submit->get_id_book_count());
                                                        ($submit->get_name_book_count());
                                                        
                                                        // print_r($submit->filter_user_book_info());
                                                        foreach($submit->filter_user_book_info() as $key => $value){
                                                            // print_r($value);
                                                            foreach($value as $k=>$s){
                                                               
                                                                if(($v->id==$s[0])){
                                                                    
                                                                    echo $value[2];
                                                                }
                                                            }
                                                        }
                                                           
                                                       
                                                       
                                                echo '</td>';
                                                echo '</tr>';

                                            ?>

                                    
                                        <?php
                                }
                            }
                        
                        
                        
                        ?>
                   </tbody>
                </table>
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
            echo '<script src="./js/submit_js.js"></script>';
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
        <!-- <script src="./js/submit_selection.js"></script> -->
        </div>

    </body>
</html>