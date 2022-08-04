function reqListener () {
    console.log(this.responseText);
}

function bgRequest(link) {
    var oReq = new XMLHttpRequest();
    oReq.addEventListener("load", reqListener);
    oReq.open("GET", link.href);
    oReq.send();
}