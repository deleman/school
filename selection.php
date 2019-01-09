<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
            require_once('./theme/header.php');
            require_once('test.php');
            // echo 'session'.$_SESSION['user_id'].'<br ';
        ?>
    </head>
    <body>
    <body class="container-fluid" id="SlateBlue">
        <div id="app">
        <header class="row" id="header">
            <div class="text-justify col-6">
                <h4 class="p-3 m-3 mr-4 text-light">پیش انتخاب واحد </h4>
            </div>
            <div class="col-6">
                <h4 class="p-3 m-3 mr-4 text-light">رشته کامپیوتر</h4>
            </div>
        </header>

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
        <?php
            require_once('./theme/footer.php');
            add_index_file(true);
        ?>
        </div>
    </body>
</html>