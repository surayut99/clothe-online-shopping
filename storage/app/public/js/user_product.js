var _token = ($('meta[name="_token"]').attr('content'));

$("a#wait").click(function() {
    $.ajax({
        url: "/user_product/wait",
        type: "get",
        success: function(data) {
            $("#product_list").html(data)
        }
    })
})

$("a#purchased").click(function() {
    $.ajax({
        url: "/user_product/purchased",
        type: "get",
        success: function(data) {
            $("#product_list").html(data)
        }
    })
})

$("a#deliveried").click(function() {
    $.ajax({
        url: "/user_product/deliveried",
        type: "get",
        success: function(data) {
            $("#product_list").html(data)
        }
    })
})

$("a#history").click(function() {
    $.ajax({
        url: "/user_product/history",
        type: "get",
        success: function(data) {
            $("#product_list").html(data)
        }
    })
})

window.onload = function() {
    $("a#wait").click();
}