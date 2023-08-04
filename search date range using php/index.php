<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Search with range using php & ajex</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" integrity="sha512-BnbUDfEUfV0Slx6TunuB042k9tuKe3xrD6q4mg5Ed72LTgzDIcLPxg6yI2gcMFRyomt+yJJxE+zJwNmxki6/RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

    <link href="css/style.css" rel="stylesheet" type="text/css">
  
   
</head>


<body>

<div id="main-div">
  <div class="container">
    <div class="row">
    <div class="col-8">
    <h2>Search in Date Range using PHP & Ajax</h2>

     <div id="header_wrapper">
      <table>
        <tr>
<td><label>From : </label>
<input type="text" id="from" class="form-control">
</td>
     <td class="ps-4"><label>to : </label>
     <input type="text" id="to" class="form-control">
    </td>
    
</tr>
      </table>
     </div>

     <div id="content" class="mt-4">
       <table id="table-data" class="table table-bordered">
        <thead class="bg-primary text-white">
          <th>Id</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Age</th>
          <th>City</th>
          <th>DOB</th>
        </thead>
        <tbody></tbody>
       </table>
     </div>


    </div>
    </div>

  </div>
 

</div>


<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

  <script>
    $(document).ready(function() {

      var minD;
      var maxD;

      var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
          changeMonth: true,
          changeYear: true,
          numberOfMonths: 1,
          yearRange: "1980:2023"
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
          minD = $(this).val();
          if(minD !== '' && maxD !== '') {
            loadTable(minD, maxD);
          }
        }),
      to = $( "#to" ).datepicker({
        changeMonth: true,
          changeYear: true,
          numberOfMonths: 1,
          yearRange: "1980:2023"
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
        maxD = $(this).val();
          if(minD !== '' && maxD !== '') {
            loadTable(minD, maxD);
          }
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }

    function loadTable(date1, date2) {
      $.ajax({
       url : "get-data.php",
       type : "POST",
       data : {date1: date1, date2: date2},
       success : function(response) {
           $("#table-data tbody").html(response);
       }


      });

  
    }

    loadTable(minD, maxD);
    });

    </script>



</body>
</html>