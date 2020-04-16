var getDaysInMonth = function (month, year) {
  return new Date(year, month, 0).getDate();
};

function hideTable() {
  document.getElementById("insertHere").innerHTML = "";
}

function setSelected(elem) {
  var element = document.getElementsByClassName(elem);
  element.className = selectedTd;
}

function writeYear() {
  for (i = 1941; i <= 2019; i++)
    document.write('"<option value="' + i + '">' + i + '</option>"');
}

function writeTable() {
  document.getElementById("insertHere").innerHTML = "";
  var newTable = "<table><tbody><tr><td>Monday</td><td>Tuesday</td><td>Wednesday</td><td>Thursday</td><td>Friday</td><td>Saturday</td><td>Sunday</td></tr><tr>";
  var month = document.getElementById("selectMon").value;
  var year = document.getElementById("selectYear").value;
  dateString = year + '-' + month + '-01';
  var newDate = new Date(dateString);
  var weekday = newDate.getDay() - 1;
  if (weekday == -1) weekday = 6;
  countDays = getDaysInMonth(month, year);
  for (j = 0; j < weekday; j++) {
    newTable += '<td></td>';
  }
  for (i = 1; i <= countDays; i++) {
    let pref = (i < 10) ? '0' : '';
    newTable += '<td value="' + pref + i + '" id="' + i + '"onclick="setDate(' + i + ');">' + i + '</td>';
    if ((weekday + i) % 7 == 0) newTable += '</tr>';
  }
  newTable += "</table>";
  document.getElementById("insertHere").innerHTML = newTable;
}

function setDate(bDay) {
  for (i = 1; i < 32; i++) {
    if (document.getElementById(i)) {
      document.getElementById(i).className = "notactive";
    }
  }
  var active = "" + bDay;
  var bYear = document.getElementById("selectYear");
  var month = document.getElementById("selectMon").value;
  if (bDay < 10) bDay = "0" + bDay;
  document.getElementById("target").value = "" + bDay + "." + month + "." + bYear.value;
  document.getElementById(active).className = "activeTd";
  //validateAge();
}
