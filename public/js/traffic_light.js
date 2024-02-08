$(document).ready(function() {
    const lights = $('.light');
    const logTableBody = $('#logTableBody');
    const btnNext = $('#btnNext');

    let currentLightIndex = 0;

    function switchLight() {
        lights.removeClass('active');
        lights.eq(currentLightIndex).addClass('active');

        logEvent('Light switched to ' + lights.eq(currentLightIndex).attr('class'));

        currentLightIndex = (currentLightIndex + 1) % lights.length;
    }

    function logEvent(event) {
        const time = new Date().toLocaleTimeString();
        $.post('/api/log', { message: `${time}: ${event}` })
            .then(() => {
                fetchLogs(); // Fetch logs after successful logging
            });
    }

    btnNext.click(function() {
        const currentLight = lights.eq(currentLightIndex).attr('class');

        switch (currentLight) {
            case 'light green':
                logEvent('Проезд на зеленый!');
                break;
            case 'light yellow':
                const prevLight = lights.eq(currentLightIndex - 1).attr('class');
                if (prevLight === 'light green') {
                    logEvent('Успели на желтый!');
                } else {
                    logEvent('Слишком рано начали движение!');
                }
                break;
            case 'light red':
                logEvent('Проезд на красный. Штраф!');
                break;
        }
    });

    function fetchLogs() {
        $.get('/api/logs', function(logs) {
            logTableBody.empty(); // Clear previous logs
            logs.forEach(log => {
                const row = `<tr><td>${log.time}</td><td>${log.message}</td></tr>`;
                logTableBody.append(row);
            });
        });
    }

    fetchLogs(); // Fetch logs on page load

    setInterval(switchLight, 7000); // Initial switch after 5 seconds
});
