$(function ()
{

    $(".removefromcart").on("click", function ()
    {

        $(this).parents(".product").remove();

        $.ajax({
            url: '/removefromcart.php',
            type: 'post',
            data: {text: $(this).get(0).id},
            success: function (response)
            {

                //console.log(response);
                if (response.success == true)
                {
                    //console.log(response);
                    alert("Item removed");
                    location.reload();
                }
            }
        });





    });



    /************ for search **********/
    $("#searchProduct").autocomplete({
        //my source jason
        source: "../search.php",
        //start search when one letter
        minLength: 1,
        //do that when you select one result of the research
        select: function (event, ui)
        {
            window.location = "/reviewproduct.php?id=" + ui.item.value;
        }
    });
    /***************add to cart******************/
    $(".addtocart").on("click", function ()
    {


        $(this).attr("disabled", true);
        $(this).html("ADDED");
        //alert($(this).get(0).id);
        $.ajax({
            url: '/addtocart.php',
            type: 'post',
            data: {text: $(this).get(0).id},
            success: function (response)
            {
                //console.log(response);
                if (response.success == true)
                {
                    alert("Item added to your cart");
                    //console.log(response);

                }
            }
        });





    });



});