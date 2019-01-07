<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
            require_once('./theme/header.php');
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

            <article class="container row pt-2">

                <form class="form-inline ">
                    


                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">وروی سال</label>
                    <select class="custom-select my-1 mr-sm-2" id="intry">
                        <option selecte>انتخاب کنید...</option>
                        <option value="year_94_95">94-95</option>
                        <option value="year_95_96">95-96</option>
                        <option value="year_96_97">96-97</option>
                    </select>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="my-1 mr-2" for="inlineFormCustomSelectPref">پیش انتخاب واحد برای ترم </label>
                    <select class="custom-select my-1 mr-sm-2" id="term_name">
                        <option selected>انتخاب کنید....</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </form>
            </article>
            <hr color="orange">
            <!-- finish head selection -->

            <article calss="row mb-5">  
            <form class="pb-5" id="form_inputs">
           
                <div class="remove_inputs">
                </div>
                
                <button type="submit"  class="btn btn-primary ml-2 mt-3 mb-5" id="add_selection">افزودن</button>


                </form>       

            </article>

            <article>    

            </article>

            <article>
       
            </article>

        <section>
        <?php
            require_once('./theme/footer.php');
        ?>
        </div>
    </body>
</html>