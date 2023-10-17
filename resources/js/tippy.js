import tippy, { roundArrow } from 'tippy.js';

(function (cash) {
    'use strict';

    window.initializeTooltips = () => {
        // Remove initialized tolltips in updated component
        // document.querySelectorAll('.tooltip').forEach(node => {
        //     if (node._tippy?.state?.isDestroyed === false)
        //         node._tippy.destroy()
        // });
        document.querySelectorAll('*').forEach((node) => {
            if (node._tippy?.state?.isDestroyed === false) node._tippy.destroy();
        });

        // Initialize tooltips
        cash(document)
            .find('.tooltip')
            .each(function () {
                let options = {
                    content: cash(this).attr('tooltip'),
                };

                if (cash(this).data('trigger') !== undefined) {
                    options.trigger = cash(this).data('trigger');
                }

                if (cash(this).data('placement') !== undefined) {
                    options.placement = cash(this).data('placement');
                }

                if (cash(this).data('theme') !== undefined) {
                    options.theme = cash(this).data('theme');
                }

                if (cash(this).data('tooltip-content') !== undefined) {
                    options.content = cash(cash(this).data('tooltip-content'))[0];
                }

                // cash(this).removeAttr('title')

                tippy(this, {
                    arrow: roundArrow,
                    animation: 'shift-away',
                    ...options,
                });
            });
    };

    $(document).on('initialize-tooltips', () => {
        setTimeout(() => {
            initializeTooltips();
        }, 100);
    });

    initializeTooltips();
})(cash);
