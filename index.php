<?php 

require_once "class/loader.php";

//use App\Loader;
Loader::add();
var_dump(Loader::get());
?>

<html>
    <head>
        <title>RockCode - Dev</title>
        <style>
            input[type=file]{
                display:none;
            }
            #btn-file-input{
                width: 15em;
                height: 15em;
                background-color: transparent;
            }

            #dropbox{
                border:1px solid green;
            }

            img{
                width: 10em;
                height: 10em;
            }
        </style>
    </head>
    <body>
        
        <h3>Rock Code</h3>        
            <form action="" method="get">
                <div class="row">
                    <div id="dropbox" class="col-6 col-off-set-6">
                        <input  id="file-input" type="file" name="imagens" multiple>
                        <button id="btn-file-input" type="button">+</button>
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

            const fileSelect = document.getElementById('btn-file-input');
            fileElement = document.getElementById('file-input');

                  fileSelect.addEventListener('click', function(e){
                      if(fileElement){
                          fileElement.click();
                      }
                  }, false);

                  let dropbox = document.getElementById('dropbox');
                    dropbox.addEventListener('dragenter', dragenter, false);
                    dropbox.addEventListener('dragover', dragover, false);
                    dropbox.addEventListener('drop', drop, false);

                    function dragenter(e){
                        e.stopPropagation();
                        e.preventDefault();
                    }

                    function dragover(e){
                        e.stopPropagation();
                        e.preventDefault();
                    }

                    function drop(e){
                        e.stopPropagation();
                        e.preventDefault();

                        const dt = e.dataTransfer;
                        const files = dt.files;

                        handlesFiles(files);
                    }

                    function  handlesFiles(efiles){
                        for (let i = 0; i < efiles.length; i++){
                            const file = efiles[i];

                            console.log('\nFile ', file.name);

                            //if(!file.type.startsWith('image/i')){ continue; }

                            const img = document.createElement('img');
                            img.classList.add('obj');
                            img.file = file;
                            dropbox.append(img);

                            const reader = new FileReader();
                            reader.onload = (function(aImg){ return function(e){ console.log('\n',aImg); aImg.src = e.target.result; }; })(img);
                            reader.readAsDataURL(file);

                            fileElement.append(file);

                        }
                    }

        </script>
        
    </body>
</html>