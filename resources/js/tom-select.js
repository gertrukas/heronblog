import TomSelect from "tom-select";

(function (cash) {
    "use strict";

    window.tomSelectInits = {};

    window.destroyTomSelects = () => {
        for (const id in tomSelectInits) {
            tomSelectInits[id].destroy();
        }
        // Object.values(tomSelectInits).forEach((tomSelect: TomSelect) => {
        //     console.log('tomSelect', tomSelect);
        //     tomSelect.clearOptions()
        //     tomSelect.destroy()
        // });
        // for (const id in tomSelectInits) {
        //     if (tomSelectInits[id]) {
        //         console.log('id  destroy', id);
        //         tomSelectInits[id].destroy();
        //     }
        // }
        window.tomSelectInits = {};
    }

    window.initializeTomSelects = () => {
        // destroyTomSelects();
        cash(".tom-select").each(function () {
            try {
                if (cash(this).length && cash(this)[0].nodeName === 'SELECT') {
                    const idTomSelect = cash(this).attr('id');
                    let options = {
                        allowEmptyOption: true,
                        persist: true,
                        create: false,
                        plugins: {
                            dropdown_input: {},
                        },
                        onChange: (value) => {
                            dispatchEvent(new CustomEvent(`tom-select-${idTomSelect}`, {detail: value}));
                        }
                    };

                    if (cash(this).data("placeholder")) {
                        options.placeholder = cash(this).data("placeholder");
                    }

                    if (cash(this).attr("multiple") !== undefined) {
                        options = {
                            ...options,
                            plugins: {
                                ...options.plugins,
                                remove_button: {
                                    title: "Remove this item",
                                },
                            },
                            persist: false,
                            create: true,
                            onDelete: function (values) {
                                return confirm(
                                    values.length > 1
                                        ? "Are you sure you want to remove these " +
                                        values.length +
                                        " items?"
                                        : 'Are you sure you want to remove "' +
                                        values[0] +
                                        '"?'
                                );
                            },
                        };
                    }

                    

                    if (cash(this).data("header")) {
                        options = {
                            ...options,
                            plugins: {
                                ...options.plugins,
                                dropdown_header: {
                                    title: cash(this).data("header"),
                                },
                            },
                        };
                    }

                    const findTomSelect = window.tomSelectInits[idTomSelect];
                    const currentValue = (findTomSelect) ? findTomSelect.getValue() : null;
                    if (findTomSelect) {
                        findTomSelect.clearOptions();
                        findTomSelect.setupOptions();
                        findTomSelect.destroy();
                    }
                    // window.tomSelectInits[idTomSelect] = new TomSelect(`#${idTomSelect}`, options);
                    window.tomSelectInits[idTomSelect] = new TomSelect(this, options);
                    window.tomSelectInits[idTomSelect].setValue(currentValue);
                }
            } catch (error) {
                console.error('error to initialized Tom Select', error);
            }
        });
    }

    initializeTomSelects();

    // Events

    cash(window).on('change-select', ({detail: {id, value}}) => {
        const tomSelect = tomSelectInits[id];
        if (tomSelect) {
            tomSelect.setValue(value);
        }
    });

    cash(window).on('destroy-tom-selects', () => {
        destroyTomSelects();
    });

    cash(window).on('reload-tom-selects', () => {
        initializeTomSelects();
    });

})(cash);
