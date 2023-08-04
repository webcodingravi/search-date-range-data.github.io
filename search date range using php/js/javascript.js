$(document).ready(function(){
    $("#save-button").click(function(e) {
     e.prevenDefault;
     var first_name = $("#fname").val;
     var last_name = $("#fname").val;
     var last_name = $("#age").val;
     if(first_name == "" || last_name == "" || age == "" || !$('input:radio[name=gender]').is(':checked')) {
       $('#response').fadeIn();
       $('#response').removeClass('success-message').addClass('arror-message').html("All fields Required");
      setTimeout(function() {
       $('#response').fadeOut("slow");
      },2000);
   
       
       // $('#success-msg').slideUp();
       
     }else {
     
       $.ajax({
         url : "ajax-insert.php",
         type: "POST",
         data : $("#form-data").serialize(),
         success : function(data) {
           $("#form-data").trigger('reset');
           $('#response').fadeIn();
           $('#response').removeClass('arror-message').addClass('success-message').html(data);
           setTimeout(function() {
             $("#response").fadeOut("slow");
           },4000);
         }
   
       });
     }
    });

        function loadTable() {
        $.ajax({
            url : "ajax-load.php",
            type : "POST",
            success : function(data) {
                $("#table-data").html(data);
            }
        });
      };
      loadTable();

      $(document).on("click", ".delete-btn", function(){
        var studentID = $(this).data("id");
        var element = this;
        if(confirm("Do you really want to delete this record ?")) {
         $.ajax({
           url : "delete-ajax.php",
           type : "POST",
           data : {id : studentID},
           success : function(data) {
             if(data == 1) {
               $(element).closest("tr").fadeOut();
             }else {
              $('#response').slideUp();
              $('#response').removeClass('success-message').addClass('arror-message').html('can not delet data').slideDown();

             }
           }
       });
      }
    
     });


       

   });