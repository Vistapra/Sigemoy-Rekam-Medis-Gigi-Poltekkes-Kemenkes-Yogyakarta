function initializeNotifications(role) {
    var notificationsWrapper = $('.dropdown-notifications');
    var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = notificationsToggle.find('i[data-count]');
    var notificationsCount = parseInt(notificationsCountElem.data('count'));
    var notifications = notificationsWrapper.find('ul.timeline');

    // Subscribe to the channel
    var channel = pusher.subscribe('notifications');

    // Bind to the event
    channel.bind('new-notification', function (data) {
        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount);
        notifications.prepend(createNotificationHtml(data));

        if (role === "Dokter") {
            updateDoctorList(data);
        } else if (role === "Apotek") {
            updatePharmacyList(data);
        }
    });
}

function createNotificationHtml(data) {
    return `
        <li>
            <div class="timeline-panel">
                <div class="media-body">
                    <h6 class="mb-1">${data.no_rekam}</h6>
                    <h6 class="mb-1">${data.message}</h6>
                    <small class="d-block">${data.created_at}</small>
                    <a href="${data.link}">Klik Proses</a>
                </div>
            </div>
        </li>
    `;
}

function updateDoctorList(data) {
    var listPeriksaDokter = `
        <div class="d-flex pb-3 border-bottom mb-3 align-items-end">
            <div class="mr-auto">
                <p class="text-black font-w600 mb-2"><a href="#">${data.no_rekam}</a></p>
                <ul>
                    <li><i class="las la-clock"></i>Time : ${data.created_at}</li>
                    <li><i class="las la-clock"></i>No Rekam : ${data.no_rekam}</li>
                    <li><i class="las la-user"></i>${data.message}</li>
                </ul>
            </div>
            <a href="${data.link}" class="btn-rounded btn-primary btn-xs">
                <i class="fa fa-user-md"></i> Periksa
            </a>
        </div>`;
    $("#antrian-list-notif").append(listPeriksaDokter);
}

function updatePharmacyList(data) {
    var listPermintaanObat = `
        <div class="d-flex pb-3 border-bottom mb-3 align-items-end">
            <div class="mr-auto">
                <p class="text-black font-w600 mb-2"><a href="#">${data.no_rekam}</a></p>
                <ul>
                    <li><i class="las la-clock"></i>Time : ${data.created_at}</li>
                    <li><i class="las la-clock"></i>No Rekam : ${data.no_rekam}</li>
                    <li><i class="las la-user"></i>${data.message}</li>
                </ul>
            </div>
            <a href="${data.link}" class="btn-rounded btn-primary btn-xs">
                <i class="fa fa-user-md"></i> Berikan Obat
            </a>
        </div>`;
    $("#obat-list-notif").append(listPermintaanObat);
}