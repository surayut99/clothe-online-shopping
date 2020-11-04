function validateTelNumber() {
    var new_tel = $("#changeTel").val();
    console.log(typeof new_tel)

    if (new_tel.length > 10) {
      var new_tel = $("#changeTel").val(new_tel.substring(0, 10));
      return;
    }

    if (new_tel[0] != "0") {
      var new_tel = $("#changeTel").val(new_tel.slice(0, -1));
      return;
    }

    if (!isDigit(new_tel.charAt(new_tel.length - 1))) {
      var new_tel = $("#changeTel").val(new_tel.slice(0, -1));
      return;
    }
}

function isDigit(n) {
    return /^-?[\d.]+(?:e-?\d+)?$/.test(n)
}
