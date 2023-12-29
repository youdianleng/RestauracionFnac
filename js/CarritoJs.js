<script>
    $(document).on("click", "#btnModal", function () {
    let prodId = $(this).data("prodid");
    console.log(prodId);
    
    $("#modalContent").val(prodId);

    
})
</script>