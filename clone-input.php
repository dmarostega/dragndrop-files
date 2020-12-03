<?php 

require_once "/class/loader.php";

//use App\Loader;
Loader::add();
var_dump(Loader::get());
?>

<html>
    <head>
        <title>RockCode - Dev</title>
    </head>
    <body>
        
        <h3>Rock Code</h3>        
            <form action="" method="get">
                <div class="row">
                    <div class="col-6 col-off-set-6">
                        <input type="file" name="imagens[]" multiple>
                    </div>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Text</span>
                    </div>
                    <input class="form-control" type="submit" name="" placeholder="Recipient's submit">
                    <div class="input-group-append">
                        <span class="input-group-text">Text</span>
                    </div>
                </div>
            </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>            
            class InputFiles{

               static input(input){
                    if (this.inputs == null){
                        this.inputs = [];
                    }
                  //  input.attr('name','imagems_'+(this.inputs.length))
                    this.inputs.push(input);
                    
                }

                static get(){
                    return this.inputs;
                }
            }

            var arrFiles = [];
            var num_inputs = 0;
            $('input[type=file]').change(function(e){

                InputFiles.input($(this).clone());

                var my_list = $('<ul></ul>');
                var local_files =  e.target.files;
                
                for(var i = 0; i < local_files.length; i++){
                    console.log('\n', local_files[i]);
                    arrFiles.push(local_files[i]);

                    my_list.append($('<li></li>').append(local_files[i].name));
                    $(this).parent(local_files[i]);
                }

                //$('form').append($(this).clone().attr('name','new_'+(num_inputs++)));

                $(this).val(null);
                console.log('\nFixed Files:' , arrFiles);
                console.log('\nInputs Lengh: ', InputFiles.get().length);
                $(this).parent().append(my_list);
            });

            $('input[type=submit]').click(function(e){
              //  e.preventDefault();
                var newInputs = InputFiles.get();
                console.log('\nOn Submit Function: ', newInputs.length);
                for(var a = 0; a <= newInputs.length; a++ ){
                    console.log('\nIN For ',a,newInputs[a]);
                    $(this).append(newInputs[a]);
                }

                $('form').submit();
            })
        </script>
        
    </body>
</html>