<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type = "text/javascript"  src = "jquery-3.2.1.js"></script>   
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Cars upit</title>
</head>
<body>
    <nav>
        <div class="nav-wrapper blue" >
        <a class="brand-logo center">Korisnici i automobili</a>
        </div>
    </nav>

    <!-- <div class="center" style = "padding:20px">
        <a class="waves-effect waves-light btn btn modal-trigger" data-target="modal1"><i class="material-icons left">face</i>Korisnici</a>
    </div> -->

    <div class="center" style = "padding:20px">
        <a id="spisak" class="waves-effect waves-light btn btn modal-trigger" data-target="modal2"><i class="material-icons left">drive_eta</i>Spisak automobila</a>
    </div>


    <div class= "container">
    <div class="nav-wrapper">
      <form>
        <div class="input-field">
          <input id="search" placeholder="Search by name" label="Search by name" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          
        </div>
      </form>
    </div>
    </div>

    <div class="container">
    <table>
        <thead>
          <tr>
              <th>ID</th>
              <th>Ime</th>
              <th>Prezime</th>
              <th>Automobili</th>
          </tr>
        </thead>

        <tbody id= "users">
          
        </tbody>

       
      </table>
    </div>

    <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Automobili korisnika</h4>
      <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Naziv</th>
                    <th>Marka</th>
                    <th>Boja</th>
                </tr>
            </thead>

        <tbody id= "showCar">
          
        </tbody>

       
      </table>
    </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Zatvori</a>
    </div>
  </div>

  <div id="modal2" class="modal">
    <div class="modal-content">
    <table>
            <thead>
                <tr>
                    <th>Naziv</th>
                    <th>Marka</th>
                    <th>Boja</th>
                    <th>Ime vlasnika</th>
                    <th>Prezime vlasnika</th>
                </tr>
            </thead>

        <tbody id= "showDetails">
          
        </tbody>

       
      </table>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>




  <script>
    $(document).ready(function(){
        $('.modal').modal();

        $('#search').keyup(function(){
            var txt = $(this).val();
            if(txt !='')
            {
                $.ajax({

                    url:"search.php",
                    type:'POST',
                    data:{
                        txt:txt
                    },
                    success:function(data){
                        $("#users").html(data);
                    }

                });

            }else{
                $.ajax({
                    url: "displayuser.php",
                    type: 'POST',
        
                    success:function(data){
                        $('#users').html(data);
                    }
                })
            }
            

        });
    });

    $.ajax({
        url: "displayuser.php",
        type: 'POST',
        
        success:function(data){
            $('#users').html(data);
        }
    })

    function prikaziAuto(id){

        $.ajax({

            url: "usercar.php",
            type: 'POST',
            data:{
                id:id
            },
            success:function(data){
                $('#showCar').html(data);
            }
        });
    };

    $('#spisak').on('click', function(){

        $.ajax({
            url: "caruser.php",
            type: 'post',
            
            success:function(data){
                $('#showDetails').html(data);
            }
        });

    });






  </script>


    
</body>
</html>