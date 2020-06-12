const input_login = document.querySelector("#login");
const errorMessage = document.querySelector("#availability");

input_login.onblur = () => {
  var xmlData = "<login>" + input_login.value + "</login>";
  let res = fetch('/web.loc/auth/unique', { //обработчик 
    method: 'POST',
    headers: {
      'Content-type': 'text/xml', // отправляемые данные 
    },
    body: xmlData
  })
  .then(response =>response.text())
  .then(body => {
    console.log(body);
    if(body == 0){
      errorMessage.hidden = false;
    }
    else errorMessage.hidden = true;
  })
}