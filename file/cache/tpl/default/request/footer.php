<?php defined('IN_DESTOON') or exit('Access Denied');?><script>
    $('document').ready(function(){
        var form = Dd('info');
        var selects = form.getElementsByTagName('SELECT');
        for( var e in selects ){
            if( selects[e].id != undefined){
                selects[e].value = 'default';
            }
        }
        var inputs = form.getElementsByTagName('INPUT');
        for( var e in inputs ){
            if( inputs[e].id != undefined ){
                inputs[e].value = '';
            }
        }
    });
    function showImage(id_pre){
        var id_btn = id_pre+'img';
        var id_previewer = id_pre+'img_pre';
        if( typeof (FileReader) != "undefined" ){
            var previewer = document.getElementById(id_previewer);
            var index = previewer.childElementCount;
            var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            var btn = document.getElementById(id_btn);
            for(var i = 0; i < btn.files.length; i++){
                var file = btn.files[i];
                if( regex.test(file.name.toLowerCase()) ){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        var img = document.createElement("IMG");
                        img.src = e.target.result;
                        addImg(previewer, img);
                    }
                }
                reader.readAsDataURL(file);
            }
        }
        else{
            alert("This browser cannot preview images after you upload them.");
        }
    }
    function addImg(previewer, img){
        img.id = ++previewer.childElementCount;
        img.addEventListener('click',function(){console.log('click'); this.parentNode.removeChild(this);});
        previewer.appendChild(img);
    }
    function other(pre){
        var v = Dd(pre+'id').value;
        if( v === '0' ){
            Dd(pre).style.display = 'block';
        }
        else{
            Dd(pre).style.display = 'none';
        }
    }
</script>
<?php include template('footer');?>