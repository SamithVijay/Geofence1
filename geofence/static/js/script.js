$(document).ready(function() {
    // Fetch schedule data and populate table
    $('#schedule-modal').on('show.bs.modal', function () {
        $.getJSON('/get_schedules', function(data) {
            var tbody = $('#schedule-table tbody');
            tbody.empty();
            $.each(data, function(index, item) {
                tbody.append(`
                    <tr>
                        <td>${index + 1}</td>
                        <td>${item.schedule_name}</td>
                        <td>${item.date_time}</td>
                        <td>${item.vehicles}</td>
                        <td>${item.event}</td>
                        <td>${item.status}</td>
                    </tr>
                `);
            });
        });
    });
});
