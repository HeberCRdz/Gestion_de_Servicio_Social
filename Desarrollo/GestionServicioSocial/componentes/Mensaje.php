<script>

    window.onload = function(){
        <?php if(strlen($mensaje) > 0){ ?>
            alert("<?php echo $mensaje?>");
        <?php } ?>
    }
    
</script>