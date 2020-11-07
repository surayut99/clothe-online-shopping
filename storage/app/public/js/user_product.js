var _token = ($('meta[name="_token"]').attr('content'));

$("a#wait").click(function() {
    $.ajax({
        url: "/profile/show/wait",
        type: "post",
        data: {
            "_token": _token
        },
        success: function(data) {
            $("#product_list").html(data)
        }
    })
})

$("a#purchased").click(function() {
    $.ajax({
        url: "/profile/show/purchased",
        type: "post",
        data: {
            "_token": _token
        },
        success: function(data) {
            $("#product_list").html(data)
        }
    })
})

$("a#deliveried").click(function() {
    $.ajax({
        url: "/profile/show/deliveried",
        type: "post",
        data: {
            "_token": _token
        },
        success: function(data) {
            $("#product_list").html(data)
        }
    })
})

$("a#history").click(function() {
    $.ajax({
        url: "/profile/show/history",
        type: "post",
        data: {
            "_token": _token
        },
        success: function(data) {
            $("#product_list").html(data)
        }
    })
})

window.onload = function() {
    $("a#wait").click();
}