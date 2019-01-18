<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
            require_once('./theme/header.php');
            if(!isset($_SESSION['user_id'])){
                header("Location:http://localhost:8080/u1/index.php?alert=invalid");
            }
            require_once('./show_all_proccess.php');
            $submit = new submit();
            $general_info = new show_general_info();
             //محاسبه ی تعداد تکرار یک کتاب یا تعداد افراد ی که ی ک کتاب را گرفته اند
                $all_names=Array();
                $fileter_names = Array();
                    foreach($general_info->show_all_book() as $key => $value){
                        foreach($value as $k => $v){
                            $break=false;
                            foreach($all_names as $k_all => $v_all){
                                
                                if(in_array($v->book_code,$v_all)){
                                    
                                    $all_names[$k_all][6]+=1;
                                    $break=true;
                                    break;
                                }
                                if($break==true ){
                                    $fileter_names=Array();
                                    break;
                                }
                            }
                            if($break==true ){
                                $fileter_names=Array();
                                break;
                            }
                            
                            array_push($fileter_names,$v->book_code);
                            array_push($fileter_names,$v->book_name);
                            array_push($fileter_names,$v->Theoretical_unit);
                            array_push($fileter_names,$v->Practical_unit);
                            array_push($fileter_names,$v->prerequisite);
                            array_push($fileter_names,$v->book_type);
                            array_push($fileter_names,1);
                        
                        }
                        if(count($fileter_names)){
                            array_push($all_names,$fileter_names);
                        }
                        $fileter_names=Array();
                    }
                //پایان محاسبات مربوط به برگرداندن تعداد افراد گرفته شده یک کتاب
                
            // echo $_SESSION['user_id'];
            //show proccess in here 
            require_once('./submit_process.php');
            $submit = new submit();
            
            if(isset($_POST['submit_selection'])){
                
                if(count($submit->show_info())){
                    $alert = $submit->insert_info($_POST);
                }
            }else{
                //echo 'false';
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
                navbar_link(' نمایش کلی','show_all.php',true);
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
                            foreach($all_names as $key => $value){
                                    if(in_array($value[0],$submit->show_code_book_selected())){

                                        echo '<tr>';
                                            foreach($value as $k => $v){
                                                echo '<td>'.$v.'</td>';
                                            }
                                        echo '</tr>';
                                    }
                            }
                        ?> 
                   </tbody>
                   <tfoot>
                       <tr  class="bg-success " style="color:floralwhite;">
                           <td>ورودی</td>
                           <td><?php echo substr($submit->get_year(),5);?></td>
                           <td>جمع کل واحد های گرفته شده</td>
                           <td><?php echo $_SESSION['sum_units'];?></td>
                           <td colspan="3"></td>
                       </tr>
                   </tfoot>
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