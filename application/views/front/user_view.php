<!doctype html>
<html>
    <head>
       
        <title>How to send AJAX request in Codeigniter</title>

    </head>
    <body>
    
        Select Username : <select id='sel_user'>
         <?php 
         foreach($users as $user){
    	    echo "<option value='".$user['username']."' >".$user['username']."</option>";
            
         }
         ?>
        </select>

        <!-- User details -->
        <div >
            Username : <span id='suname'></span><br/>
            Name : <span id='sname'></span><br/>
            Email : <span id='semail'></span><br/>
        </div>

        <!-- Script -->
        <script src="<?php echo base_url(); ?>script/jquery-3.0.0.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Load Exteral script file (Remove the comment if you want send AJAX request from external script file ) -->
        <!--<script src='<?php echo base_url(); ?>script/script.js' type='text/javascript' ></script>-->
        <script type='text/javascript'>
            // baseURL variable
            var baseURL= "<?php echo base_url();?>";
            
            $(document).ready(function(){
                
                // Comment or remove the below change event code if you want send AJAX request from external script file
                $('#sel_user').change(function(){
                    var username = $(this).val();
                    $.ajax({
                        url:'<?=base_url()?>index.php/User1/userDetails',
                        method: 'post',
                        data: {username: username},
                        dataType: 'json',
                        success: function(response){
                            var len = response.length;
                            
                            $('#suname,#sname,#semail').text('');
                            
                            if(len > 0){
                                // Read values
                                var uname = response[0].username;
                                var name = response[0].name;
                                var email = response[0].email;
                                
                                $('#suname').text(uname);
                                $('#sname').text(name);
                                $('#semail').text(email);
                            }
                        }
                    });
                });
            });
        </script>
    </body>
</html>