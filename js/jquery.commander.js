(function($){
    "use strict";

    var $input,$control, INPUT, COMMAND, OPTIONS, PATH, VERSION;

    VERSION = "1.1";

    $.commander = function(el, options){
        // To avoid scope issues, use 'base' instead of 'this'
        // to reference this class from internal events and functions.
        var base = this;
        
        // Access to jQuery and DOM versions of element
        base.$el = $(el);
        base.el = el;
        
        // Add a reverse reference to the DOM object
        base.$el.data("commander", base);
        
        base.init = function(){
            base.options = $.extend({},$.commander.defaultOptions, options);
            
            INPUT = "";
            COMMAND = "";
            OPTIONS = "";
            PATH = base.options.path+"&gt;";

            base.$el.append('<div id="c-shadow" />');
            base.$el.find('#c-shadow').append('<div id="c-prompt" />');

            $control = base.$el.find('#c-prompt');

            // Heading and Controlls
            $control.append('<div id="c-heading"><img src="'+base.options.windowIcon+'" /><span id="c-title">'+base.options.windowTitle+'</span></div>');
            $control.find('#c-heading').append('<div id="c-mini"><img src="'+base.options.mini+'" /></div>');
            $control.find('#c-heading').append('<div id="c-full"><img src="'+base.options.full+'" /></div>');
            $control.find('#c-heading').append('<div id="c-close"><img src="'+base.options.close+'" /></div>');

            // Input lines
            $control.append('<div id="c-window" />');
            $control.find('#c-window').append('<p>'+base.options.path+'> <br />'+
                base.options.website +' jQuery Commander Version ' + VERSION + '<br />'+
                'Copyright (C) ' + (new Date).getFullYear() + '. All rights reserved.' +
                '</p>');

            // Build the Time stamp
            var d = new Date();
            var month = d.getMonth()+1;
            var day = d.getDate();
            var currentHours = d.getHours();
            var currentMinutes = d.getMinutes();
            var currentSeconds = d.getMinutes();

            var currentDate = ((''+month).length<2 ? '0' : '') + month + '/' +
                ((''+day).length<2 ? '0' : '') + day + '/' +
                d.getFullYear();

            // Convert the hours component to 12-hour format if needed
            currentHours = ( currentHours > 12 ) ? currentHours - 12 : currentHours;
            // Convert an hours component of "0" to "12"
            currentHours = ( currentHours == 0 ) ? 12 : currentHours;
            
            currentMinutes = ( currentMinutes < 10 ? "0" : "" ) + currentMinutes;
            currentSeconds = ( currentSeconds < 10 ? "0" : "" ) + currentSeconds;
            
            var currentTime = currentHours + ':'+currentMinutes+':'+currentSeconds;

            $control.find('#c-window').append('<p>Build Started on: '+currentDate+ ' '+ currentTime +'</p>')

            // Attach the input
            $control.append('<div id="c-cmdLine" class="clearfix" />');
            $control.find('#c-cmdLine').append('<span id="c-path">' + PATH + '</span>' + '<input type="text" name="command" />');
        };
        
        base.incomingCommand = function(cmd){
            var result = "";

            if(cmd.indexOf(' ') >= 0) {
                cmd = cmd.toString().split(" ");

                result = base.examine(cmd[0]);

                console.log(cmd.length);

                if(cmd.length == 0) {
                    base.sendAjax(result);
                } else if (cmd.length == 1) {
                    base.sendAjax(result,cmd[1]);
                } else if (cmd.length == 2) {
                    base.sendAjax(result,cmd[1],cmd[2]);
                } else {
                    console.log('something went wrong');
                }
            } else {
                result = base.examine(cmd);
            }

            if(result) {
                base.addCommand(INPUT);
            }
        };

        base.examine = function(check) {
            COMMAND = "";

            if(check.indexOf('-') >= 0) {
                // Its a command
                COMMAND = check;
            } else {
                if(check.indexOf('help') >= 0) {
                    COMMAND = check;
                } else if (check.indexOf('project') >= 0) {
                    COMMAND = check;
                } else if (check.indexOf('resume') >= 0) {
                    COMMAND = check;
                } else if (check == "clear" || check == "cls") {
                    base.cls();
                }
            }

            return COMMAND;
        };

        base.cls = function () {
            var space = "";
            for(var i = 0; i < 25; i++) {
                space = space + "<br />";
            }

            base.$el.find('#c-window').append(space);
            base.$el.find("#c-window").scrollTop($("#c-window")[0].scrollHeight);
        };

        base.addCommand = function() {
            base.$el.find('#c-window').append(PATH + " " + INPUT);
            $input.val('');
        };

        base.sendAjax = function(cmd,opt,proj) {
            console.log(cmd);
            console.log(opt);
            console.log(proj);
        };
        
        // Run initializer
        base.init();
    };
    
    $.commander.defaultOptions = {
        path: "S:\\",
        windowTitle: "Commander",
        website: "localhost",
        windowIcon: "images/prompt.png",
        mini: "images/underscore.png",
        full: "images/boxes.png",
        close: "images/cross.png"
    };
    
    $.fn.commander = function(options){
        return this.each(function(){
            var cm = new $.commander(this, options);
            $input = cm.$el.find('input[name="command"]');

            $(window).load(function () {
                $input.focus();
            });

            $input.keypress(function(e) {
                if(e.which == 13) {
                    INPUT = $input.val();
                    cm.incomingCommand(INPUT);
                }
            });

            $('#c-mini').click(function () {
                if($('#c-window').is(':visible')) {
                    $('#c-window').slideUp();
                    $('#c-cmdLine').hide();
                }
            });

            $('#c-full').click(function () {
                if(!$('#c-window').is(':visible')) {
                    $('#c-window').slideDown();
                    $('#c-cmdLine').show();
                }
            });

            $('#c-close').click(function () {
                cm.$el.slideUp();
                $('.work').css('box-shadow','none');
            });
        });
    };
    
})(jQuery);