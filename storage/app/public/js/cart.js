function onClickPlus(event, max) {
    var id = event.target.name
    var curr = parseInt($('input#' + id).val())
    if (curr + 1 <= max) {
        $('input#' + id).val(curr + 1)
        increaseTotal(id)
    }

}

function onClickMinus(event) {
    var id = event.target.name
    var curr = parseInt($('input#' + id).val())
    if (curr - 1 >= 1) {
        $('input#' + id).val(curr - 1)
        decreaseTotal(id)
    } else $('input#' + id).val(1)

}

function onKeyUp(event, max) {
    var id = event.target.name
    var curr = parseInt($('input#' + id).val())
    if (curr > max) {
        $('input#' + id).val(max)
    }
    else if(curr<1) {
        $('input#' + id).val(1)
    }
}

function increaseTotal(id){
    var curr = parseInt($('input#' + id).val())
    var price = parseInt($('#price'+id).text().substring(1))
    var currT = parseInt($('h4#total').text())
    currT+=price
    $('h4#total').text(currT)
}
function decreaseTotal(id){
    var curr = parseInt($('input#' + id).val())
    var price = parseInt($('#price'+id).text().substring(1))
    var currT = parseInt($('h4#total').text())
    if(currT>0){
        currT-=price
        $('h4#total').text(currT)}
}

// function sumTotal(this){
//     var prev = $(this).data('val');
//     var current = $(this).val();
//     console.log("Prev value " + prev);
//     console.log("New value " + current);
// }
