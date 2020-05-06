function setCookie(name, value, exlpiration_days) {
    //console.log("Coookkkii");
    var NewValue = Number(getCookie(name)) + Number(value);
    var date = new Date();
    date.setDate(date.getDate() + exlpiration_days);
    date = date.toUTCString();
    if (NewValue) document.cookie = "" + name + "=" + NewValue + "; expires=" + date + ";";
    else document.cookie = "" + name + "=" + value + "; expires=" + date + ";";
}

function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
        '(?:^|\s)' + name.replace(/([.$?*+\\\/{}|()\[\]^])/g, '\\$1') + '=(.*?)(?:;|$)'
    ));
    return matches ? matches[1] : undefined;
}
