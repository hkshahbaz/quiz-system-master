<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css" > -->
    <?php echo link_tag('assets/css/bootstrap.min.css'); ?>
    <script src="<?= base_url(); ?>assets/js/jquery.js" type="text/javascript" ></script>
    
    <title>Admin</title>
    <style type="text/css">
    .button5 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
    border-radius:50%;
    font-size:25px;
    }
    .button5:hover{
      background-color: #555555;
      cursor:pointer;
      transition: background-color 0.5s;
    }
    .button5:active{
      background-color: white;
      cursor:pointer;
      transition: background-color 0.5s;
    }
    .button5:visited{
      background-color: white;
      cursor:pointer;
      transition: background-color 0.5s;
      border: 2px solid #555555;
      border-radius:50%;
    }

    </style>
  </head>
  <body>
    <div class="container" style="margin-top: 1%">
        <div class="row">
            <div class="col-md-12 jumbotron">
                <h2 class="text-primary">jQuery Quiz Game: Admin (Here you can Add <span class="text-success">Questions</span>)</h2>
            </div>
        </div>
        <br>
          <?php if($feedback = $this->session->flashdata('feedback')): 
              $feedback_class = $this->session->flashdata('feedback_class');
            ?>
          <div class="col-sm-10">
              <div class="alert alert-dismissible <?= $feedback_class ?>">  
              <?=  $feedback //display alert message if article is inserted ?> 
              </div>
          </div>
          <?php endif; ?>
       <br>
        <div id="before">
            <div class="row">
              <div class="col-md-12">
                <form id="form" action="insert" method="POST">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Question: </label ><label class="serial"></label>
                    <input name="question" type="text" class="form-control" id="inputText"  placeholder="Enter Sentence">
                  </div>
                  <button id="submit" type="submit" class="btn btn-success ">Submit</button>
                </form>
              </div>   
            </div>
            </br>
        </div>
        <div id="after"></div>
        <div class="row" >
         <div class="col-md-12">
         <center><button id="add" class="button button5 btn"><b>+</b></button></center>
         </div>
        </div>
        <div class="row">
         <div class="col-md-12">
           <?php //echo anchor('news/local/123', 'My News', 'title="News title"'); ?>
          <a href="<?= base_url('admin/select') ?>" class="btn btn-primary float-right">Next</a>
         </div>
        </div>
        <br>
        
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <script type="text/javascript">
    
    jQuery(document).ready(function(){ 
      var count = 0; 
      $('#add').click(function(){
        count++;
        //$('#submit')..attr("id","submit"+count);
        let add = $("#before").html();
        $('#after').append(add).before();
        
      });
    });   
     
    </script>
  </body>
</html>