import feather from "feather-icons";

(function () {
    "use strict";

    // Feather Icons
    window.initializeFeather = () => {
        feather.replace({
            'stroke-width': 1.5
        })
        window.feather = feather
    };

    initializeFeather();
})();
