function calculateDaysLeft() {
    var endDates = document.getElementsByClassName('warranty-end-date');
    var daysLeft = document.getElementsByClassName('days-left');

    for (var i = 0; i < endDates.length; i++) {
        var endDate = new Date(endDates[i].innerText);
        var today = new Date();
        var timeDiff = endDate.getTime() - today.getTime();
        var days = Math.ceil(timeDiff / (1000 * 3600 * 24));

        daysLeft[i].innerText = days > 0 ? days + ' days' : 'Expired';
    }
}

calculateDaysLeft();
