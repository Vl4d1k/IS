function showDate() {
  var date = new Date();
  var mon = date.getMonth() + 1;
  name_mon = "undefinded";
  switch (mon) {
    case 1: name_mon = "January"; break;
    case 2: name_mon = "February"; break;
    case 3: name_mon = "March"; break;
    case 4: name_mon = "April"; break;
    case 5: name_mon = "May"; break;
    case 6: name_mon = "June"; break;
    case 7: name_mon = "July"; break;
    case 8: name_mon = "August"; break;
    case 9: name_mon = "September"; break;
    case 10: name_mon = "October"; break;
    case 11: name_mon = "November"; break;
    case 12: name_mon = "December"; break;
    default: break;
  }
  document.getElementById("time").innerHTML = '<span id="time">' + date.getDate() + " " + name_mon + " " + date.getFullYear() + " " + date.getHours() + ":" + date.getMinutes() + ":" + date.getUTCSeconds() + '</span>';
}