 $(document).ready(function(){
            VMasker(document.querySelector("#montant")).maskMoney();
    });
    $("#form").submit(function(){
        VMasker(document.querySelector("#montant")).unMask();
    })