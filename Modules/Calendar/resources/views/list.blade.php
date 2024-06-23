@extends('base::layouts.master')
@section('title','تقویم')
@push('style')
    <link href='{{ asset('assets/original/css/fullcalendar/main.css') }}' rel='stylesheet'/>
@endpush
@section('content')
    <div class="row row-sm">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class=" custom-card transcation-crypto">
                <div class=" bg-white p-3">
                    <div class="mb-2 card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div id='calendar'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@push('script')
    <script src='{{ asset('assets/original/js/fullcalendar/main.min.js') }}'></script>
    <script src='{{ asset('assets/original/js/fullcalendar/locales-all.min.js') }}'></script>

    <script>
        var teachers = "{{ $calendars }}";
        let aa = JSON.parse(teachers.replace(/&quot;/g, '"'));
        var events = [];
        Object.keys(aa).map(k => {
            var row = aa[k]
            events.push({
                id: row.id,
                title: row.event,
                start: row.date,
                color: row.color
            });
        });
        document.addEventListener('DOMContentLoaded', function () {
            var initialLocaleCode = 'fa';
            var localeSelectorEl = document.getElementById('locale-selector');
            var calendarEl = document.getElementById('calendar');


            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    right: 'dayGridMonth,dayGridWeek,list',
                    center: 'title',
                },

                selectable: true,
                events: events,
                eventClick: function (event) {
                    Swal.fire({
                        title: event.event._def.title,
                        icon: 'info',
                        showCancelButton: false,
                        confirmButtonText: 'خب',

                    }).then((result) => {
                        if (result.isConfirmed) {
                            let url = "{{ route('calendar.destroy') }}"
                            $.ajax({
                                url: url,
                                type: "DELETE",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "id": event.event._def.publicId
                                },
                                success: function () {
                                    location.reload()
                                },
                                error: function (xhr, ajaxOptions, thrownError) {

                                }
                            });
                        }
                    })
                },

                select: function (start, end, allDay) {
                    saveMyData({
                        'start': start,
                        'end': end
                    });
                },
                initialDate: new Date(),
                locale: initialLocaleCode,
                buttonIcons: false, // show the prev/next text
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                editable: true

            });
            calendar.render();
        });

        function saveMyData(event) {
            Swal.fire({
                title: 'رویداد را وارد نمایید',
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'ثبت',
                cancelButtonText: 'لغو',
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = "{{ route('calendar.store') }}"
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "start_date": event.start.startStr,
                            "desc": result.value
                        },
                        success: function () {
                            location.reload()
                        },
                        error: function (xhr, ajaxOptions, thrownError) {

                        }
                    });
                }
            })
        }
    </script>
@endpush
