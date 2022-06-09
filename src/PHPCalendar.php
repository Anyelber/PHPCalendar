<?php

namespace AnySlehider\PHPCalendar;

use AnySlehider\PHPCalendar\PHPCalendarDB;

class PHPCalendar{

        protected $config;
        protected $connection;

        public function __construct(){

        }

        public function initModal(){
            $this->modal();
        }

        public function setConfig($config){
            $this->config = $config;
            $this->connection = new PHPCalendarDB($this->config['sql'], $this->config['db_host'], $this->config['db_user'], $this->config['db_password'], $this->config['db_name']);
            $this->initModal();
        }

        public function initCalendar($HtmlId="PHPCalendar"){
            ?>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" integrity="sha256-5veQuRbWaECuYxwap/IOE/DAwNxgm4ikX7nrgsqYp88=" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js" integrity="sha256-XCdgoNaBjzkUaEJiauEq+85q/xi/2D4NcB3ZHwAapoM=" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/locales-all.min.js" integrity="sha256-GcByKJnun2NoPMzoBsuCb4O2MKiqJZLlHTw3PJeqSkI=" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>

                let eventList = JSON.parse('<?=$this->listItems()?>');
                document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('<?=$HtmlId?>');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        eventClick: function(i1,i2,i3){
                            console.log(i1);
                            console.log(i2);
                            console.log(i3);
                        },
                        select: function(start, end){
                            console.log(start);
                            console.log(end);
                        },
                        dateClick: function(info) {
                            $("input[name='event_date_anycal']").val(info.dateStr);
                            $("#createEventModal").modal('show');
                        },
                        eventClick: function(info){
                            $("#viewEventModal").modal('show');
                            $("#eventName").html(info.event.title);
                            $("#eventDate").html(info.event.start);
                            $("#eventHref").attr("href", "<?=$this->config['delete_route']?>?deleteAnyCalEvent="+info.event.id);
                            console.log(info.event.title);
                        },


                        events : eventList
                        
                    });
                    calendar.render();
                });
            </script>
            <?php
        }

        public function modal(){

            ?>
            <form method="post" action="<?=$this->config['form_action_url']?>">
                <div class="modal fade" id="createEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Event</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Event Name</label>
                                <input type="text" class="form-control" placeholder="Event Name" name="event_name_anycal"/>
                            </div>
                            <div class="form-group">
                                <label>Event Date</label>
                                <input type="date" class="form-control" name="event_date_anycal"/>
                            </div>
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="save_event_anycal" class="btn btn-primary">Submit</button>
                        </div>
                        </div>
                    </div>
                </div>
            </form>


            <div class="modal fade" id="viewEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Event Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label><b>Event Name</b></label><br>
                            <span id="eventName"></span>
                        </div>
                        <div class="form-group">
                            <label><b>Event Date</b></label><br>
                            <span id="eventDate"></span>
                        </div>
                        <br>
                        <a id="eventHref" class="btn btn-danger">Delete Event</a>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>
                 
            <?php

        }

        public function saveEvent($name, $date){
            $pdo = $this->connection->pdo();

            $q = $pdo->prepare("INSERT INTO events_anycal (event_name, event_date) VALUES (:event_name, :event_date)");
            $q->execute([
                ":event_name"=>$name,
                ":event_date"=>$date
            ]);
            $this->alert("Event saved successfully", $this->config['return_url'], 1);
        }

        public function deleteEvent($eventId){
            $pdo = $this->connection->pdo();

            $q = $pdo->prepare("DELETE FROM events_anycal WHERE id = :id");
            $q->execute([
                ":id"=>$eventId
            ]);
            $this->alert("Event deleted successfully", $this->config['return_url'], 1);
        }

        public function listItems(){
            $pdo = $this->connection->pdo();

            $q = $pdo->prepare("SELECT * FROM events_anycal");
            $q->execute();

            $eventList = [];

            while($r = $q->fetch()){
                $eventList[] = [
                    "id"=>$r["id"],
                    "title"=>$r["event_name"],
                    "start"=>$r["event_date"]
                ];
            }


            return json_encode($eventList);
        }

        public function alert($msj,$url,$type){
            if($type == 0){
                $type = 'error';
            }elseif($type == 1){
                $type = 'success';
            }else{
                $type = 'warning';
            }
            ?>
                <script>
                    Swal.fire(
                        '',
                        '<?=$msj?>',
                        '<?=$type?>'
                    ).then(function loaded(){
                        window.location.href = '<?=$url?>';
                    });
                </script>
            <?php
        }
}