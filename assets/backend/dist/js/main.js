var _date = document.getElementById("date");
var _time = document.getElementById("time");
const monthNames = ["January", "February", "March", "April", "May", "June",
    "July", "August", "September", "October", "November", "December"
];
setInterval(() => {
    var today = new Date();

    var todayDate = today.getDate();

    var todayHours = today.getHours();
    var todayMinutes = today.getMinutes();

    if (todayHours < 10) {
        todayHours = "0" + today.getHours();
    }
    if (todayMinutes < 10) {
        todayMinutes = "0" + today.getMinutes();
    }

    let today_date = todayDate + "-" + monthNames[today.getMonth()]
    let todayTime = todayHours + ":" + todayMinutes

    _date.innerHTML = today_date
    _time.innerHTML = todayTime

},10);