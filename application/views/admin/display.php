<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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
    .dash{
    background: transparent;
    border-top: none;
    border-right: none;
    border-left: none;
    width: 100px;
    border-radius: 0;
    border-bottom: 2p;
    border-bottom: groove;
    transition: 1s;
    color:white;
    pointer-events:none;
    }
    .dash:visited{
        border:5px solid black;
    }
    .correct{
        width:30px;
        height:30px;
    }
    #alreadyadd{
        height:50px;
    }
    .wordid , .wordname{
        display:none;
    }
    </style>
  </head>
  <body>
    <div class="container" style="margin-top: 1%">
        <div class="row">
            <div class="col-md-12 jumbotron">
                <h2 class="text-primary">jQuery Quiz Game: Admin (Here you can Add <span class="text-success">Blanks</span> )</h2>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 d-flex justify-content-center">
                <div id="alreadyadd"></div>
            </div>
        </div>
        <?php foreach ($data['res2'] as $word): ?>
           <div id="wordid" class="wordid bg-info"><?php echo $word['blankid'];?></div>
           <div id="wordname" class="wordname"> <?php echo $word['blankname'];?></div>
        <?php endforeach; ?>
        <table class="table mt-3" >
		<thead>
			<tr>
				<td>Sr. No.</td>
                <td>Questions</td>
                <td>Status</td>
			</tr>
		</thead>
		<tbody id="myTable">
			<tr>
                 <!-- echo $d['question'];  -->
				<?php if(count($data)): ?>
				<?php $count = $this->uri->segment(3,0); ?>
				<?php foreach ($data['res1'] as $d): ?>
				<td><?= ++$count ?></td>
				<td id="question">
                    <?php 
                     
                    $coun = count($d);
                    $check = array();
                    $word   = array();
                    $size = array();
// print_r($coun);
                    for($i=0;$i<$coun/2;$i++){

                        $check[$i] = $d['question']; 
                        //echo '<br>'. $check[$i]; 
                        $word[$i] = (explode(" ",$check[$i]));
                        // echo '<pre>', print_r($word[$i]);
                        $size[$i] = sizeof($word[$i]);

                        //echo $size[$i];

                        for($j=0; $j<$size[$i]; $j++){
                            ?>
                        <span class="plength">
                            <button id="word" class="btn btn-info">
                                <?php echo $word[$i][$j]; ?>
                            </button>
                        </span>
                     <?php
                        }
            
                    } ?>
                </td>
                <td id="status"></td>
			</tr>
				<?php endforeach; ?>
			<?php else: ?>
			<tr>
				<td colspan="3">No Records Found.</td>
				<?php endif; ?>
			</tr>
		</tbody>
    </table>
        <div class="row">
         <div class="col-md-12">
         <a href="index" class="btn btn-primary">Back</a>
          <a href="index" class="btn btn-primary float-right">Ok</a>
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
       

       var count = $('.btn-info').length;
    //    console.log(count);
       for(var i=0;i<count;i++){
        $('#word').attr("id","word"+i);
        $('#status').attr("id","status"+i);

        $('#word'+i).click(function(){
            // alert(this.id);
            let status = $(this).closest('td').next().attr('id');
            // console.log(srow);
            //$(this).removeClass('btn btn-info').addClass('dash');
            let name = $(this).text();
            let id = $(this).attr('id');
            let value = name.trim();

        $.get(`<?= base_url('admin/insertBlanks')?>`,{blankid:id,blankname:value}, function(_data){
               var data = JSON.parse(_data);
               console.log(data);
               if(data['status'] == true)
               {    
                   let html = '<img class="correct" src="<?= base_url() ?>assets/images/correct.jpg" alt="Word Inserted">';
                     $('#'+status).hide().html(html).fadeIn(1000);
                     let htmlalready = '<h4>You make this word blank</h4>';
                    $('#alreadyadd').hide().html(htmlalready).fadeIn(1000).removeClass('text-danger').addClass('text-success');
                    $('#'+id).removeClass('btn btn-info').addClass('btn btn-success');
                // console.log(test);
               }
               else{
                let html = '<img class="correct" src="<?= base_url() ?>assets/images/cross.png" alt="Word Not Inserted">';
                     $('#'+status).hide().html(html).fadeIn(1000);
                let htmlalready = '<h4>This word already added as blank</h4>';
                    $('#alreadyadd').hide().html(htmlalready).fadeIn(1000).removeClass('text-success').addClass('text-danger');
                    $('#'+id).removeClass('btn btn-info').addClass('btn btn-danger');
                    //console.log(test);
               }
              
           })
        });
       }
       // retreving each word from blanksword table to change its color
       let wordcount = $('.wordid').length;
        for(var i=0;i<wordcount;i++){
            $('#wordid').attr("id","wordid"+i);
            $('#wordname').attr("id","wordname"+i);

            var wordid = $('#wordid'+i).text(); //Geting id of each word
            var wordname = $('#wordname'+i).text().trim(); //Geting name of each word
            var wordslen = $('.plength').length; // counting total words in the page

        for(var j=0;j<wordslen;j++){
            var swordname = $('#word'+j).text().trim(); //Geting nameof each word from sentence
            var swordid = $('#word'+j).attr('id'); //Geting id of each word from sentence
            //console.log(swordid);
            console.log(swordname);
                if(wordid == swordid && wordname == swordname ){
                    $('#'+wordid).removeClass('btn btn-info').addClass('btn btn-danger');
                    $('#text').attr("id",wordid);
                }
            }    
        }
    }); 
</script>
  </body>
</html>