function attachScript(id){
  var topicVal = $('#topic').val();
  var textVal = $('#text').val();
  var element = document.createElement("script")
  element.type = "text/javascript"
  element.src = "/web.loc/blog/update?id=" + id + "&topic=" + topicVal + "&text=" + textVal; 
  element.id = id
  document.getElementsByTagName("head")[0].appendChild(element)
  $('#myModal2').modal('hide');
  console.log($('#topic'+id).html(topicVal));
  console.log($('#text'+id).html(textVal));
}

function setBlogIdForRedact(id) {
  var topicValue = $('#topic'+id).html();
  var textValue = $('#text'+id).html();
  //set value in fields of modal window
  $("#topic").val(topicValue);
  $("#text").val(textValue);
  var button = document.getElementById('saveBlogBut');
  button.setAttribute('onclick', decodeURI('attachScript(' + id + ')'));
  console.log("End of dunc setBlogID");
}
