$(document).ready(function(){
    var bookCount ={name:0};
    $("#add_selection").click(function(e){
        e.preventDefault();
        add_inputs("#intry",bookCount,"process.php");
    });

    //show term name

    add_inputs("#term_name",bookCount,"term_name.php");



    // $("button").click(function(){
    //     $.ajax({url: "demo_test.txt", success: function(result){
    //       $("#div1").html(result);
    //     }});
    //   });

    selectChange("#intry");
    selectChange('#myselect');


//function selection ajax change options
function selectChange(id){
    $(id).change(function(){
        bookCount.name=0;
        //remove all
        remove_inputs();
        get_ajax_info(id,bookCount);

    });
}

    //finish jquery
});
function addBook(bookCount){
    bookCount.name+=1;
    return bookCount.name;
}

//function for append input books
function create_inputs(s,bookCount){
    let input;
    input='<div class="alert alert-warning alert-dismissible fade show" role="alert">';
        input+='<select class="custom-select" id="inputGroupSelect02">';
            input+=s;
        input+='</select>';
        input+='<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
            input+='<span aria-hidden="true">&times;</span>';
        input+='</button>';
    input+='</div>';
    /************************** */

            input+="<hr color='blue'>";
        $(input).appendTo(".remove_inputs");
}

function remove_inputs(){
    $(".remove_inputs").children().remove();
}

function get_ajax_info(id,bookCount){
    let a = $( id+" option:selected" ).val();
    //console.log(a);
    $.ajax({
        method: "POST",
        url: "process.php",
        data: { name: a}
      })
        .done(function( msg ) {
            //console.log(msg);
            let data =msg.split(',');
            //console.log(data);
            //console.log(data.length);
            let s;
                for(let i=0;i<=data.length;i+=7){
                    let r='';
                    let code='';
                    for(let j =i;j<i+7;j++){
                        if(j%7 ==0){
                            code=data[j];
                        }else{
                            
                            r+=data[j]+" - ";
                        }
                        // r+=data[j]+'('+j+')'+" - ";
                    }
                        s+="<option value='"+code+"'>"+r+"</option> ";

                }
                create_inputs(s,bookCount);
                create_inputs(s,bookCount);
                create_inputs(s,bookCount);

           
            // alert(msg);
        });
}

function add_inputs(id,bookCount,href){
    let a = $( id+" option:selected" ).val();
    //console.log(a);
    $.ajax({
        method: "POST",
        url: href,
        data: { name: a}
      })
        .done(function( msg ) {
            //console.log(msg);
            let data =msg.split(',');
            //console.log(data);
            //console.log(data.length);
            let s;
                for(let i=0;i<=data.length;i+=7){
                    let r='';
                    let code='';
                    for(let j =i;j<i+7;j++){
                        if(j%7 ==0){
                            code=data[j];
                        }else{
                            
                            r+=data[j]+" - ";
                        }
                        // r+=data[j]+'('+j+')'+" - ";
                    }
                        s+="<option value='"+code+"'>"+r+"</option> ";

                }
                create_inputs(s,bookCount);

           
            // alert(msg);
        });
}


