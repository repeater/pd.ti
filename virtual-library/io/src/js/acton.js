jQuery(document).ready(function($) {
    function formElementSerializers() {
        function input(element) {
            switch (element.type.toLowerCase()) {
                case 'checkbox':
                case 'radio':
                    return inputSelector(element);
                default:
                    return valueSelector(element);
            }
        }

        function inputSelector(element) {
            return element.checked ? element.value : null;
        }

        function valueSelector(element) {
            return element.value;
        }

        function select(element) {
            return (element.type === 'select-one' ? selectOne : selectMany)(element);
        }

        function selectOne(element) {
            var index = element.selectedIndex;
            return index < 0 ? null : optionValue(element.options[index]);
        }

        function selectMany(element) {
            var length = element.length;
            if (!length) return null;
            var values = [];
            for (var i = 0; i < length; i++) {
                var opt = element.options[i];
                if (opt.selected) values.push(optionValue(opt));
            }
            return values;
        }

        function optionValue(opt) {
            if (document.documentElement.hasAttribute) return opt.hasAttribute('value') ? opt.value : opt.text;
            var element = document.getElementById(opt);
            if (element && element.getAttributeNode('value')) return opt.value;
            else return opt.text;
        }
        return {
            input: input,
            inputSelector: inputSelector,
            textarea: valueSelector,
            select: select,
            selectOne: selectOne,
            selectMany: selectMany,
            optionValue: optionValue,
            button: valueSelector
        };
    }
    var r = '';
    formElementById = function(form, id) {
        for (var i = 0; i < form.length; ++i)
            if (form[i].id === id) return form[i];
        return null;
    };
});
