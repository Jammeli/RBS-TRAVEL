/*
*       Developed by Justin Mead
*       ©2011 MeadMiracle
*		www.meadmiracle.com / meadmiracle@gmail.com
*       Version 1.3
*       Testing: IE8/Windows XP
*                Firefox/Windows XP
*                Chrome/Windows XP
*       Licensed under the Creative Commons GPL http://creativecommons.org/licenses/GPL/2.0/
*
*       OPTIONS LISTING:
*           *box1View, box2View         - the id attributes of the VISIBLE listboxes
*           *box1Storage, box2Storage   - the id attributes of the HIDDEN listboxes (used for filtering)
*           *box1Filter, box2Filter     - the id attributes of the textboxes used to filter the lists
*           *box1Clear, box2Clear       - the id attributes of the elements used to clear/reset the filters
*           *box1Counter, box2Counter   - the id attributes of the elements used to display counts of visible/total items (used when filtering)
*           *to1, to2                   - the id attributes of the elements used to transfer only selected items between boxes
*           *allTo1, allTo2             - the id attributes of the elements used to transfer ALL (visible) items between boxes
*           *transferMode               - the type of transfer to perform on items (see heading TRANSFER MODES)
*           *sortBy                     - the attribute to use when sorting items (values: 'text' or 'value')
*           *useFilters                 - allow the filtering of items in either box (true/false)
*           *useCounters                - use the visible/total counters (true/false)
*           *useSorting                 - sort items after executing a transfer (true/false)
*           *selectOnSubmit             - select items in box 2 when the form is submitted (true/false)
*
*       All options have default values, and as such, are optional.  Check the 'settings' JSON object below to see the defaults.
*
*       TRANSFER MODES:
*           * 'move' - In this mode, items will be removed from the box in which they currently reside and moved to the other box. This is the default.
*           * 'copy' - In this mode, items in box 1 will ALWAYS remain in box 1 (unless they are hidden by filtering).  When they are selected for transfer
*                      they will be copied to box 2 and will be given the class 'copiedOption' in box 1 (my default styling for this class is yellow background
*                      but you may choose whatever styling suits you).  If they are then transferred from box 2, they disappear from box 2, and the 'copiedOption'
*                      class is removed from the corresponding option in box 1.
*
*/

(function($) {
    var settings = new Array();
    var group1 = new Array();
    var group2 = new Array();
    var onSort = new Array();

    //the main method that the end user will execute to setup the DLB
    $.configureBoxes = function(options) {
        //define default settings
		 
		
		
        var indexOptions = settings.push({
            box1View: 'box1OptionsView',
            box1Storage: 'box1OptionsStorage',
            box1Filter: 'box1OptionsFilter',
            box1Clear: 'box1OptionsClear',
            box1Counter: 'box1OptionsCounter',
            box2View: 'box2OptionsView',
            box2Storage: 'box2OptionsStorage',
            box2Filter: 'box2OptionsFilter',
            box2Clear: 'box2OptionsClear',
            box2Counter: 'box2OptionsCounter',
            to1: 'to1Options',
            allTo1: 'allTo1Options',
            to2: 'to2Options',
            allTo2: 'allTo2Options',
            transferMode: 'move',
            sortBy: 'text',
            useFilters: true,
            useCounters: true,
            useSorting: true,
            selectOnSubmit: true
        });

        indexOptions--;

        //merge default settings w/ user defined settings (with user-defined settings overriding defaults)
        $.extend(settings[indexOptions], options);

        //define box groups
        group1.push({
            view: settings[indexOptions].box1View,
            storage: settings[indexOptions].box1Storage,
            filter: settings[indexOptions].box1Filter,
            clear: settings[indexOptions].box1Clear,
            counter: settings[indexOptions].box1Counter,
            index: indexOptions
        });
        group2.push({
            view: settings[indexOptions].box2View,
            storage: settings[indexOptions].box2Storage,
            filter: settings[indexOptions].box2Filter,
            clear: settings[indexOptions].box2Clear,
            counter: settings[indexOptions].box2Counter,
            index: indexOptions
        });

        //define sort function
        if (settings[indexOptions].sortBy == 'text') {
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
        if (settings[indexOptions].useFilters) {
            $('#' + group1[indexOptions].filter).keyup(function() {
                Filter(group1[indexOptions]);
            });
            $('#' + group2[indexOptions].filter).keyup(function() {
                Filter(group2[indexOptions]);
            });
            $('#' + group1[indexOptions].clear).click(function() {
                ClearFilter(group1[indexOptions]);
            });
            $('#' + group2[indexOptions].clear).click(function() {
                ClearFilter(group2[indexOptions]);
            });
        }
        if (IsMoveMode(settings[indexOptions])) {
            $('#' + group2[indexOptions].view).dblclick(function() {
                MoveSelected(group2[indexOptions], group1[indexOptions]);
            });
            $('#' + settings[indexOptions].to1).click(function() {
                MoveSelected(group2[indexOptions], group1[indexOptions]);
            });
            $('#' + settings[indexOptions].allTo1).click(function() {
                MoveAll(group2[indexOptions], group1[indexOptions]);
            });
        } else {
            $('#' + group2[indexOptions].view).dblclick(function() {
                RemoveSelected(group2[indexOptions], group1[indexOptions]);
            });
            $('#' + settings[indexOptions].to1).click(function() {
                RemoveSelected(group2[indexOptions], group1[indexOptions]);
            });
            $('#' + settings[indexOptions].allTo1).click(function() {
                RemoveAll(group2[indexOptions], group1[indexOptions]);
            });
        }
        $('#' + group1[indexOptions].view).dblclick(function() {
            MoveSelected(group1[indexOptions], group2[indexOptions]);
        });
        $('#' + settings[indexOptions].to2).click(function() {
            MoveSelected(group1[indexOptions], group2[indexOptions]);
        });
        $('#' + settings[indexOptions].allTo2).click(function() {
            MoveAll(group1[indexOptions], group2[indexOptions]);
        });

        //initialize the counters
        if (settings[indexOptions].useCounters) {
            UpdateLabel(group1[indexOptions]);
            UpdateLabel(group2[indexOptions]);
        }

        //pre-sort item sets
        if (settings[indexOptions].useSorting) {
            SortOptions(group1[indexOptions]);
            SortOptions(group2[indexOptions]);
        }

        //hide the storage boxes
        $('#' + group1[indexOptions].storage + ',#' + group2[indexOptions].storage).css('display', 'none');

        //attach onSubmit functionality if desired
        if (settings[indexOptions].selectOnSubmit) {
            $('#' + settings[indexOptions].box2View).closest('form').submit(function() {
                $('#' + settings[indexOptions].box2View).children('option').attr('selected', 'selected');
            });
        }
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
  
        var index = settings.push({
            box1View: 'box1View',
            box1Storage: 'box1Storage',
            box1Filter: 'box1Filter',
            box1Clear: 'box1Clear',
            box1Counter: 'box1Counter',
            box2View: 'box2View',
            box2Storage: 'box2Storage',
            box2Filter: 'box2Filter',
            box2Clear: 'box2Clear',
            box2Counter: 'box2Counter',
            to1: 'to1',
            allTo1: 'allTo1',
            to2: 'to2',
            allTo2: 'allTo2',
            transferMode: 'move',
            sortBy: 'text',
            useFilters: true,
            useCounters: true,
            useSorting: true,
            selectOnSubmit: true
        });

        index--;

        //merge default settings w/ user defined settings (with user-defined settings overriding defaults)
        $.extend(settings[index], options);

        //define box groups
        group1.push({
            view: settings[index].box1View,
            storage: settings[index].box1Storage,
            filter: settings[index].box1Filter,
            clear: settings[index].box1Clear,
            counter: settings[index].box1Counter,
            index: index
        });
        group2.push({
            view: settings[index].box2View,
            storage: settings[index].box2Storage,
            filter: settings[index].box2Filter,
            clear: settings[index].box2Clear,
            counter: settings[index].box2Counter,
            index: index
        });

        //define sort function
        if (settings[index].sortBy == 'text') {
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
        if (settings[index].useFilters) {
            $('#' + group1[index].filter).keyup(function() {
                Filter(group1[index]);
            });
            $('#' + group2[index].filter).keyup(function() {
                Filter(group2[index]);
            });
            $('#' + group1[index].clear).click(function() {
                ClearFilter(group1[index]);
            });
            $('#' + group2[index].clear).click(function() {
                ClearFilter(group2[index]);
            });
        }
        if (IsMoveMode(settings[index])) {
            $('#' + group2[index].view).dblclick(function() {
                MoveSelected(group2[index], group1[index]);
            });
            $('#' + settings[index].to1).click(function() {
                MoveSelected(group2[index], group1[index]);
            });
            $('#' + settings[index].allTo1).click(function() {
                MoveAll(group2[index], group1[index]);
            });
        } else {
            $('#' + group2[index].view).dblclick(function() {
                RemoveSelected(group2[index], group1[index]);
            });
            $('#' + settings[index].to1).click(function() {
                RemoveSelected(group2[index], group1[index]);
            });
            $('#' + settings[index].allTo1).click(function() {
                RemoveAll(group2[index], group1[index]);
            });
        }
        $('#' + group1[index].view).dblclick(function() {
            MoveSelected(group1[index], group2[index]);
        });
        $('#' + settings[index].to2).click(function() {
            MoveSelected(group1[index], group2[index]);
        });
        $('#' + settings[index].allTo2).click(function() {
            MoveAll(group1[index], group2[index]);
        });

        //initialize the counters
        if (settings[index].useCounters) {
            UpdateLabel(group1[index]);
            UpdateLabel(group2[index]);
        }

        //pre-sort item sets
        if (settings[index].useSorting) {
            SortOptions(group1[index]);
            SortOptions(group2[index]);
        }

        //hide the storage boxes
        $('#' + group1[index].storage + ',#' + group2[index].storage).css('display', 'none');

        //attach onSubmit functionality if desired
        if (settings[index].selectOnSubmit) {
            $('#' + settings[index].box2View).closest('form').submit(function() {
                $('#' + settings[index].box2View).children('option').attr('selected', 'selected');
            });
        }
		
		
		
		
		
      	
  
        var indexTypes = settings.push({
            box1View: 'box1TypesView',
            box1Storage: 'box1TypesStorage',
            box1Filter: 'box1TypesFilter',
            box1Clear: 'box1TypesClear',
            box1Counter: 'box1TypesCounter',
            box2View: 'box2TypesView',
            box2Storage: 'box2TypesStorage',
            box2Filter: 'box2TypesFilter',
            box2Clear: 'box2TypesClear',
            box2Counter: 'box2TypesCounter',
            to1: 'to1Types',
            allTo1: 'allTo1Types',
            to2: 'to2Types',
            allTo2: 'allTo2Types',
            transferMode: 'move',
            sortBy: 'text',
            useFilters: true,
            useCounters: true,
            useSorting: true,
            selectOnSubmit: true
        });

        indexTypes--;

        //merge default settings w/ user defined settings (with user-defined settings overriding defaults)
        $.extend(settings[indexTypes], options);

        //define box groups
        group1.push({
            view: settings[indexTypes].box1View,
            storage: settings[indexTypes].box1Storage,
            filter: settings[indexTypes].box1Filter,
            clear: settings[indexTypes].box1Clear,
            counter: settings[indexTypes].box1Counter,
            index: indexTypes
        });
        group2.push({
            view: settings[indexTypes].box2View,
            storage: settings[indexTypes].box2Storage,
            filter: settings[indexTypes].box2Filter,
            clear: settings[indexTypes].box2Clear,
            counter: settings[indexTypes].box2Counter,
            index: indexTypes
        });

        //define sort function
        if (settings[indexTypes].sortBy == 'text') {
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
        if (settings[indexTypes].useFilters) {
            $('#' + group1[indexTypes].filter).keyup(function() {
                Filter(group1[indexTypes]);
            });
            $('#' + group2[indexTypes].filter).keyup(function() {
                Filter(group2[indexTypes]);
            });
            $('#' + group1[indexTypes].clear).click(function() {
                ClearFilter(group1[indexTypes]);
            });
            $('#' + group2[indexTypes].clear).click(function() {
                ClearFilter(group2[indexTypes]);
            });
        }
        if (IsMoveMode(settings[indexTypes])) {
            $('#' + group2[indexTypes].view).dblclick(function() {
                MoveSelected(group2[indexTypes], group1[indexTypes]);
            });
            $('#' + settings[indexTypes].to1).click(function() {
                MoveSelected(group2[indexTypes], group1[indexTypes]);
            });
            $('#' + settings[indexTypes].allTo1).click(function() {
                MoveAll(group2[indexTypes], group1[indexTypes]);
            });
        } else {
            $('#' + group2[indexTypes].view).dblclick(function() {
                RemoveSelected(group2[indexTypes], group1[indexTypes]);
            });
            $('#' + settings[indexTypes].to1).click(function() {
                RemoveSelected(group2[indexTypes], group1[indexTypes]);
            });
            $('#' + settings[indexTypes].allTo1).click(function() {
                RemoveAll(group2[indexTypes], group1[indexTypes]);
            });
        }
        $('#' + group1[indexTypes].view).dblclick(function() {
            MoveSelected(group1[indexTypes], group2[indexTypes]);
        });
        $('#' + settings[indexTypes].to2).click(function() {
            MoveSelected(group1[indexTypes], group2[indexTypes]);
        });
        $('#' + settings[indexTypes].allTo2).click(function() {
            MoveAll(group1[indexTypes], group2[indexTypes]);
        });

        //initialize the counters
        if (settings[indexTypes].useCounters) {
            UpdateLabel(group1[indexTypes]);
            UpdateLabel(group2[indexTypes]);
        }

        //pre-sort item sets
        if (settings[indexTypes].useSorting) {
            SortOptions(group1[indexTypes]);
            SortOptions(group2[indexTypes]);
        }

        //hide the storage boxes
        $('#' + group1[indexTypes].storage + ',#' + group2[indexTypes].storage).css('display', 'none');

        //attach onSubmit functionality if desired
        if (settings[indexTypes].selectOnSubmit) {
            $('#' + settings[indexTypes].box2View).closest('form').submit(function() {
                $('#' + settings[indexTypes].box2View).children('option').attr('selected', 'selected');
            });
        }
		
		
			
  
        var indexTypes2 = settings.push({
            box1View: 'box1Types2View',
            box1Storage: 'box1Types2Storage',
            box1Filter: 'box1Types2Filter',
            box1Clear: 'box1Types2Clear',
            box1Counter: 'box1Types2Counter',
            box2View: 'box2Types2View',
            box2Storage: 'box2Types2Storage',
            box2Filter: 'box2Types2Filter',
            box2Clear: 'box2Types2Clear',
            box2Counter: 'box2Types2Counter',
            to1: 'to1Types2',
            allTo1: 'allTo1Types2',
            to2: 'to2Types2',
            allTo2: 'allTo2Types2',
            transferMode: 'move',
            sortBy: 'text',
            useFilters: true,
            useCounters: true,
            useSorting: true,
            selectOnSubmit: true
        });

        indexTypes2--;

        //merge default settings w/ user defined settings (with user-defined settings overriding defaults)
        $.extend(settings[indexTypes2], options);

        //define box groups
        group1.push({
            view: settings[indexTypes2].box1View,
            storage: settings[indexTypes2].box1Storage,
            filter: settings[indexTypes2].box1Filter,
            clear: settings[indexTypes2].box1Clear,
            counter: settings[indexTypes2].box1Counter,
            index: indexTypes2
        });
        group2.push({
            view: settings[indexTypes2].box2View,
            storage: settings[indexTypes2].box2Storage,
            filter: settings[indexTypes2].box2Filter,
            clear: settings[indexTypes2].box2Clear,
            counter: settings[indexTypes2].box2Counter,
            index: indexTypes2
        });

        //define sort function
        if (settings[indexTypes2].sortBy == 'text') {
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
        if (settings[indexTypes2].useFilters) {
            $('#' + group1[indexTypes2].filter).keyup(function() {
                Filter(group1[indexTypes2]);
            });
            $('#' + group2[indexTypes2].filter).keyup(function() {
                Filter(group2[indexTypes2]);
            });
            $('#' + group1[indexTypes2].clear).click(function() {
                ClearFilter(group1[indexTypes2]);
            });
            $('#' + group2[indexTypes2].clear).click(function() {
                ClearFilter(group2[indexTypes2]);
            });
        }
        if (IsMoveMode(settings[indexTypes2])) {
            $('#' + group2[indexTypes2].view).dblclick(function() {
                MoveSelected(group2[indexTypes2], group1[indexTypes2]);
            });
            $('#' + settings[indexTypes2].to1).click(function() {
                MoveSelected(group2[indexTypes2], group1[indexTypes2]);
            });
            $('#' + settings[indexTypes2].allTo1).click(function() {
                MoveAll(group2[indexTypes2], group1[indexTypes2]);
            });
        } else {
            $('#' + group2[indexTypes2].view).dblclick(function() {
                RemoveSelected(group2[indexTypes2], group1[indexTypes2]);
            });
            $('#' + settings[indexTypes2].to1).click(function() {
                RemoveSelected(group2[indexTypes2], group1[indexTypes2]);
            });
            $('#' + settings[indexTypes2].allTo1).click(function() {
                RemoveAll(group2[indexTypes2], group1[indexTypes2]);
            });
        }
        $('#' + group1[indexTypes2].view).dblclick(function() {
            MoveSelected(group1[indexTypes2], group2[indexTypes2]);
        });
        $('#' + settings[indexTypes2].to2).click(function() {
            MoveSelected(group1[indexTypes2], group2[indexTypes2]);
        });
        $('#' + settings[indexTypes2].allTo2).click(function() {
            MoveAll(group1[indexTypes2], group2[indexTypes2]);
        });

        //initialize the counters
        if (settings[indexTypes2].useCounters) {
            UpdateLabel(group1[indexTypes2]);
            UpdateLabel(group2[indexTypes2]);
        }

        //pre-sort item sets
        if (settings[indexTypes2].useSorting) {
            SortOptions(group1[indexTypes2]);
            SortOptions(group2[indexTypes2]);
        }

        //hide the storage boxes
        $('#' + group1[indexTypes2].storage + ',#' + group2[indexTypes2].storage).css('display', 'none');

        //attach onSubmit functionality if desired
        if (settings[indexTypes2].selectOnSubmit) {
            $('#' + settings[indexTypes2].box2View).closest('form').submit(function() {
                $('#' + settings[indexTypes2].box2View).children('option').attr('selected', 'selected');
            });
        }
		
		
		
		
		
		
		
		
		
		
			
  
        var indexReductions = settings.push({
            box1View: 'box1ReductionsView',
            box1Storage: 'box1ReductionsStorage',
            box1Filter: 'box1ReductionsFilter',
            box1Clear: 'box1ReductionsClear',
            box1Counter: 'box1ReductionsCounter',
            box2View: 'box2ReductionsView',
            box2Storage: 'box2ReductionsStorage',
            box2Filter: 'box2ReductionsFilter',
            box2Clear: 'box2ReductionsClear',
            box2Counter: 'box2ReductionsCounter',
            to1: 'to1Reductions',
            allTo1: 'allTo1Reductions',
            to2: 'to2Reductions',
            allTo2: 'allTo2Reductions',
            transferMode: 'move',
            sortBy: 'text',
            useFilters: true,
            useCounters: true,
            useSorting: true,
            selectOnSubmit: true
        });

        indexReductions--;

        //merge default settings w/ user defined settings (with user-defined settings overriding defaults)
        $.extend(settings[indexReductions], options);

        //define box groups
        group1.push({
            view: settings[indexReductions].box1View,
            storage: settings[indexReductions].box1Storage,
            filter: settings[indexReductions].box1Filter,
            clear: settings[indexReductions].box1Clear,
            counter: settings[indexReductions].box1Counter,
            index: indexReductions
        });
        group2.push({
            view: settings[indexReductions].box2View,
            storage: settings[indexReductions].box2Storage,
            filter: settings[indexReductions].box2Filter,
            clear: settings[indexReductions].box2Clear,
            counter: settings[indexReductions].box2Counter,
            index: indexReductions
        });

        //define sort function
        if (settings[indexReductions].sortBy == 'text') {
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
        if (settings[indexReductions].useFilters) {
            $('#' + group1[indexReductions].filter).keyup(function() {
                Filter(group1[indexReductions]);
            });
            $('#' + group2[indexReductions].filter).keyup(function() {
                Filter(group2[indexReductions]);
            });
            $('#' + group1[indexReductions].clear).click(function() {
                ClearFilter(group1[indexReductions]);
            });
            $('#' + group2[indexReductions].clear).click(function() {
                ClearFilter(group2[indexReductions]);
            });
        }
        if (IsMoveMode(settings[indexReductions])) {
            $('#' + group2[indexReductions].view).dblclick(function() {
                MoveSelected(group2[indexReductions], group1[indexReductions]);
            });
            $('#' + settings[indexReductions].to1).click(function() {
                MoveSelected(group2[indexReductions], group1[indexReductions]);
            });
            $('#' + settings[indexReductions].allTo1).click(function() {
                MoveAll(group2[indexReductions], group1[indexReductions]);
            });
        } else {
            $('#' + group2[indexReductions].view).dblclick(function() {
                RemoveSelected(group2[indexReductions], group1[indexReductions]);
            });
            $('#' + settings[indexReductions].to1).click(function() {
                RemoveSelected(group2[indexReductions], group1[indexReductions]);
            });
            $('#' + settings[indexReductions].allTo1).click(function() {
                RemoveAll(group2[indexReductions], group1[indexReductions]);
            });
        }
        $('#' + group1[indexReductions].view).dblclick(function() {
            MoveSelected(group1[indexReductions], group2[indexReductions]);
        });
        $('#' + settings[indexReductions].to2).click(function() {
            MoveSelected(group1[indexReductions], group2[indexReductions]);
        });
        $('#' + settings[indexReductions].allTo2).click(function() {
            MoveAll(group1[indexReductions], group2[indexReductions]);
        });

        //initialize the counters
        if (settings[indexReductions].useCounters) {
            UpdateLabel(group1[indexReductions]);
            UpdateLabel(group2[indexReductions]);
        }

        //pre-sort item sets
        if (settings[indexReductions].useSorting) {
            SortOptions(group1[indexReductions]);
            SortOptions(group2[indexReductions]);
        }

        //hide the storage boxes
        $('#' + group1[indexReductions].storage + ',#' + group2[indexReductions].storage).css('display', 'none');

        //attach onSubmit functionality if desired
        if (settings[indexReductions].selectOnSubmit) {
            $('#' + settings[indexReductions].box2View).closest('form').submit(function() {
                $('#' + settings[indexReductions].box2View).children('option').attr('selected', 'selected');
            });
        }
		
	
		
		
		
		
		
		
		
		
		
		
		
		
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
            SortOptions(group1[indexThemes]);
            SortOptions(group2[indexThemes]);
        }

        //hide the storage boxes
        $('#' + group1[indexThemes].storage + ',#' + group2[indexThemes].storage).css('display', 'none');

        //attach onSubmit functionality if desired
        if (settings[indexThemes].selectOnSubmit) {
            $('#' + settings[indexThemes].box2View).closest('form').submit(function() {
                $('#' + settings[indexThemes].box2View).children('option').attr('selected', 'selected');
            });
        }
		
		
		
		   var indexArrangement = settings.push({
            box1View: 'box1ArrangementView',
            box1Storage: 'box1ArrangementStorage',
            box1Filter: 'box1ArrangementFilter',
            box1Clear: 'box1ArrangementClear',
            box1Counter: 'box1ArrangementCounter',
            box2View: 'box2ArrangementView',
            box2Storage: 'box2ArrangementStorage',
            box2Filter: 'box2ArrangementFilter',
            box2Clear: 'box2ArrangementClear',
            box2Counter: 'box2ArrangementCounter',
            to1: 'to1Arrangement',
            allTo1: 'allTo1Arrangement',
            to2: 'to2Arrangement',
            allTo2: 'allTo2Arrangement',
            transferMode: 'move',
            sortBy: 'text',
            useFilters: true,
            useCounters: true,
            useSorting: true,
            selectOnSubmit: true
        });

        indexArrangement--;

        //merge default settings w/ user defined settings (with user-defined settings overriding defaults)
        $.extend(settings[indexArrangement], options);

        //define box groups
        group1.push({
            view: settings[indexArrangement].box1View,
            storage: settings[indexArrangement].box1Storage,
            filter: settings[indexArrangement].box1Filter,
            clear: settings[indexArrangement].box1Clear,
            counter: settings[indexArrangement].box1Counter,
            index: indexArrangement
        });
        group2.push({
            view: settings[indexArrangement].box2View,
            storage: settings[indexArrangement].box2Storage,
            filter: settings[indexArrangement].box2Filter,
            clear: settings[indexArrangement].box2Clear,
            counter: settings[indexArrangement].box2Counter,
            index: indexArrangement
        });

        //define sort function
        if (settings[indexArrangement].sortBy == 'text') {
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
        if (settings[indexArrangement].useFilters) {
            $('#' + group1[indexArrangement].filter).keyup(function() {
                Filter(group1[indexArrangement]);
            });
            $('#' + group2[indexArrangement].filter).keyup(function() {
                Filter(group2[indexArrangement]);
            });
            $('#' + group1[indexArrangement].clear).click(function() {
                ClearFilter(group1[indexArrangement]);
            });
            $('#' + group2[indexArrangement].clear).click(function() {
                ClearFilter(group2[indexArrangement]);
            });
        }
        if (IsMoveMode(settings[indexArrangement])) {
            $('#' + group2[indexArrangement].view).dblclick(function() {
                MoveSelected(group2[indexArrangement], group1[indexArrangement]);
            });
            $('#' + settings[indexArrangement].to1).click(function() {
                MoveSelected(group2[indexArrangement], group1[indexArrangement]);
            });
            $('#' + settings[indexArrangement].allTo1).click(function() {
                MoveAll(group2[indexArrangement], group1[indexArrangement]);
            });
        } else {
            $('#' + group2[indexArrangement].view).dblclick(function() {
                RemoveSelected(group2[indexArrangement], group1[indexArrangement]);
            });
            $('#' + settings[indexArrangement].to1).click(function() {
                RemoveSelected(group2[indexArrangement], group1[indexArrangement]);
            });
            $('#' + settings[indexArrangement].allTo1).click(function() {
                RemoveAll(group2[indexArrangement], group1[indexArrangement]);
            });
        }
        $('#' + group1[indexArrangement].view).dblclick(function() {
            MoveSelected(group1[indexArrangement], group2[indexArrangement]);
        });
        $('#' + settings[indexArrangement].to2).click(function() {
            MoveSelected(group1[indexArrangement], group2[indexArrangement]);
        });
        $('#' + settings[indexArrangement].allTo2).click(function() {
            MoveAll(group1[indexArrangement], group2[indexArrangement]);
        });

        //initialize the counters
        if (settings[indexArrangement].useCounters) {
            UpdateLabel(group1[indexArrangement]);
            UpdateLabel(group2[indexArrangement]);
        }

        //pre-sort item sets
        if (settings[indexArrangement].useSorting) {
            SortOptions(group1[indexArrangement]);
            SortOptions(group2[indexArrangement]);
        }

        //hide the storage boxes
        $('#' + group1[indexArrangement].storage + ',#' + group2[indexArrangement].storage).css('display', 'none');

        //attach onSubmit functionality if desired
        if (settings[indexArrangement].selectOnSubmit) {
            $('#' + settings[indexArrangement].box2View).closest('form').submit(function() {
                $('#' + settings[indexArrangement].box2View).children('option').attr('selected', 'selected');
            });
        }
		
		
		
		
		
		
		
		
		
				
		   var indexamenagement = settings.push({
            box1View: 'box1amenagementView',
            box1Storage: 'box1amenagementStorage',
            box1Filter: 'box1amenagementFilter',
            box1Clear: 'box1amenagementClear',
            box1Counter: 'box1amenagementCounter',
            box2View: 'box2amenagementView',
            box2Storage: 'box2amenagementStorage',
            box2Filter: 'box2amenagementFilter',
            box2Clear: 'box2amenagementClear',
            box2Counter: 'box2amenagementCounter',
            to1: 'to1amenagement',
            allTo1: 'allTo1amenagement',
            to2: 'to2amenagement',
            allTo2: 'allTo2amenagement',
            transferMode: 'move',
            sortBy: 'text',
            useFilters: true,
            useCounters: true,
            useSorting: true,
            selectOnSubmit: true
        });

        indexamenagement--;

        //merge default settings w/ user defined settings (with user-defined settings overriding defaults)
        $.extend(settings[indexamenagement], options);

        //define box groups
        group1.push({
            view: settings[indexamenagement].box1View,
            storage: settings[indexamenagement].box1Storage,
            filter: settings[indexamenagement].box1Filter,
            clear: settings[indexamenagement].box1Clear,
            counter: settings[indexamenagement].box1Counter,
            index: indexamenagement
        });
        group2.push({
            view: settings[indexamenagement].box2View,
            storage: settings[indexamenagement].box2Storage,
            filter: settings[indexamenagement].box2Filter,
            clear: settings[indexamenagement].box2Clear,
            counter: settings[indexamenagement].box2Counter,
            index: indexamenagement
        });

        //define sort function
        if (settings[indexamenagement].sortBy == 'text') {
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
        if (settings[indexamenagement].useFilters) {
            $('#' + group1[indexamenagement].filter).keyup(function() {
                Filter(group1[indexamenagement]);
            });
            $('#' + group2[indexamenagement].filter).keyup(function() {
                Filter(group2[indexamenagement]);
            });
            $('#' + group1[indexamenagement].clear).click(function() {
                ClearFilter(group1[indexamenagement]);
            });
            $('#' + group2[indexamenagement].clear).click(function() {
                ClearFilter(group2[indexamenagement]);
            });
        }
        if (IsMoveMode(settings[indexamenagement])) {
            $('#' + group2[indexamenagement].view).dblclick(function() {
                MoveSelected(group2[indexamenagement], group1[indexamenagement]);
            });
            $('#' + settings[indexamenagement].to1).click(function() {
                MoveSelected(group2[indexamenagement], group1[indexamenagement]);
            });
            $('#' + settings[indexamenagement].allTo1).click(function() {
                MoveAll(group2[indexamenagement], group1[indexamenagement]);
            });
        } else {
            $('#' + group2[indexamenagement].view).dblclick(function() {
                RemoveSelected(group2[indexamenagement], group1[indexamenagement]);
            });
            $('#' + settings[indexamenagement].to1).click(function() {
                RemoveSelected(group2[indexamenagement], group1[indexamenagement]);
            });
            $('#' + settings[indexamenagement].allTo1).click(function() {
                RemoveAll(group2[indexamenagement], group1[indexamenagement]);
            });
        }
        $('#' + group1[indexamenagement].view).dblclick(function() {
            MoveSelected(group1[indexamenagement], group2[indexamenagement]);
        });
        $('#' + settings[indexamenagement].to2).click(function() {
            MoveSelected(group1[indexamenagement], group2[indexamenagement]);
        });
        $('#' + settings[indexamenagement].allTo2).click(function() {
            MoveAll(group1[indexamenagement], group2[indexamenagement]);
        });

        //initialize the counters
        if (settings[indexamenagement].useCounters) {
            UpdateLabel(group1[indexamenagement]);
            UpdateLabel(group2[indexamenagement]);
        }

        //pre-sort item sets
        if (settings[indexamenagement].useSorting) {
            SortOptions(group1[indexamenagement]);
            SortOptions(group2[indexamenagement]);
        }

        //hide the storage boxes
        $('#' + group1[indexamenagement].storage + ',#' + group2[indexamenagement].storage).css('display', 'none');

        //attach onSubmit functionality if desired
        if (settings[indexamenagement].selectOnSubmit) {
            $('#' + settings[indexamenagement].box2View).closest('form').submit(function() {
                $('#' + settings[indexamenagement].box2View).children('option').attr('selected', 'selected');
            });
        }
    };
	
	
	
        

    function UpdateLabel(group) {
        var showingCount = $("#" + group.view + " option").size();
        var hiddenCount = $("#" + group.storage + " option").size();
        $("#" + group.counter).text('Showing ' + showingCount + ' of ' + (showingCount + hiddenCount));
    }

    function Filter(group) {
        var index = group.index;
        var filterLower;
        if (settings[index].useFilters) {
            filterLower = $('#' + group.filter).val().toString().toLowerCase();
        } else {
            filterLower = '';
        }
        $('#' + group.view + ' option').filter(function(i) {
            var toMatch = $(this).text().toString().toLowerCase();
            return toMatch.indexOf(filterLower) == -1;
        }).appendTo('#' + group.storage);
        $('#' + group.storage + ' option').filter(function(i) {
            var toMatch = $(this).text().toString().toLowerCase();
            return toMatch.indexOf(filterLower) != -1;
        }).appendTo('#' + group.view);
        try {
            $('#' + group.view + ' option').removeAttr('selected');
        }
        catch (ex) {
            //swallow the error for IE6
        }
        if (settings[index].useSorting) { SortOptions(group); }
        if (settings[index].useCounters) { UpdateLabel(group); }
    }

    function SortOptions(group) {
        var $toSortOptions = $('#' + group.view + ' option');
        $toSortOptions.sort(onSort[group.index]);
        $('#' + group.view).empty().append($toSortOptions);
    }

    function MoveSelected(fromGroup, toGroup) {
        if (IsMoveMode(settings[fromGroup.index])) {
            $('#' + fromGroup.view + ' option:selected').appendTo('#' + toGroup.view);
			

        } else {
            $('#' + fromGroup.view + ' option:selected:not([class*=copiedOption])').clone().appendTo('#' + toGroup.view).end().end().addClass('copiedOption');
        }
        try {
            $('#' + fromGroup.view + ' option,#' + toGroup.view + ' option').removeAttr('selected');
        }
        catch (ex) {
            //swallow the error for IE6
        }
        Filter(toGroup);
        if (settings[fromGroup.index].useCounters) { UpdateLabel(fromGroup); }
    }

    function MoveAll(fromGroup, toGroup) {
        if (IsMoveMode(settings[fromGroup.index])) {
            $('#' + fromGroup.view + ' option').appendTo('#' + toGroup.view);
			
        } else {
            $('#' + fromGroup.view + ' option:not([class*=copiedOption])').clone().appendTo('#' + toGroup.view).end().end().addClass('copiedOption');
        }
        try {
            $('#' + fromGroup.view + ' option,#' + toGroup.view + ' option').removeAttr('selected');
        }
        catch (ex) {
            //swallow the error for IE6
        }
        Filter(toGroup);
        if (settings[fromGroup.index].useCounters) { UpdateLabel(fromGroup); }
    }

    function RemoveSelected(removeGroup, otherGroup) {
        $('#' + otherGroup.view + ' option.copiedOption').add('#' + otherGroup.storage + ' option.copiedOption').remove();
        try {
            $('#' + removeGroup.view + ' option:selected').appendTo('#' + otherGroup.view).removeAttr('selected');
        }
        catch (ex) {
            //swallow the error for IE6
        }
        $('#' + removeGroup.view + ' option').add('#' + removeGroup.storage + ' option').clone().addClass('copiedOption').appendTo('#' + otherGroup.view);
        Filter(otherGroup);
        if (settings[removeGroup.index].useCounters) { UpdateLabel(removeGroup); }
    }

    function RemoveAll(removeGroup, otherGroup) {
        $('#' + otherGroup.view + ' option.copiedOption').add('#' + otherGroup.storage + ' option.copiedOption').remove();
        try {
            $('#' + removeGroup.storage + ' option').clone().addClass('copiedOption').add('#' + removeGroup.view + ' option').appendTo('#' + otherGroup.view).removeAttr('selected');
        }
        catch (ex) {
            //swallow the error for IE6
        }
        Filter(otherGroup);
        if (settings[removeGroup.index].useCounters) { UpdateLabel(removeGroup); }
    }

    function ClearFilter(group) {
        $('#' + group.filter).val('');
        $('#' + group.storage + ' option').appendTo('#' + group.view);
        try {
            $('#' + group.view + ' option').removeAttr('selected');
        }
        catch (ex) {
            //swallow the error for IE6
        }
        if (settings[group.index].useSorting) { SortOptions(group); }
        if (settings[group.index].useCounters) { UpdateLabel(group); }
    }

    function IsMoveMode(currSettings) {
        return currSettings.transferMode == 'move';
    }
	
	document.getElementById('box2View').options="selected";
})(jQuery);