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

            if(isset($_POST['submit_selection'])){
                echo 'submited <pre>';
                print_r($_POST);echo '</pre>';
                $submit->insert_info($_POST);
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
                navbar_link('ثبت اطلاعات','selection.php',true);
                navbar_link('اطلاعات من','submit_selection.php',true);
                navbar_link(' نمایش کلی','#',true);
                navbar_link('  راهنما','#',true);

            navbar_destroy();
            ?>


<section class="container selection_body mt-4">

<form action="submit_selection.php" method="post" class="pb-5" id="form_inputs">
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




        <section class="container selection_body mt-4">

            <hr color="orange">
            <!-- finish head selection -->
            <table class="table table-primary table-hover table-responsive text-dark w-100 table-striped text-nowrap table-fixed">
                        <thead>
                        <tr class="bg-secondary">
                            <th>کد درس</th>
                            <th>نام درس</th>
                            <th> نظری</th>
                            <th> عملی</th>
                            <th>پیش نیاز</th>
                            <th>نوع</th>
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
            echo '<pre>echo';
            print_r($submit->get_id_book_count());
            echo '</pre>';


            //add foot 
            require_once('./theme/footer.php');
            add_index_file(true);
        ?>
        <!-- <script src="./js/submit_selection.js"></script> -->
        </div>

    </body>
</html>