
function addComent(blog_id) {
  let comment = document.querySelector("#comment");
  let commentText = comment.value;
  let xhr = new XMLHttpRequest();
  xhr.open('POST', '/web.loc/comment/add', true);
  xhr.setRequestHeader('Content-Type', 'application/json');
  xhr.send(JSON.stringify({ 'comment': commentText, 'blog_id': blog_id }));
  //очищаем поле и скрываем модальное окно
  comment.value = "";
  $('#myModal').modal('hide');
  
  //создаем новый комментарий
  let fio = document.getElementById('fio').innerHTML;
  console.log(fio);
  currentTime = getCurrentDateTime();
  $('.'+ blog_id).append('<p><b><small class="text-muted"></small><small class="text-muted">' + fio + ': </small></b>' + 
  '<small class="text-muted"></small><small class="text-muted">' + commentText + 
  '  </small>' + '<small class="text-muted"></small><small class="text-muted">' + currentTime + '</small>' );
}


function setBlogId(id) {
  var button = document.getElementById('saveCommentBut');
  button.setAttribute('onclick', 'addComent(' + id + ')');
}

function getCurrentDateTime() {
  var today = new Date();
  var day = today.getDate() + "";
  var month = (today.getMonth() + 1) + "";
  var year = today.getFullYear() + "";
  if (today.getHours() < 10) {
    var hour = "0" + today.getHours();
  } else var hour = today.getHours() + "";
  if (today.getMinutes() < 10) {
    var minutes = '0' + today.getMinutes();
  } else var minutes = today.getMinutes() + "";
  if (today.getSeconds() < 10) {
    var seconds = '0' + today.getSeconds() + "";
  } else var seconds = today.getSeconds() + "";
  currentTime = hour + ":" + minutes + ":" + seconds + " " + day + "." + month + "." + year ;
  return currentTime;
}