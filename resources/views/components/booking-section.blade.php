<section class="doctor-booking-section inline-booking-section">
    <div class="container">
        <div id="inlineBookingModal" class="inline-booking-shell">
            <div class="inline-booking-card">

                <!-- SIDE -->
                <div class="inline-booking-side">
                    <div class="inline-booking-side-inner">
                        <div class="inline-booking-top-head">
                            <h2>{{ __('front_end.booking_with_doctor') }}</h2>
                            <p>{{ __('front_end.doctor_specialty') }}</p>
                        </div>

                        <div class="inline-booking-profile-wrap">
                            <div class="inline-booking-image makeup-img hover-img">
                                <img src="{{ asset('front_end_style/assets/img/home1/dranas-booking.jpg') }}"
                                    alt="Doctor">
                            </div>

                            <div class="inline-booking-info">
                                <p class="doctor-booking-note">
                                    {{ __('front_end.booking_note') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MAIN -->
                <div class="inline-booking-main">
                    <div class="inline-booking-header">
                        <h2 class="inline-booking-title">{{ __('front_end.booking_select_date_time') }}</h2>
                    </div>

                    <div class="inline-booking-body">

                        <!-- STEP 1 -->
                        <div id="inlineStepDateTime" class="inline-booking-step">
                            <div id="inlineBookingContentLayout" class="inline-booking-content-layout">

                                <!-- CALENDAR -->
                                <div class="inline-calendar-panel" id="inlineCalendarPanel">
                                    <div class="booking-month-nav">
                                        <button type="button" class="month-arrow month-arrow-left"
                                            id="inlineCalPrevMonth">
                                            <span>&#8249;</span>
                                        </button>

                                        <div class="month-label" id="inlineCalMonthLabel"></div>

                                        <button type="button" class="month-arrow month-arrow-right"
                                            id="inlineCalNextMonth">
                                            <span>&#8250;</span>
                                        </button>
                                    </div>

                                    <div class="booking-calendar" id="inlineCalendlyCalendar"></div>

                                    <div class="inline-timezone-row">
                                        <div class="booking-timezone">
                                            <span class="booking-globe">🌐</span>
                                            <span>
                                                {{ __('front_end.booking_jordan_time') }}
                                                (<span id="inlineJordanTime"></span>)
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- TIMES -->
                                <div class="inline-times-panel" id="inlineTimesPanel">
                                    <div class="inline-times-panel-head">
                                        <div class="selected-date-heading" id="inlineSelectedDateTitleDesktop">
                                            {{ __('front_end.booking_select_date') }}
                                        </div>
                                    </div>

                                    <div class="inline-times-scroll" id="inlineTimesScroll">
                                        <div id="inlineTimeSlotsContainerDesktop" class="time-slots-list"></div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- STEP 2 -->
                        <div id="inlineStepSelectTime" class="inline-booking-step" style="display:none;">
                            <div class="booking-back-btn" id="inlineBackToCalendar">
                                ← {{ __('front_end.booking_back') }}
                            </div>

                            {{-- <h3 class="inline-step-title">{{ __('front_end.booking_select_date_time') }}</h3> --}}

                            <div class="selected-date-heading" id="inlineSelectedDateTitle">
                                {{ __('front_end.booking_select_date') }}
                            </div>

                            <div id="inlineTimeSlotsContainer" class="time-slots-list"></div>
                        </div>

                        <!-- STEP 3 -->
                        <div id="inlineStepEnterDetails" class="inline-booking-step" style="display:none;">
                            <div class="booking-back-btn" id="inlineBackToDateTime">
                                ← {{ __('front_end.booking_back') }}
                            </div>

                            {{-- <h3 class="inline-step-title">{{ __('front_end.booking_enter_details') }}</h3> --}}

                            <div class="booking-summary">
                                <div class="summary-datetime" id="inlineSummaryDateTime"></div>
                            </div>

                            <form id="inlineBookingDetailsForm" class="booking-details-form">
                                <div class="form-row-grid">
                                    <div class="form-group">
                                        <label>{{ __('front_end.full_name') }}</label>
                                        <input type="text" name="full_name" class="form-control" id="inlineFullName"
                                            placeholder="{{ __('front_end.enter_full_name') }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label>{{ __('front_end.email') }}</label>
                                        <input type="email" name="email" class="form-control" id="inlineEmail"
                                            placeholder="{{ __('front_end.enter_email') }}" required>
                                    </div>
                                </div>

                                <div class="form-row-grid">
                                    <div class="form-group">
                                        <label>{{ __('front_end.phone') }}</label>
                                        <input type="tel" name="phone" class="form-control" id="inlinePhone"
                                            placeholder="{{ __('front_end.booking_phone_placeholder') }}">
                                    </div>

                                    <div class="form-group">
                                        <label>{{ __('front_end.appointment_type') }}</label>
                                        <select name="appointment_type_id" class="form-control"
                                            id="inlineAppointmentType" required>
                                            @foreach ($appointmentTypes as $type)
                                                <option value="{{ $type->id }}">
                                                    {{ app()->getLocale() == 'ar' ? $type->name_ar : $type->name_en }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>{{ __('front_end.location') }}</label>
                                    <div class="location-display">
                                        📍 {{ __('front_end.booking_location_address') }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>{{ __('front_end.notes') }}</label>
                                    <textarea name="notes" class="form-control" id="inlineNotes" rows="3"
                                        placeholder="{{ __('front_end.enter_notes') }}"></textarea>
                                </div>

                                <button type="submit" class="btn-schedule-event">
                                    {{ __('front_end.confirm_booking') }}
                                </button>

                                <div id="inlineFormError" class="form-error" style="display:none;"></div>
                                <div id="inlineFormSuccess" class="form-success" style="display:none;"></div>
                            </form>
                        </div>

                        <!-- SUCCESS -->
                        <div id="inlineStepSuccess" class="inline-booking-step" style="display:none;">
                            <div class="success-container inline-success-container">
                                <div class="success-icon">
                                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none">
                                        <circle cx="40" cy="40" r="38" fill="#d4ebec" stroke="#125258"
                                            stroke-width="2" />
                                        <path d="M25 40L35 50L55 30" stroke="#125258" stroke-width="4"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>

                                <h2 class="success-title">{{ __('front_end.booking_success') }}</h2>
                                <p class="success-message">{{ __('front_end.booking_success_message') }}</p>

                                <div class="success-details">
                                    <div class="success-detail-row">
                                        <span class="detail-label">{{ __('front_end.booking_ref') }}</span>
                                        <span class="detail-value" id="inlineSuccessBookingRef">-</span>
                                    </div>

                                    <div class="success-detail-row">
                                        <span class="detail-label">{{ __('front_end.booking_datetime') }}</span>
                                        <span class="detail-value" id="inlineSuccessDateTime">-</span>
                                    </div>

                                    <div class="success-detail-row">
                                        <span class="detail-label">{{ __('front_end.booking_name') }}</span>
                                        <span class="detail-value" id="inlineSuccessName">-</span>
                                    </div>

                                    <div class="success-detail-row">
                                        <span class="detail-label">{{ __('front_end.booking_email') }}</span>
                                        <span class="detail-value" id="inlineSuccessEmail">-</span>
                                    </div>

                                    <div class="success-detail-row">
                                        <span class="detail-label">{{ __('front_end.booking_phone') }}</span>
                                        <span class="detail-value" id="inlineSuccessPhone">-</span>
                                    </div>

                                    <div class="success-detail-row">
                                        <span class="detail-label">{{ __('front_end.booking_type') }}</span>
                                        <span class="detail-value" id="inlineSuccessAppointmentType">-</span>
                                    </div>

                                    <div class="success-detail-row">
                                        <span class="detail-label">{{ __('front_end.booking_location') }}</span>
                                        <span
                                            class="detail-value">{{ __('front_end.booking_location_address') }}</span>
                                    </div>
                                </div>

                                <button type="button" class="btn-close-success" id="inlineCloseSuccess">
                                    {{ __('front_end.done') }}
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const bookingModal = document.getElementById('inlineBookingModal');
        if (!bookingModal) return;

        const bookingModalCard = bookingModal.querySelector('.inline-booking-card');
        const closeSuccessBtn = document.getElementById('inlineCloseSuccess');

        const stepDateTime = document.getElementById('inlineStepDateTime');
        const stepSelectTime = document.getElementById('inlineStepSelectTime');
        const stepEnterDetails = document.getElementById('inlineStepEnterDetails');
        const stepSuccess = document.getElementById('inlineStepSuccess');

        const bookingContentLayout = document.getElementById('inlineBookingContentLayout');
        const calendarContainer = document.getElementById('inlineCalendlyCalendar');
        const monthLabel = document.getElementById('inlineCalMonthLabel');
        const prevMonthBtn = document.getElementById('inlineCalPrevMonth');
        const nextMonthBtn = document.getElementById('inlineCalNextMonth');

        const selectedDateTitle = document.getElementById('inlineSelectedDateTitle');
        const selectedDateTitleDesktop = document.getElementById('inlineSelectedDateTitleDesktop');
        const timeSlotsContainer = document.getElementById('inlineTimeSlotsContainer');
        const timeSlotsContainerDesktop = document.getElementById('inlineTimeSlotsContainerDesktop');
        const bookingDetailsForm = document.getElementById('inlineBookingDetailsForm');
        const backToDateTimeBtn = document.getElementById('inlineBackToDateTime');
        const backToCalendarBtn = document.getElementById('inlineBackToCalendar');

        const jordanTimeEl = document.getElementById('inlineJordanTime');
        const timesPanel = document.getElementById('inlineTimesPanel');
        const timesScroll = document.getElementById('inlineTimesScroll');

        let currentDate = new Date();
        currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);

        let selectedDate = null;
        let selectedTime = null;

        let apiData = {
            work_days: [],
            blocked_dates: [],
            time_slots: {}
        };

        const currentLocale = "{{ app()->getLocale() }}" === 'ar' ? 'ar-EG' : 'en-US';
        const atText = "{{ __('front_end.at') }}";

        function isMobileBooking() {
            return window.innerWidth <= 767;
        }

        function updateJordanTime() {
            if (!jordanTimeEl) return;

            try {
                const now = new Date();
                const jordanTime = new Intl.DateTimeFormat('en-GB', {
                    timeZone: 'Asia/Amman',
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                }).format(now);

                jordanTimeEl.textContent = jordanTime;
            } catch (e) {
                jordanTimeEl.textContent = '--:--';
            }
        }

        function syncTimesPanelHeight() {
            if (isMobileBooking()) return;
            if (!bookingContentLayout.classList.contains('show-times')) return;
            if (!timesPanel || !timesScroll) return;

            const fixedPanelHeight = 520;
            timesPanel.style.height = fixedPanelHeight + 'px';

            const head = timesPanel.querySelector('.inline-times-panel-head');
            const headHeight = head ? head.offsetHeight : 0;
            const panelStyle = window.getComputedStyle(timesPanel);
            const paddingTop = parseFloat(panelStyle.paddingTop) || 0;
            const paddingBottom = parseFloat(panelStyle.paddingBottom) || 0;

            const availableHeight = fixedPanelHeight - headHeight - paddingTop - paddingBottom;
            timesScroll.style.maxHeight = Math.max(140, availableHeight) + 'px';
        }

        function resetStepScroll() {
            if (stepDateTime) stepDateTime.scrollTop = 0;
            if (stepSelectTime) stepSelectTime.scrollTop = 0;
            if (stepEnterDetails) stepEnterDetails.scrollTop = 0;
            if (stepSuccess) stepSuccess.scrollTop = 0;
        }

        function showStep(stepName) {
            stepDateTime.style.display = 'none';
            stepSelectTime.style.display = 'none';
            stepEnterDetails.style.display = 'none';
            stepSuccess.style.display = 'none';

            if (stepName === 'date') stepDateTime.style.display = 'block';
            if (stepName === 'time') stepSelectTime.style.display = 'block';
            if (stepName === 'details') stepEnterDetails.style.display = 'block';
            if (stepName === 'success') stepSuccess.style.display = 'block';

            if (bookingModalCard && isMobileBooking()) {
                if (stepName === 'date') {
                    bookingModalCard.classList.remove('mobile-full-height');
                } else {
                    bookingModalCard.classList.add('mobile-full-height');
                }
            } else if (bookingModalCard) {
                bookingModalCard.classList.remove('mobile-full-height');
            }

            resetStepScroll();
        }

        async function fetchAvailability() {
            try {
                const response = await fetch('/api/availability', {
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) throw new Error('Failed to load availability');

                const result = await response.json();

                let workDays = [];
                if (Array.isArray(result.work_days)) {
                    workDays = result.work_days.map(dayObj => {
                        if (typeof dayObj.day === 'string') {
                            return ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday',
                                'Friday', 'Saturday'
                            ].indexOf(dayObj.day);
                        }
                        return dayObj.day;
                    }).filter(day => day !== -1);
                }

                let blockedDates = [];
                if (Array.isArray(result.blocked_dates)) {
                    blockedDates = result.blocked_dates.map(bd => typeof bd === 'string' ? bd : bd.date);
                }

                apiData = {
                    work_days: workDays,
                    blocked_dates: blockedDates,
                    time_slots: result.time_slots || {}
                };
            } catch (error) {
                console.warn('Availability fallback used:', error);
                apiData = {
                    work_days: [1, 2, 3, 4, 5],
                    blocked_dates: [],
                    time_slots: {}
                };
            }
        }

        function formatDateKey(date) {
            const y = date.getFullYear();
            const m = String(date.getMonth() + 1).padStart(2, '0');
            const d = String(date.getDate()).padStart(2, '0');
            return `${y}-${m}-${d}`;
        }

        function isPastDate(date) {
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            const compareDate = new Date(date);
            compareDate.setHours(0, 0, 0, 0);

            return compareDate < today;
        }

        function isBlockedDate(dateKey) {
            return apiData.blocked_dates.includes(dateKey);
        }

        function isWorkDay(date) {
            return apiData.work_days.includes(date.getDay());
        }

        function hasTimeSlots(dateKey) {
            return Array.isArray(apiData.time_slots[dateKey]) && apiData.time_slots[dateKey].length > 0;
        }

        function updateSelectedDateTitles(dayDate) {
            const formattedDate = dayDate.toLocaleDateString(currentLocale, {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            if (selectedDateTitle) selectedDateTitle.textContent = formattedDate;
            if (selectedDateTitleDesktop) selectedDateTitleDesktop.textContent = formattedDate;
        }

        function clearDesktopTimesVisibility() {
            if (bookingContentLayout) {
                bookingContentLayout.classList.remove('show-times');
            }
            if (timesPanel) {
                timesPanel.style.height = '';
            }
            if (timesScroll) {
                timesScroll.style.maxHeight = '';
                timesScroll.scrollTop = 0;
            }
        }

        function showDesktopTimesVisibility() {
            if (bookingContentLayout && !isMobileBooking()) {
                bookingContentLayout.classList.add('show-times');
                setTimeout(syncTimesPanelHeight, 60);
            }
        }

        function renderCalendar(date) {
            if (!calendarContainer || !monthLabel) return;

            calendarContainer.innerHTML = '';

            const monthNames = currentLocale === 'ar-EG' ?
                ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر',
                    'نوفمبر', 'ديسمبر'
                ] :
                ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ];

            const dayNames = currentLocale === 'ar-EG' ?
                ['الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'] :
                ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

            monthLabel.textContent = `${monthNames[date.getMonth()]} ${date.getFullYear()}`;

            dayNames.forEach(day => {
                const dayEl = document.createElement('div');
                dayEl.className = 'calendar-day-name';
                dayEl.textContent = day;
                calendarContainer.appendChild(dayEl);
            });

            const firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
            const lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);

            for (let i = 0; i < firstDay.getDay(); i++) {
                const empty = document.createElement('div');
                empty.className = 'calendar-empty';
                calendarContainer.appendChild(empty);
            }

            for (let day = 1; day <= lastDay.getDate(); day++) {
                const dayDate = new Date(date.getFullYear(), date.getMonth(), day);
                const dateKey = formatDateKey(dayDate);

                const dateEl = document.createElement('div');
                dateEl.className = 'calendar-date';
                dateEl.textContent = day;

                const available = !isPastDate(dayDate) &&
                    !isBlockedDate(dateKey) &&
                    isWorkDay(dayDate) &&
                    hasTimeSlots(dateKey);

                if (available) {
                    dateEl.classList.add('available');

                    if (selectedDate === dateKey) {
                        dateEl.classList.add('selected');
                    }

                    dateEl.addEventListener('click', function() {
                        calendarContainer.querySelectorAll('.calendar-date.selected').forEach(el => {
                            el.classList.remove('selected');
                        });

                        dateEl.classList.add('selected');
                        selectedDate = dateKey;
                        selectedTime = null;

                        updateSelectedDateTitles(dayDate);
                        renderTimeSlots(dateKey);

                        if (isMobileBooking()) {
                            showStep('time');
                        } else {
                            showDesktopTimesVisibility();
                            if (timesPanel) {
                                setTimeout(() => {
                                    syncTimesPanelHeight();
                                    timesPanel.scrollIntoView({
                                        behavior: 'smooth',
                                        block: 'nearest',
                                        inline: 'nearest'
                                    });
                                }, 120);
                            }
                        }

                        resetStepScroll();
                    });
                } else {
                    dateEl.classList.add('muted');
                }

                calendarContainer.appendChild(dateEl);
            }
        }

        function buildTimeSlotRow(slot, dateKey) {
            const row = document.createElement('div');
            row.className = 'time-slot-row';

            const timeBtn = document.createElement('button');
            timeBtn.type = 'button';
            timeBtn.className = 'time-slot-btn';
            timeBtn.textContent = `${slot.start_time.substring(0, 5)} - ${slot.end_time.substring(0, 5)}`;

            const nextBtn = document.createElement('button');
            nextBtn.type = 'button';
            nextBtn.className = 'time-next-btn';
            nextBtn.textContent = "{{ __('front_end.booking_next') }}";

            function clearSelections() {
                bookingModal.querySelectorAll('.time-slot-row').forEach(r => r.classList.remove('active'));
                bookingModal.querySelectorAll('.time-slot-btn').forEach(btn => btn.classList.remove(
                'selected'));
            }

            function selectThisTime() {
                clearSelections();
                row.classList.add('active');
                timeBtn.classList.add('selected');

                selectedTime = {
                    date: dateKey,
                    start_time: slot.start_time,
                    end_time: slot.end_time
                };
            }

            function goToDetailsStep() {
                if (!selectedTime) selectThisTime();

                const [year, month, day] = selectedTime.date.split('-').map(Number);
                const appointmentDate = new Date(year, month - 1, day);

                const dateStr = appointmentDate.toLocaleDateString(currentLocale, {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });

                const timeStr =
                    `${selectedTime.start_time.substring(0, 5)} - ${selectedTime.end_time.substring(0, 5)}`;
                const summaryDateTime = document.getElementById('inlineSummaryDateTime');

                if (summaryDateTime) {
                    summaryDateTime.textContent = `${dateStr} ${atText} ${timeStr}`;
                }

                showStep('details');
            }

            timeBtn.addEventListener('click', selectThisTime);

            nextBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                selectThisTime();
                goToDetailsStep();
            });

            row.appendChild(timeBtn);
            row.appendChild(nextBtn);

            return row;
        }

        function renderTimeSlots(dateKey) {
            if (timeSlotsContainer) timeSlotsContainer.innerHTML = '';
            if (timeSlotsContainerDesktop) timeSlotsContainerDesktop.innerHTML = '';

            selectedTime = null;

            const slots = apiData.time_slots[dateKey] || [];

            if (!slots.length) {
                const emptyHtml = `<div class="no-times-msg">No time slots available.</div>`;
                if (timeSlotsContainer) timeSlotsContainer.innerHTML = emptyHtml;
                if (timeSlotsContainerDesktop) timeSlotsContainerDesktop.innerHTML = emptyHtml;
                return;
            }

            slots.forEach((slot) => {
                if (timeSlotsContainer) {
                    timeSlotsContainer.appendChild(buildTimeSlotRow(slot, dateKey));
                }

                if (timeSlotsContainerDesktop) {
                    timeSlotsContainerDesktop.appendChild(buildTimeSlotRow(slot, dateKey));
                }
            });

            setTimeout(syncTimesPanelHeight, 60);
        }

        function resetBookingModal() {
            selectedDate = null;
            selectedTime = null;

            if (selectedDateTitle) selectedDateTitle.textContent = `{{ __('front_end.booking_select_date') }}`;
            if (selectedDateTitleDesktop) selectedDateTitleDesktop.textContent =
                `{{ __('front_end.booking_select_date') }}`;

            if (timeSlotsContainer) timeSlotsContainer.innerHTML = '';
            if (timeSlotsContainerDesktop) timeSlotsContainerDesktop.innerHTML = '';

            clearDesktopTimesVisibility();

            const formError = document.getElementById('inlineFormError');
            const formSuccess = document.getElementById('inlineFormSuccess');
            const appointmentTypeSelect = document.getElementById('inlineAppointmentType');
            const summaryDateTime = document.getElementById('inlineSummaryDateTime');

            if (formError) {
                formError.style.display = 'none';
                formError.textContent = '';
            }

            if (formSuccess) {
                formSuccess.style.display = 'none';
                formSuccess.textContent = '';
            }

            if (summaryDateTime) summaryDateTime.textContent = '';

            if (bookingDetailsForm) bookingDetailsForm.reset();
            if (appointmentTypeSelect) appointmentTypeSelect.selectedIndex = 0;

            renderCalendar(currentDate);
            showStep('date');
        }

        updateJordanTime();
        setInterval(updateJordanTime, 30000);

        if (closeSuccessBtn) {
            closeSuccessBtn.addEventListener('click', function() {
                resetBookingModal();
            });
        }

        if (prevMonthBtn) {
            prevMonthBtn.addEventListener('click', function() {
                currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() - 1, 1);
                renderCalendar(currentDate);

                if (selectedDate && !isMobileBooking()) {
                    showDesktopTimesVisibility();
                    setTimeout(syncTimesPanelHeight, 60);
                }

                resetStepScroll();
            });
        }

        if (nextMonthBtn) {
            nextMonthBtn.addEventListener('click', function() {
                currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 1);
                renderCalendar(currentDate);

                if (selectedDate && !isMobileBooking()) {
                    showDesktopTimesVisibility();
                    setTimeout(syncTimesPanelHeight, 60);
                }

                resetStepScroll();
            });
        }

        if (backToCalendarBtn) {
            backToCalendarBtn.addEventListener('click', function() {
                showStep('date');
            });
        }

        if (backToDateTimeBtn) {
            backToDateTimeBtn.addEventListener('click', function() {
                if (isMobileBooking()) {
                    showStep('time');
                } else {
                    showStep('date');
                    if (selectedDate) {
                        showDesktopTimesVisibility();
                        setTimeout(syncTimesPanelHeight, 60);
                    }
                }
            });
        }

        window.addEventListener('resize', function() {
            if (isMobileBooking()) {
                clearDesktopTimesVisibility();
            } else {
                if (selectedDate) {
                    showDesktopTimesVisibility();
                    renderTimeSlots(selectedDate);
                    setTimeout(syncTimesPanelHeight, 60);
                }
            }
        });

        if (bookingDetailsForm) {
            bookingDetailsForm.addEventListener('submit', async function(e) {
                e.preventDefault();

                if (!selectedTime) {
                    alert('Please select a date and time first.');
                    return;
                }

                const formError = document.getElementById('inlineFormError');
                const formSuccess = document.getElementById('inlineFormSuccess');
                const submitBtn = bookingDetailsForm.querySelector('button[type="submit"]');

                if (formError) {
                    formError.style.display = 'none';
                    formError.textContent = '';
                }

                if (formSuccess) {
                    formSuccess.style.display = 'none';
                    formSuccess.textContent = '';
                }

                submitBtn.disabled = true;
                submitBtn.textContent = 'Scheduling...';

                const fullName = document.getElementById('inlineFullName').value.trim();
                const nameParts = fullName.split(' ');
                const firstName = nameParts[0] || '';
                const lastName = nameParts.slice(1).join(' ') || '';

                const appointmentTypeSelect = document.getElementById('inlineAppointmentType');
                const appointmentTypeId = appointmentTypeSelect ? appointmentTypeSelect.value :
                null;

                if (!appointmentTypeId) {
                    if (formError) {
                        formError.textContent = 'Please select an appointment type.';
                        formError.style.display = 'block';
                    }
                    submitBtn.disabled = false;
                    submitBtn.textContent = '{{ __('front_end.booking_schedule_button') }}';
                    return;
                }

                const formData = {
                    first_name: firstName,
                    last_name: lastName,
                    email: document.getElementById('inlineEmail').value,
                    phone: document.getElementById('inlinePhone').value,
                    appointment_date: selectedTime.date,
                    start_time: selectedTime.start_time,
                    end_time: selectedTime.end_time,
                    appointment_type_id: appointmentTypeId,
                    notes: document.getElementById('inlineNotes').value
                };

                try {
                    const response = await fetch('/api/appointments', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]')?.getAttribute('content') ||
                                ''
                        },
                        body: JSON.stringify(formData)
                    });

                    const result = await response.json();

                    if (!response.ok) {
                        let message = 'Something went wrong. Please try again.';

                        if (result.message) {
                            message = result.message;
                        } else if (result.errors) {
                            const firstKey = Object.keys(result.errors)[0];
                            if (firstKey && Array.isArray(result.errors[firstKey])) {
                                message = result.errors[firstKey][0];
                            }
                        }

                        if (formError) {
                            formError.textContent = message;
                            formError.style.display = 'block';
                        }
                        return;
                    }

                    document.getElementById('inlineSuccessBookingRef').textContent = result
                        .booking_reference || 'N/A';

                    const [year, month, day] = formData.appointment_date.split('-').map(Number);
                    const appointmentDate = new Date(year, month - 1, day);

                    const dateStr = appointmentDate.toLocaleDateString(currentLocale, {
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });

                    const timeStr =
                        `${formData.start_time.substring(0, 5)} - ${formData.end_time.substring(0, 5)}`;

                    document.getElementById('inlineSuccessDateTime').textContent =
                        `${dateStr} ${atText} ${timeStr}`;
                    document.getElementById('inlineSuccessName').textContent = fullName;
                    document.getElementById('inlineSuccessEmail').textContent = formData.email;
                    document.getElementById('inlineSuccessPhone').textContent = formData.phone;

                    const appointmentTypeName = appointmentTypeSelect.options[appointmentTypeSelect
                        .selectedIndex].text;
                    document.getElementById('inlineSuccessAppointmentType').textContent =
                        appointmentTypeName;

                    await fetchAvailability();

                    if (apiData.time_slots[selectedTime.date]) {
                        apiData.time_slots[selectedTime.date] = apiData.time_slots[selectedTime
                            .date].filter(slot =>
                            !(slot.start_time === selectedTime.start_time && slot.end_time ===
                                selectedTime.end_time)
                        );

                        if (apiData.time_slots[selectedTime.date].length === 0) {
                            delete apiData.time_slots[selectedTime.date];
                        }
                    }

                    bookingDetailsForm.reset();
                    if (appointmentTypeSelect) appointmentTypeSelect.selectedIndex = 0;

                    showStep('success');
                } catch (error) {
                    console.error(error);
                    if (formError) {
                        formError.textContent = 'An unexpected error occurred. Please try again.';
                        formError.style.display = 'block';
                    }
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.textContent = '{{ __('front_end.booking_schedule_button') }}';
                }
            });
        }

        fetchAvailability().then(() => {
            resetBookingModal();
        });
    });
</script>
