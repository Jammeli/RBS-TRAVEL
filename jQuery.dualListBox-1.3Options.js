 var indexThemes = settings.push({
            box1View: 'box1ThemesView',
            box1Storage: 'box1ThemesStorage',
            box1Filter: 'box1ThemesFilter',
            box1Clear: 'box1ThemesClear',
            box1Counter: 'box1ThemesCounter',
            box2View: 'box2ThemesView',
            box2Storage: 'box2ThemesStorage',
            box2Filter: 'box2ThemesFilter',
            box2Clear: 'box2ThemesClear',
            box2Counter: 'box2ThemesCounter',
            to1: 'to1Themes',
            allTo1: 'allTo1Themes',
            to2: 'to2Themes',
            allTo2: 'allTo2Themes',
            transferMode: 'move',
            sortBy: 'text',
            useFilters: true,
            useCounters: true,
            useSorting: true,
            selectOnSubmit: true
        });

        indexThemes--;

        //merge default settings w/ user defined settings (with user-defined settings overriding defaults)
        $.extend(settings[indexThemes], options);

        //define box groups
        group1.push({
            view: settings[indexThemes].box1View,
            storage: settings[indexThemes].box1Storage,
            filter: settings[indexThemes].box1Filter,
            clear: settings[indexThemes].box1Clear,
            counter: settings[indexThemes].box1Counter,
            index: indexThemes
        });
        group2.push({
            view: settings[indexThemes].box2View,
            storage: settings[indexThemes].box2Storage,
            filter: settings[indexThemes].box2Filter,
            clear: settings[indexThemes].box2Clear,
            counter: settings[indexThemes].box2Counter,
            index: indexThemes
        });

        //define sort function
        if (settings[indexThemes].sortBy == 'text') {
            onSort.push(function(a, b) {
                var aVal = a.text.toLowerCase();
                var bVal = b.text.toLowerCase();
                if (aVal < bVal) { return -1; }
                if (aVal > bVal) { return 1; }
                return 0;
            });
        } else {
            onSort.push(function(a, b) {
                var aVal = a.value.toLowerCase();
                var bVal = b.value.toLowerCase();
                if (aVal < bVal) { return -1; }
                if (aVal > bVal) { return 1; }
                return 0;
            });
        }

        //configure events
        if (settings[indexThemes].useFilters) {
            $('#' + group1[indexThemes].filter).keyup(function() {
                Filter(group1[indexThemes]);
            });
            $('#' + group2[indexThemes].filter).keyup(function() {
                Filter(group2[indexThemes]);
            });
            $('#' + group1[indexThemes].clear).click(function() {
                ClearFilter(group1[indexThemes]);
            });
            $('#' + group2[indexThemes].clear).click(function() {
                ClearFilter(group2[indexThemes]);
            });
        }
        if (IsMoveMode(settings[indexThemes])) {
            $('#' + group2[indexThemes].view).dblclick(function() {
                MoveSelected(group2[indexThemes], group1[indexThemes]);
            });
            $('#' + settings[indexThemes].to1).click(function() {
                MoveSelected(group2[indexThemes], group1[indexThemes]);
            });
            $('#' + settings[indexThemes].allTo1).click(function() {
                MoveAll(group2[indexThemes], group1[indexThemes]);
            });
        } else {
            $('#' + group2[indexThemes].view).dblclick(function() {
                RemoveSelected(group2[indexThemes], group1[indexThemes]);
            });
            $('#' + settings[indexThemes].to1).click(function() {
                RemoveSelected(group2[indexThemes], group1[indexThemes]);
            });
            $('#' + settings[indexThemes].allTo1).click(function() {
                RemoveAll(group2[indexThemes], group1[indexThemes]);
            });
        }
        $('#' + group1[indexThemes].view).dblclick(function() {
            MoveSelected(group1[indexThemes], group2[indexThemes]);
        });
        $('#' + settings[indexThemes].to2).click(function() {
            MoveSelected(group1[indexThemes], group2[indexThemes]);
        });
        $('#' + settings[indexThemes].allTo2).click(function() {
            MoveAll(group1[indexThemes], group2[indexThemes]);
        });

        //initialize the counters
        if (settings[indexThemes].useCounters) {
            UpdateLabel(group1[indexThemes]);
            UpdateLabel(group2[indexThemes]);
        }

        //pre-sort item sets
        if (settings[indexThemes].useSorting) {
            SortThemes(group1[indexThemes]);
            SortThemes(group2[indexThemes]);
        }

        //hide the storage boxes
        $('#' + group1[indexThemes].storage + ',#' + group2[indexThemes].storage).css('display', 'none');

        //attach onSubmit functionality if desired
        if (settings[indexThemes].selectOnSubmit) {
            $('#' + settings[indexThemes].box2View).closest('form').submit(function() {
                $('#' + settings[indexThemes].box2View).children('option').attr('selected', 'selected');
            });
        }