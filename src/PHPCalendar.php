<?php

namespace AnySlehider\PHPCalendar;

class PHPCalendar{

        protected $config;

        public function __construct(){
            
        }

        public function setConfig($config){
            $this->config = $config;
        }

        public function initCalendar($HtmlId="PHPCalendar"){
            ?>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" integrity="sha256-5veQuRbWaECuYxwap/IOE/DAwNxgm4ikX7nrgsqYp88=" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/locales-all.min.js" integrity="sha256-GcByKJnun2NoPMzoBsuCb4O2MKiqJZLlHTw3PJeqSkI=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js" integrity="sha256-XCdgoNaBjzkUaEJiauEq+85q/xi/2D4NcB3ZHwAapoM=" crossorigin="anonymous"></script>
            <script>
                 document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('<?=$HtmlId?>');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth'
                    });
                    calendar.render();
                });
            </script>
            <?php
        }
}