jQuery(document).ready(function ($) {
    try {
        var SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        var recognition = new SpeechRecognition();
    } catch (e) {
        $('.speak-now').hide();

    }


    var noteTextarea = $('#note-textarea');
    var instructions = $('#recording-instructions');
    var noteContent = '';

    recognition.continuous = true;
    recognition.onresult = function (event) {

        var current = event.resultIndex;
        var transcript = event.results[current][0].transcript;
        var mobileRepeatBug = (current == 1 && transcript == event.results[0][0].transcript);
        if (!mobileRepeatBug) {
            noteContent += transcript;
            noteTextarea.val(noteContent);
        }
    };

    recognition.onstart = function () {
        instructions.text('Voice recognition activated. Try speaking into the microphone.');
    };

    recognition.onspeechend = function () {
        instructions.text('You were quiet for a while so voice recognition turned itself off.');
    };

    recognition.onerror = function (event) {
        if (event.error == 'no-speech') {
            instructions.text('No speech was detected. Try again.');
        }

    };

    $('.speak-now').attr('data-click-state', 1);
    $('.speak-now').on('click', function () {
        if ($(this).attr('data-click-state') == 1) {
            if (noteContent.length) {
                noteContent += ' ';
            }
            recognition.start();
            $(this).attr('data-click-state', 0);
            $(this).addClass('active');
        } else {
            recognition.stop();
            $(this).attr('data-click-state', 1);
            $(this).removeClass('active');
        }
    });

    noteTextarea.on('input', function () {
        noteContent = $(this).val();
    });

});