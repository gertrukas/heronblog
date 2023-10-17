import cash from "cash-dom";

(function(cash) {
    // Show or hide global event listener
    let events = [];

    // Get highest z-index
    function getHighestZindex() {
        let zIndex = 52;
        cash(".modal").each(function() {
            if (
                cash(this).css("z-index") !== "auto" &&
                cash(this).css("z-index") > zIndex
            ) {
                zIndex = parseInt(cash(this).css("z-index"));
            }
        });

        return zIndex;
    }

    // Get scrollbar width
    function getScrollbarWidth(el) {
        return window.innerWidth - cash(el)[0].clientWidth;
    }

    // Show modal with z-index
    function show(el) {
        dispatchEvent(new CustomEvent("modal-show"));

        // Move modal element to body
        cash(
            '<div data-modal-replacer="' + cash(el).attr("id") + '"></div>'
        ).insertAfter(el);
        cash(el).css({
            "margin-top": 0,
            "margin-left": 0
        });
        cash(el).appendTo("body");

        // Show modal by highest z-index
        setTimeout(() => {
            cash(el).addClass('show').css('z-index', getHighestZindex() + 1)
        }, 200)
        // Setting up modal scroll
        cash("body")
            .css(
                "padding-right",
                parseInt(cash("body").css("padding-right")) +
                    getScrollbarWidth("html") +
                    "px"
            )
            .addClass("overflow-y-hidden");
        cash(".modal")
            .removeClass("overflow-y-auto")
            .css("padding-left", "0px");
        cash(el)
            .addClass("overflow-y-auto")
            .css("padding-left", getScrollbarWidth(el) + "px")
            .addClass(cash(".modal.show").length ? "modal__overlap" : "");

        // Trigger callback function
        events.forEach(function(val, key) {
            if (
                cash(el).attr("id") == cash(val.el).attr("id") &&
                val.event == "on.show"
            ) {
                events[key].triggerCallback = true;
            }
        })
    }

    // Hide modal & remove modal scroll
    function hide(el) {
        if (!cash(el)[0])
            return;

        if (cash(el)[0].id) {
            // console.log(el.id.substr(-9));
            if(el.id.substr(-9) == '-backdrop'){
                // console.log('TEST');
                // window.toggleModal(el.id.replace('-backdrop', ''));
            }else{
                dispatchEvent(new CustomEvent("modal-hide"));
            }

        }

        if (cash(el).hasClass("modal") && cash(el).hasClass("show")) {
            cash(el).removeClass("show");
            window.isOpenModal = false;

            setTimeout(() => {
                cash(el)
                    .removeAttr("style")
                    .removeClass("modal__overlap")
                    .removeClass("overflow-y-auto");

                // Add scroll to highest z-index modal if exist
                cash(".modal").each(function() {
                    if (
                        parseInt(cash(this).css("z-index")) ===
                        getHighestZindex()
                    ) {
                        cash(this)
                            .addClass("overflow-y-auto")
                            .css(
                                "padding-left",
                                getScrollbarWidth(this) + "px"
                            );
                    }
                });

                // Return back scroll to body if no more modal showed up
                if (getHighestZindex() == 52) {
                    cash("body")
                        .removeClass("overflow-y-hidden")
                        .css("padding-right", "");
                }

                // Return back modal element to it's first place
                cash(
                    '[data-modal-replacer="' + cash(el).attr("id") + '"]'
                ).replaceWith(el);
            }, 200);

            // Trigger callback function
            events.forEach(function(val, key) {
                if (
                    cash(el).attr("id") == cash(val.el).attr("id") &&
                    val.event == "on.hide"
                ) {
                    events[key].triggerCallback = true;
                }
            });
        }
    }

    // Toggle modal
    function toggle(el) {
        if (cash(el).hasClass("modal") && cash(el).hasClass("show")) {
            hide(el);
        } else {
            show(el);
        }
    }

    // On show
    function onShow(el, callback) {
        events[events.length] = {
            el: el,
            event: "on.show",
            triggerCallback: false,
            callback: callback
        };
    }

    // On hide
    function onHide(el, callback) {
        events[events.length] = {
            el: el,
            event: "on.hide",
            triggerCallback: false,
            callback: callback
        };
    }

    // Show modal
    cash("body").on("click", 'a[data-toggle="modal"]', function() {
        show(cash(this).attr("data-target"));
    });

    // Hide modal
    cash("body").on("click", function(event) {
        hide(event.target);
    });

    // Dismiss modal by link
    cash("body").on("click", '[data-dismiss="modal"]', function() {
        let modal = cash(this).closest(".modal")[0];
        hide(modal);
    });

    cash(window).on('close-modal', (event) => {
        if (typeof event.detail != 'string') {
            closeModal()
        } else {
            let data = JSON.parse(event.detail);
            if (data.modalId === 'all') hide(cash('.modal'))
            else closeModal()
        }
    })
    cash(window).on('close-open-modal', (event) => {
        const modalId = event.detail;
        if (Array.isArray(modalId)) {
            modalId.forEach((modal) => {
                reloadModal(modal, false);
            })
        } else {
            reloadModal(modalId);
        }
    })

    const reloadModal = (modalId, remove = true) => {
        closeModal(remove);
        let modalSelected = cash(`#${modalId}`);
        setTimeout(() => {
            show(modalSelected);
        }, 300);
    }

    const closeModal = (remove = true) => {
        try {
            let modals = cash('.modal').closest('.show');
            let modalByClass = modals[modals.length - 1];
            hide(modalByClass);
            if (remove && modalByClass)
                modalByClass.remove();
        } catch (error) {
            console.error('error closeModal', error);
        }
    }

    // Detect show or hide event
    setInterval(function() {
        events.forEach(function(val, key) {
            if (val.event == "on.show" && val.triggerCallback) {
                val.callback();
                events[key].triggerCallback = false;
            } else if (val.event == "on.hide" && val.triggerCallback) {
                val.callback();
                events[key].triggerCallback = false;
            }
        });
    }, 300);

    cash.fn.modal = function(event, callback) {
        if (event == "show") {
            show(this);
        } else if (event == "hide") {
            hide(this);
        } else if (event == "toggle") {
            toggle(this);
        } else if (event == "on.show") {
            onShow(this, callback);
        } else if (event == "on.hide") {
            onHide(this, callback);
        }
    };
})(cash);
