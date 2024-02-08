</div>
<script> 
    hangman(<?php echo $_SESSION['lives'] ?>)
</script>
<script src="/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script>
    $(".alphabetButton").click(function()   {
        var id = $(this).attr("id");
        //alert(id);
        $.ajax({
            method: "POST",
            url: "/functions.php",
            data: {
                guess: id
            }
        })
        .done(function(data){
            location.reload();
        });
    });
</script>
</body>

</html>