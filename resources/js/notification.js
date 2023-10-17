import Toastify from "toastify-js";

// console.log('modulo a tosty');

(function (cash) {
    "use strict";
    // console.log('entro a tosty')
    // Basic non sticky notification
    cash("#basic-non-sticky-notification-toggle").on("click", function () {
        Toastify({
            node: cash("#basic-non-sticky-notification-content")
                .clone()
                .removeClass("hidden")[0],
            duration: 3000,
            newWindow: true,
            close: true,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
        }).showToast();
    });

    // Basic sticky notification
    cash("#basic-sticky-notification-toggle").on("click", function () {
        Toastify({
            node: cash("#basic-non-sticky-notification-content")
                .clone()
                .removeClass("hidden")[0],
            duration: -1,
            newWindow: true,
            close: true,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
        }).showToast();
    });

    // Success notification
    cash("#success-notification-toggle").on("click", function () {
        Toastify({
            node: cash("#success-notification-content")
                .clone()
                .removeClass("hidden")[0],
            duration: -1,
            newWindow: true,
            close: true,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
        }).showToast();
    });

    // Notification with actions
    cash("#notification-with-actions-toggle").on("click", function () {
        Toastify({
            node: cash("#notification-with-actions-content")
                .clone()
                .removeClass("hidden")[0],
            duration: -1,
            newWindow: true,
            close: true,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
        }).showToast();
    });

    // Notification with avatar
    cash("#notification-with-avatar-toggle").on("click", function () {
        // Init toastify
        let avatarNotification = Toastify({
            node: cash("#notification-with-avatar-content")
                .clone()
                .removeClass("hidden")[0],
            duration: -1,
            newWindow: true,
            close: false,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
        }).showToast();

        // Close notification event
        cash(avatarNotification.toastElement)
            .find('[data-dismiss="notification"]')
            .on("click", function () {
                avatarNotification.hideToast();
            });
    });

    // Notification with split buttons
    cash("#notification-with-split-buttons-toggle").on("click", function () {
        // Init toastify
        let splitButtonsNotification = Toastify({
            node: cash("#notification-with-split-buttons-content")
                .clone()
                .removeClass("hidden")[0],
            duration: -1,
            newWindow: true,
            close: false,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
        }).showToast();

        // Close notification event
        cash(splitButtonsNotification.toastElement)
            .find('[data-dismiss="notification"]')
            .on("click", function () {
                splitButtonsNotification.hideToast();
            });
    });

    // Notification with buttons below
    cash("#notification-with-buttons-below-toggle").on("click", function () {
        // Init toastify
        Toastify({
            node: cash("#notification-with-buttons-below-content")
                .clone()
                .removeClass("hidden")[0],
            duration: -1,
            newWindow: true,
            close: true,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
        }).showToast();
    });

    // @ Show Notification
    // cash(document).on('livewire:load', () => {




    cash(window).on('show-notification', (event) => {
   

        const { type, message } = event.detail;
        const customData = {
            success: {
                backgroundColor: window.DARK_SESSION ? '#167800' : '#91C714',
                icon: `<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mx-2 feather feather-check-circle">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                </svg>`
            },
            error: {
                backgroundColor: window.DARK_SESSION ? '#C12424' : '#D32929',
                icon: `<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mx-2 feather feather-alert-octagon">
                <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>`
            },
            warning: {
                backgroundColor: window.DARK_SESSION ? '#D8AA00' : '#FBC500',
                icon: `<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mx-2 feather feather-info">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="16" x2="12" y2="12"></line>
                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                </svg>`
            }
        }
        Toastify({
            node: cash(
                `<div class="toastify-content hidden flex">
                    ${customData[type].icon}
                    <span class="font-medium">
                        ${message}
                    <span>
                </div>`
            ).removeClass("hidden")[0],
            duration: 5000,
            newWindow: true,
            close: true,
            gravity: "top",
            position: "right",
            style: { background: customData[type].backgroundColor },
            stopOnFocus: true,
            className: 'custom-toast'
        }).showToast();
    });

   

    // })
})(cash);
