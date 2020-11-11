window.onload = function() {
    $.ajax({
        url: '/products/' + 'เสื้อผ้าผู้ชาย',
        method: 'get',
        success: function(data) {
            document.getElementById('secondProdType').innerHTML=''
            data.forEach(secondary => {
                $('#secondProdType').append("<option value=' " + secondary + "'" + ">" + secondary + "</option>")
            })
        }
    })
}
$("#primeProdType").change(function(){
    $.ajax({
        url: '/products/' + $("#primeProdType").val(),
        method: 'get',
        success: function(data) {
            document.getElementById('secondProdType').innerHTML=''
            data.forEach(secondary => {
                $('#secondProdType').append("<option value=' " + secondary + "'" + ">" + secondary + "</option>")
            })
        }
    })
})

