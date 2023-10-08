function filter() {
    var keyword = document.getElementById("search").value;
    var select = document.getElementById("select");
    for (var i = 0; i < select.length; i++) {
        var txt = select.options[i].text;
        if (txt.substring(0, keyword.length).toLowerCase() !== keyword.toLowerCase() && keyword.trim() !== "") {
          $(select.options[i]).attr('disabled', 'disabled').hide();
        } else {
          $(select.options[i]).removeAttr('disabled').show();
        }
    }
}

function filterProduct() {
    var keyword = document.getElementById("searchProduct").value;
    var select = document.getElementById("selectProduct");
    for (var i = 0; i < select.length; i++) {
        var txt = select.options[i].text;
        if (txt.substring(0, keyword.length).toLowerCase() !== keyword.toLowerCase() && keyword.trim() !== "") {
          $(select.options[i]).attr('disabled', 'disabled').hide();
        } else {
          $(select.options[i]).removeAttr('disabled').show();
        }
    }
}

