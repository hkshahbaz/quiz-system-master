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
    <title>User</title>
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
    .blank_input{
        width: 150px;
        border-right: none;
        border-left: none;
        border-top: none;
        border-bottom:2px solid black;
        text-align: center;
    }
    
    .blank_input:focus{
        outline: none;
        border-bottom:2px solid grey;
        transition:border-bottom 1s;
    }
    .wordid , .wordname{
        display:none;
    }
    #alreadyadd{
        height:50px;
    }
    </style>
  </head>
  <body>
    <div class="container" style="margin-top: 1%">
        <div class="row">
            <div class="col-md-12 jumbotron">
                <h2 class="text-primary">jQuery Quiz Game: User Side</h2>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 d-flex justify-content-center ">
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
                <td>Submit Answer</td>
                <td>Result</td>
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
                <!-- <form id="newForm"  action="fetchBlanks" method="POST"> -->
                    <?php 
                   // echo '<pre>',print_r($d);exit;
                    $coun = count($d);
                    $check = array();
                    $word   = array();
                    $size = array();

                    for($i=0;$i<$coun/2;$i++){

                        $check[$i] = $d['question']; 
                        //echo '<br>'. $check[$i]; 
                        $word[$i] = (explode(" ",$check[$i]));
                        //echo '<pre>', print_r($word[$i]);
                        $size[$i] = sizeof($word[$i]);

                        //echo $size[$i];

                        for($j=0; $j<$size[$i]; $j++){
                            ?>
                        <p id="word"  class="plength" style="display:inline;">
                        <?php echo $word[$i][$j]; ?>
                        </p> 
                     <?php
                        }
            
                    } ?>
                </td>
                <td ><input type="submit" class="btn btn-info" id="submit" value="submit"></form></td>
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
         <!-- <a href="index" class="btn btn-primary">Back</a> -->
          <a href="#" class="btn btn-primary float-right">Ok</a>
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
    
        var count = $('.plength').length;
    //    console.log(count);
       for(var i=0;i<count;i++){
        $('#word').attr("id","word"+i);
        $('#status').attr("id","status"+i);

        $('#word'+i).click(function(){
            let status = $(this).closest('td').next().attr('id'); //get row of word clicked

            let name = $(this).text();
            let id = $(this).attr('id');
            let value = name.trim();
        });
    
    }
    // retreving each word from blanksword table to make it Input field
       let wordcount = $('.wordid').length;
        for(var i=0;i<wordcount;i++){
            $('#wordid').attr("id","wordid"+i);
            $('#wordname').attr("id","wordname"+i);

            var wordid = $('#wordid'+i).text(); //Geting id of each word
            var wordname = $('#wordname'+i).text().trim(); //Geting name of each word
            // console.log(wordname);
           var wordslen = $('.plength').length;

        for(var j=0;j<wordslen;j++){
            var swordname = $('#word'+j).text().trim(); //Geting nameof each word from sentence

            var swordid = $('#word'+j).attr('id'); //Geting id of each word from sentence
                if(wordid == swordid && wordname == swordname ){
                    //console.log(wordid);
                    let input = '<input id="text" type="text" class="blank_input" name="text">';
                    $('#'+swordid).html(input);
                    $('#text').attr("id",wordid);
                }
            }    
        }
    //    console.log(count);
       for(var i=0;i<count;i++){
            $('#submit').attr("id","submit"+i); //dynamic value to submit button of each row
            $('#question').attr("id","question"+i); //dynamic value to quetion td of each row
            $('#text').attr("id","text"+i); //dynamic value to text input of each row

            //when submit clicked
            $('#submit'+i).click(function(){
                td = $(this).parent('td').prev().attr('id');    //parent td id of each row
                inputWordid = $('#'+td).find('input').attr('id'); //geting input id of specific row
                inputWordname = $('#'+td).find('input').val().trim(); //geting input value of specific row
                status = $(this).closest('td').next().attr('id');   //getting status id of each row 

                //if input field is empty display error
                if(inputWordname == ""){
                    let htmlalready = '<h3>Blank Should not be empty!</h3>';
                            $('#alreadyadd').hide().html(htmlalready).fadeIn(1000).removeClass('text-success').addClass('text-danger');
                            return false;
                }
                //if input field is not empty pass jason request
                else{
                    $.get(`<?= base_url('userside/fetchBlanks')?>`,{blankid:inputWordid,blankname:inputWordname}, function(_data){
                    var data = JSON.parse(_data);
                    console.log(data);
                if(data['status'] == true)
                    {    
                        let html = '<img class="correct" src="<?= base_url() ?>assets/images/correct.jpg" alt="Correct Word">';
                            $('#'+status).hide().html(html).fadeIn(1000);
                            let htmlalready = '<h2>Correct</h2>';
                            $('#alreadyadd').hide().html(htmlalready).fadeIn(1000).removeClass('text-danger').addClass('text-success');
                            //$('#'+id).removeClass('btn btn-info').addClass('btn btn-success');
                        // console.log(test);
                    }
               else
                    {
                        let html = '<img class="correct" src="<?= base_url() ?>assets/images/cross.png" alt="Incorrect Word">';
                            $('#'+status).hide().html(html).fadeIn(1000);
                        let htmlalready = '<h2>Incorrect</h2>';
                            $('#alreadyadd').hide().html(htmlalready).fadeIn(1000).removeClass('text-success').addClass('text-danger');
                            //$('#'+id).removeClass('btn btn-info').addClass('btn btn-danger');
                            //console.log(test);
                    }
                });
                }
            });
        }    
    }); 
</script>
  </body>
</html>