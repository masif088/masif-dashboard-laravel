@php use Carbon\Carbon; @endphp
@props(['events'=>[]])
<div>
    <div class="card" style="height: 450px">
        <div class="card-body" style="padding: 10px">
            <div class="default-datepicker" style="margin: 0">
                <div id="calendar" data-language="en"></div>
            </div>
            <div class="activity-timeline" style="padding: 10px; overflow-y: scroll; height: 100px" id="events">
                @foreach($events as $event)
                    @if(Carbon::parse($event['date'])->isNextDay())
                        @break
                    @endif
                    @if(Carbon::parse($event['date'])->isToday())
                        <div class="text-primary font-bold dark:text-primary-lighter"><i class="fa fa-fire"></i> {{$event['title']}}</div>
                    @endif

                @endforeach
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    var events = [
                        @foreach($events as $event)
                        {
                            Title: "{{$event['title']}}",
                            Date: new Date("{{ Carbon::parse($event['date'])->format('m/d/Y') }}")
                        },
                        @endforeach
                    ];
                    $("#calendar").datepicker({
                        setDate: new Date('2008,9,03'),
                        onSelect: function (dateText) {
                            $("#events").empty();
                            var date,
                                selectedDate = new Date(dateText),
                                i = 0,
                                event = '';
                            var some = [];
                            while (i < events.length) {
                                date = events[i].Date;
                                if (selectedDate.valueOf() === date.valueOf()) {
                                    event = events[i];
                                    some.push(events[i])
                                }
                                i++;
                            }
                            if (event) {
                                some.forEach(myFunction);

                                function myFunction(item, index) {
                                    $("#events").prepend(
                                        "<div class='text-primary font-bold dark:text-primary-lighter'><i class='fa fa-fire'></i> "+item.Title+"</div>"
                                    );
                                }
                            }
                        },
                        beforeShowDay: function (date) {
                            var result = [true, '', null];
                            var matching = $.grep(events, function (event) {
                                return event.Date.valueOf() === date.valueOf();
                            });
                            if (matching.length) {
                                result = [true, 'highlight-event', null];
                            }
                            return result;
                        },
                    })
                });
            </script>
        </div>
    </div>
</div>
