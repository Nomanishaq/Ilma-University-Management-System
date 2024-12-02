<!-- Sidemenu -->
<div class="navbar-content scroll-div ps ps--active-y">
    <ul class="nav pcoded-inner-navbar">

        <li class="nav-item {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-home"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_dashboard', 1) }}</span>
            </a>
        </li>

        @canany(['application-create', 'application-view', 'student-create', 'student-view', 'student-password-print', 'student-password-change', 'student-card', 'student-transfer-in-create', 'student-transfer-in-view', 'student-transfer-out-create', 'student-transfer-out-view', 'status-type-create', 'status-type-view', 'id-card-setting-view'])
        <li class="nav-item pcoded-hasmenu {{ Request::is('admin/admission*') ? 'pcoded-trigger active' : '' }}">
            <a href="#!" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-university"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_admission', 2) }}</span>
            </a>
            <ul class="pcoded-submenu">
                @canany(['student-create'])
                <li class="{{ Request::is('admin/admission/student/create') ? 'active' : '' }}"><a href="{{ route('admin.student.create') }}" class="">{{ trans_choice('module_registration', 1) }}</a></li>
                @endcanany

                @canany(['student-view', 'student-password-print', 'student-password-change', 'student-card'])
                <li class="{{ Request::is('admin/admission/student') ? 'active' : '' }}"><a href="{{ route('admin.student.index') }}" class="">{{ trans_choice('module_student', 1) }} {{ __('list') }}</a></li>
                @endcanany


                @canany(['status-type-create', 'status-type-view'])
                <li class="{{ Request::is('admin/admission/status-type*') ? 'active' : '' }}"><a href="{{ route('admin.status-type.index') }}" class="">{{ trans_choice('module_status_type', 2) }}</a></li>
                @endcanany

                @canany(['id-card-setting-view'])
                <li class="nav-item pcoded-hasmenu {{ Request::is('admin/admission/id-card-setting*') ? 'pcoded-trigger active' : '' }}">
                    <a href="#!" class="nav-link">
                        <span class="pcoded-mtext">{{ trans_choice('module_setting', 2) }}</span>
                    </a>

                    <ul class="pcoded-submenu">
                        @can('id-card-setting-view')
                        <li class="{{ Request::is('admin/admission/id-card-setting*') ? 'active' : '' }}"><a href="{{ route('admin.id-card-setting.index') }}" class="">{{ trans_choice('module_id_card_setting', 1) }}</a></li>
                        @endcan
                    </ul>
                </li>
                @endcanany
            </ul>
        </li>
        @endcanany

        @canany(['student-attendance-action', 'student-attendance-report', 'student-leave-manage-view', 'student-leave-manage-edit', 'student-note-create', 'student-note-view', 'student-enroll-single', 'student-enroll-group', 'student-enroll-adddrop', 'student-enroll-complete', 'student-enroll-alumni'])
        <li class="nav-item pcoded-hasmenu {{ Request::is('admin/student*') ? 'pcoded-trigger active' : '' }}">
            <a href="#!" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-user-graduate"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_student', 2) }}</span>
            </a>
            <ul class="pcoded-submenu">

                @canany(['student-attendance-action', 'student-attendance-report'])
                <li class="nav-item pcoded-hasmenu {{ Request::is('admin/student-attendance*') ? 'pcoded-trigger active' : '' }}">
                    <a href="#!" class="nav-link">
                        <span class="pcoded-mtext">{{ trans_choice('module_student_attendance', 2) }}</span>
                    </a>

                    <ul class="pcoded-submenu">
                        @can('student-attendance-action')
                        <li class="{{ Request::is('admin/student-attendance') ? 'active' : '' }}"><a href="{{ route('admin.student-attendance.index') }}" class="">{{ trans_choice('module_student_subject_attendance', 2) }}</a></li>
                        @endcan

                        @can('student-attendance-report')
                        <li class="{{ Request::is('admin/student-attendance-report*') ? 'active' : '' }}"><a href="{{ route('admin.student-attendance.report') }}" class="">{{ trans_choice('module_student_subject_report', 2) }}</a></li>
                        @endcan
                    </ul>
                </li>
                @endcanany

                @canany(['student-leave-manage-view', 'student-leave-manage-edit'])
                <li class="{{ Request::is('admin/student-leave-manage*') ? 'active' : '' }}"><a href="{{ route('admin.student-leave-manage.index') }}" class="">{{ trans_choice('module_leave_manage', 1) }}</a></li>
                @endcanany

                @canany(['student-note-create', 'student-note-view'])
                <li class="{{ Request::is('admin/student/student-note*') ? 'active' : '' }}"><a href="{{ route('admin.student-note.index') }}" class="">{{ trans_choice('module_student_note', 2) }}</a></li>
                @endcanany

                @canany(['student-enroll-single', 'student-enroll-group', 'student-enroll-adddrop', 'student-enroll-complete'])
                <li class="nav-item pcoded-hasmenu {{ Request::is('admin/student/single-enroll*') ? 'pcoded-trigger active' : '' }} {{ Request::is('admin/student/group-enroll*') ? 'pcoded-trigger active' : '' }} {{ Request::is('admin/student/subject-adddrop*') ? 'pcoded-trigger active' : '' }} {{ Request::is('admin/student/course-complete*') ? 'pcoded-trigger active' : '' }}">
                    <a href="#!" class="nav-link">
                        <span class="pcoded-mtext">{{ trans_choice('module_student_enroll', 2) }}</span>
                    </a>

                    <ul class="pcoded-submenu">
                        @canany(['student-enroll-single'])
                        <li class="{{ Request::is('admin/student/single-enroll*') ? 'active' : '' }}"><a href="{{ route('admin.single-enroll.index') }}" class="">{{ trans_choice('module_single_enroll', 1) }}</a></li>
                        @endcanany

                        @canany(['student-enroll-group'])
                        <li class="{{ Request::is('admin/student/group-enroll*') ? 'active' : '' }}"><a href="{{ route('admin.group-enroll.index') }}" class="">{{ trans_choice('module_group_enroll', 2) }}</a></li>
                        @endcanany

                        @canany(['student-enroll-adddrop'])
                        <li class="{{ Request::is('admin/student/subject-adddrop*') ? 'active' : '' }}"><a href="{{ route('admin.subject-adddrop.index') }}" class="">{{ trans_choice('module_subject_adddrop', 2) }}</a></li>
                        @endcanany

                        @canany(['student-enroll-complete'])
                        <li class="{{ Request::is('admin/student/course-complete*') ? 'active' : '' }}"><a href="{{ route('admin.course-complete.index') }}" class="">{{ trans_choice('module_course_complete', 2) }}</a></li>
                        @endcanany
                    </ul>
                </li>
                @endcanany

                @canany(['student-enroll-alumni'])
                <li class="{{ Request::is('admin/student/student-alumni*') ? 'active' : '' }}"><a href="{{ route('admin.student-alumni.index') }}" class="">{{ trans_choice('module_student_alumni', 2) }}</a></li>
                @endcanany
            </ul>
        </li>
        @endcanany

        @canany(['faculty-create', 'faculty-view', 'program-create', 'program-view', 'batch-create', 'batch-view', 'session-create', 'session-view', 'semester-create', 'semester-view', 'section-create', 'section-view', 'class-room-create', 'class-room-view', 'subject-create', 'subject-view', 'enroll-subject-create', 'enroll-subject-view', 'class-routine-create', 'class-routine-view', 'class-routine-print', 'exam-routine-create', 'exam-routine-view', 'exam-routine-print', 'class-routine-teacher', 'routine-setting-class', 'routine-setting-exam'])
        <li class="nav-item pcoded-hasmenu {{ Request::is('admin/academic*') ? 'pcoded-trigger active' : '' }}">
            <a href="#!" class="nav-link">
                <span class="pcoded-micon"><i class="fab fa-accusoft"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_academic', 2) }}</span>
            </a>
            <ul class="pcoded-submenu">
                @canany(['faculty-create', 'faculty-view'])
                <li class="{{ Request::is('admin/academic/faculty*') ? 'active' : '' }}"><a href="{{ route('admin.faculty.index') }}" class="">{{ trans_choice('module_faculty', 2) }}</a></li>
                @endcanany
                
                @canany(['program-create', 'program-view'])
                <li class="{{ Request::is('admin/academic/program*') ? 'active' : '' }}"><a href="{{ route('admin.program.index') }}" class="">{{ trans_choice('module_program', 2) }}</a></li>
                @endcanany

                @canany(['batch-create', 'batch-view'])
                <li class="{{ Request::is('admin/academic/batch*') ? 'active' : '' }}"><a href="{{ route('admin.batch.index') }}" class="">{{ trans_choice('module_batch', 2) }}</a></li>
                @endcanany

                @canany(['session-create', 'session-view'])
                <li class="{{ Request::is('admin/academic/session*') ? 'active' : '' }}"><a href="{{ route('admin.session.index') }}" class="">{{ trans_choice('module_session', 2) }}</a></li>
                @endcanany

                @canany(['semester-create', 'semester-view'])
                <li class="{{ Request::is('admin/academic/semester*') ? 'active' : '' }}"><a href="{{ route('admin.semester.index') }}" class="">{{ trans_choice('module_semester', 2) }}</a></li>
                @endcanany
                
                @canany(['section-create', 'section-view'])
                <li class="{{ Request::is('admin/academic/section*') ? 'active' : '' }}"><a href="{{ route('admin.section.index') }}" class="">{{ trans_choice('module_section', 2) }}</a></li>
                @endcanany
                
                @canany(['class-room-create', 'class-room-view'])
                <li class="{{ Request::is('admin/academic/room*') ? 'active' : '' }}"><a href="{{ route('admin.room.index') }}" class="">{{ trans_choice('module_class_room', 2) }}</a></li>
                @endcanany
                
                @canany(['subject-create', 'subject-view'])
                <li class="{{ Request::is('admin/academic/subject*') ? 'active' : '' }}"><a href="{{ route('admin.subject.index') }}" class="">{{ trans_choice('module_subject', 2) }}</a></li>
                @endcanany

                @canany(['enroll-subject-create', 'enroll-subject-view'])
                <li class="{{ Request::is('admin/academic/enroll-subject*') ? 'active' : '' }}"><a href="{{ route('admin.enroll-subject.index') }}" class="">{{ trans_choice('module_enroll_subject', 2) }}</a></li>
                @endcanany
                
                @canany(['class-routine-create', 'class-routine-view', 'class-routine-print'])
                <li class="{{ Request::is('admin/academic/class-routine') ? 'active' : '' }} {{ Request::is('admin/academic/class-routine/create') ? 'active' : '' }}"><a href="{{ route('admin.class-routine.index') }}" class="">{{ trans_choice('module_class_routine', 2) }}</a></li>
                @endcanany

                @canany(['exam-routine-create', 'exam-routine-view', 'exam-routine-print'])
                <li class="{{ Request::is('admin/academic/exam-routine*') ? 'active' : '' }}"><a href="{{ route('admin.exam-routine.index') }}" class="">{{ trans_choice('module_exam_routine', 2) }}</a></li>
                @endcanany

                @can('class-routine-teacher')
                <li class="{{ Request::is('admin/academic/class-routine-teacher') ? 'active' : '' }}"><a href="{{ route('admin.class-routine.teacher') }}" class="">{{ trans_choice('module_teacher_routine', 2) }}</a></li>
                @endcan

                @canany(['routine-setting-class', 'routine-setting-exam'])
                <li class="nav-item pcoded-hasmenu {{ Request::is('admin/academic/routine-setting*') ? 'pcoded-trigger active' : '' }}">
                    <a href="#!" class="nav-link">
                        <span class="pcoded-mtext">{{ trans_choice('module_setting', 2) }}</span>
                    </a>

                    <ul class="pcoded-submenu">
                        @can('routine-setting-class')
                        <li class="{{ Request::is('admin/academic/routine-setting/class*') ? 'active' : '' }}"><a href="{{ route('admin.routine-setting.class') }}" class="">{{ trans_choice('module_class_routine', 1) }}</a></li>
                        @endcan

                        @can('routine-setting-exam')
                        <li class="{{ Request::is('admin/academic/routine-setting/exam*') ? 'active' : '' }}"><a href="{{ route('admin.routine-setting.exam') }}" class="">{{ trans_choice('module_exam_routine', 1) }}</a></li>
                        @endcan
                    </ul>
                </li>
                @endcanany
            </ul>
        </li>
        @endcanany


        @canany(['exam-attendance', 'exam-marking', 'exam-result', 'subject-marking', 'subject-result', 'grade-view', 'grade-create', 'exam-type-view', 'exam-type-create', 'admit-card-view', 'admit-card-print', 'admit-card-download', 'admit-setting-view', 'result-contribution-view'])
        <li class="nav-item pcoded-hasmenu {{ Request::is('admin/exam*') ? 'pcoded-trigger active' : '' }}">
            <a href="#!" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-file-alt"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_examination', 2) }}</span>
            </a>
            <ul class="pcoded-submenu">
                @can('exam-attendance')
                <li class="{{ Request::is('admin/exam/exam-attendance*') ? 'active' : '' }}"><a href="{{ route('admin.exam-attendance.index') }}" class="">{{ trans_choice('module_exam_attendance', 2) }}</a></li>
                @endcan

                @can('exam-marking')
                <li class="{{ Request::is('admin/exam/exam-marking*') ? 'active' : '' }}"><a href="{{ route('admin.exam-marking.index') }}" class="">{{ trans_choice('module_exam_marking', 2) }}</a></li>
                @endcan

                @can('exam-result')
                <li class="{{ Request::is('admin/exam/exam-result*') ? 'active' : '' }}"><a href="{{ route('admin.exam-result') }}" class="">{{ trans_choice('module_exam_result', 2) }}</a></li>
                @endcan

                @can('subject-marking')
                <li class="{{ Request::is('admin/exam/subject-marking*') ? 'active' : '' }}"><a href="{{ route('admin.subject-marking.index') }}" class="">{{ trans_choice('module_subject_marking', 2) }}</a></li>
                @endcan

                @can('subject-result')
                <li class="{{ Request::is('admin/exam/subject-result*') ? 'active' : '' }}"><a href="{{ route('admin.subject-result') }}" class="">{{ trans_choice('module_subject_result', 2) }}</a></li>
                @endcan

                @canany(['grade-view', 'grade-create'])
                <li class="{{ Request::is('admin/exam/grade*') ? 'active' : '' }}"><a href="{{ route('admin.grade.index') }}" class="">{{ trans_choice('module_grade', 2) }}</a></li>
                @endcanany

                @canany(['exam-type-view', 'exam-type-create'])
                <li class="{{ Request::is('admin/exam/exam-type*') ? 'active' : '' }}"><a href="{{ route('admin.exam-type.index') }}" class="">{{ trans_choice('module_exam_type', 2) }}</a></li>
                @endcanany

                @canany(['admit-card-view', 'admit-card-print', 'admit-card-download'])
                <li class="{{ Request::is('admin/exam/admit-card*') ? 'active' : '' }}"><a href="{{ route('admin.admit-card.index') }}" class="">{{ trans_choice('module_admit_card', 2) }}</a></li>
                @endcanany

                @canany(['admit-setting-view', 'result-contribution-view'])
                <li class="nav-item pcoded-hasmenu {{ Request::is('admin/exam/admit-setting*') ? 'pcoded-trigger active' : '' }} {{ Request::is('admin/exam/result-contribution*') ? 'pcoded-trigger active' : '' }}">
                    <a href="#!" class="nav-link">
                        <span class="pcoded-mtext">{{ trans_choice('module_setting', 2) }}</span>
                    </a>

                    <ul class="pcoded-submenu">
                        @can('admit-setting-view')
                        <li class="{{ Request::is('admin/exam/admit-setting*') ? 'active' : '' }}"><a href="{{ route('admin.admit-setting.index') }}" class="">{{ trans_choice('module_admit_setting', 1) }}</a></li>
                        @endcan

                        @can('result-contribution-view')
                        <li class="{{ Request::is('admin/exam/result-contribution*') ? 'active' : '' }}"><a href="{{ route('admin.result-contribution.index') }}" class="">{{ trans_choice('module_result_contribution', 2) }}</a></li>
                        @endcan
                    </ul>
                </li>
                @endcanany
            </ul>
        </li>
        @endcanany


        <li class="nav-item {{ Request::is('admin/questionbank*') ? 'active' : '' }}">
            <a href="{{ route('admin.questionbank.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-user-edit"></i></span>
                <span class="pcoded-mtext">Question Bank</span>
            </a>
        </li>


        <li class="nav-item pcoded-hasmenu {{ Request::is('admin/course-learning-outcome*') ? 'pcoded-trigger active' : '' }}">
            <a href="#!" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-graduation-cap"></i></span>
                <span class="pcoded-mtext">Course Mapping</span>
            </a>
            <ul class="pcoded-submenu">
               
            
                <li class="nav-item pcoded-hasmenu {{ Request::is('admin/student/single-enroll*') ? 'pcoded-trigger active' : '' }} {{ Request::is('admin/student/group-enroll*') ? 'pcoded-trigger active' : '' }} {{ Request::is('admin/student/subject-adddrop*') ? 'pcoded-trigger active' : '' }} {{ Request::is('admin/student/course-complete*') ? 'pcoded-trigger active' : '' }}">
                    <a href="#!" class="nav-link">
                        <span class="pcoded-mtext">Faculty of CS</span>
                    </a>

                    <ul class="pcoded-submenu">
                        <li class="{{ Request::is('admin/student/single-enroll*') ? 'active' : '' }}"><a href="/files/cs/CS-Courses.xlsx" download="CS-Courses.xlsx"  class="">BS-CS</a></li>
                        <li class="{{ Request::is('admin/student/single-enroll*') ? 'active' : '' }}"><a href="/files/cs/AI-Courses.xlsx" download="AI-Courses.xlsx" class="">BS-AI</a></li>
                        <li class="{{ Request::is('admin/student/single-enroll*') ? 'active' : '' }}"><a href="/files/cs/CST-Courses.xlsx" download="CST-Courses.xlsx" class="">BS-CST</a></li>
                        <li class="{{ Request::is('admin/student/single-enroll*') ? 'active' : '' }}"><a href="/files/cs/DS-Courses.xlsx" download="DS-Courses.xlsx" class="">BS-DS</a></li>
        
                    </ul>
                </li>

                <li class="nav-item pcoded-hasmenu {{ Request::is('admin/student/single-enroll*') ? 'pcoded-trigger active' : '' }} {{ Request::is('admin/student/group-enroll*') ? 'pcoded-trigger active' : '' }} {{ Request::is('admin/student/subject-adddrop*') ? 'pcoded-trigger active' : '' }} {{ Request::is('admin/student/course-complete*') ? 'pcoded-trigger active' : '' }}">
                    <a href="#!" class="nav-link">
                        <span class="pcoded-mtext">Faculty of SE</span>
                    </a>

                    <ul class="pcoded-submenu">
                        <li class="{{ Request::is('admin/student/single-enroll*') ? 'active' : '' }}"><a href="/files/se/IT-Courses.xlsx" download="IT-Courses.xlsx" class="">BS-IT</a></li>
                        <li class="{{ Request::is('admin/student/single-enroll*') ? 'active' : '' }}"><a href="/files/se/SE-Courses.xlsx" download="SE-Courses.xlsx" class="">BS-SE</a></li>
                      
                    </ul>
                </li>

            </ul>
        </li>



        @canany(['assignment-create', 'assignment-view', 'assignment-marking', 'content-create', 'content-view', 'content-type-view', 'content-type-create'])
        <li class="nav-item pcoded-hasmenu {{ Request::is('admin/download*') ? 'pcoded-trigger active' : '' }}">
            <a href="#!" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-newspaper"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_study_material', 2) }}</span>
            </a>
            <ul class="pcoded-submenu">
                @canany(['assignment-create', 'assignment-view', 'assignment-marking'])
                <li class="{{ Request::is('admin/download/assignment*') ? 'active' : '' }}"><a href="{{ route('admin.assignment.index') }}" class="">{{ trans_choice('module_assignment', 1) }} {{ __('list') }}</a></li>
                @endcanany
                
                @canany(['content-create', 'content-view'])
                <li class="{{ Request::is('admin/download/content*') ? 'active' : '' }}"><a href="{{ route('admin.content.index') }}" class="">{{ trans_choice('module_content', 1) }} {{ __('list') }}</a></li>
                @endcanany

                @canany(['content-type-view', 'content-type-create'])
                <li class="{{ Request::is('admin/download/content-type*') ? 'active' : '' }}"><a href="{{ route('admin.content-type.index') }}" class="">{{ trans_choice('module_content_type', 2) }}</a></li>
                @endcanany
            </ul>
        </li>
        @endcanany

     

        @canany(['user-create', 'user-view', 'user-password-print', 'user-password-change', 'staff-daily-attendance-action', 'staff-daily-attendance-report', 'staff-hourly-attendance-action', 'staff-hourly-attendance-report', 'staff-note-create', 'staff-note-view', 'payroll-view', 'payroll-action', 'payroll-print', 'payroll-report', 'staff-leave-manage-edit', 'staff-leave-manage-view', 'staff-leave-create', 'staff-leave-view', 'leave-type-create', 'leave-type-view', 'work-shift-type-create', 'work-shift-type-view', 'designation-create', 'designation-view', 'department-create', 'department-view', 'tax-setting-create', 'tax-setting-view', 'pay-slip-setting-view'])
        <li class="nav-item pcoded-hasmenu {{ Request::is('admin/staff*') ? 'pcoded-trigger active' : '' }}">
            <a href="#!" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-users-cog"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_human_resource', 2) }}</span>
            </a>
            <ul class="pcoded-submenu">
                @canany(['user-create', 'user-view', 'user-password-print', 'user-password-change',])
                <li class="{{ Request::is('admin/staff/user*') ? 'active' : '' }}"><a href="{{ route('admin.user.index') }}" class="">{{ trans_choice('module_staff', 1) }} {{ __('list') }}</a></li>
                @endcanany

                @canany(['staff-daily-attendance-action', 'staff-daily-attendance-report', 'staff-hourly-attendance-action', 'staff-hourly-attendance-report'])
                <li class="nav-item pcoded-hasmenu {{ Request::is('admin/staff-daily-attendance*') ? 'pcoded-trigger active' : '' }} {{ Request::is('admin/staff-daily-report*') ? 'pcoded-trigger active' : '' }} {{ Request::is('admin/staff-hourly-attendance*') ? 'pcoded-trigger active' : '' }} {{ Request::is('admin/staff-hourly-report*') ? 'pcoded-trigger active' : '' }}">
                    <a href="#!" class="nav-link">
                        <span class="pcoded-mtext">{{ trans_choice('module_staff_attendance', 2) }}</span>
                    </a>

                    <ul class="pcoded-submenu">
                        @can('staff-daily-attendance-action')
                        <li class="{{ Request::is('admin/staff-daily-attendance*') ? 'active' : '' }}"><a href="{{ route('admin.staff-daily-attendance.index') }}" class="">{{ trans_choice('module_staff_daily_attendance', 2) }}</a></li>
                        @endcan

                        @can('staff-daily-attendance-report')
                        <li class="{{ Request::is('admin/staff-daily-report*') ? 'active' : '' }}"><a href="{{ route('admin.staff-daily-attendance.report') }}" class="">{{ trans_choice('module_staff_daily_report', 2) }}</a></li>
                        @endcan

                        @can('staff-hourly-attendance-action')
                        <li class="{{ Request::is('admin/staff-hourly-attendance*') ? 'active' : '' }}"><a href="{{ route('admin.staff-hourly-attendance.index') }}" class="">{{ trans_choice('module_staff_hourly_attendance', 2) }}</a></li>
                        @endcan

                        @can('staff-hourly-attendance-report')
                        <li class="{{ Request::is('admin/staff-hourly-report*') ? 'active' : '' }}"><a href="{{ route('admin.staff-hourly-attendance.report') }}" class="">{{ trans_choice('module_staff_hourly_report', 2) }}</a></li>
                        @endcan
                    </ul>
                </li>
                @endcanany

                @canany(['staff-note-create', 'staff-note-view'])
                <li class="{{ Request::is('admin/staff/staff-note*') ? 'active' : '' }}"><a href="{{ route('admin.staff-note.index') }}" class="">{{ trans_choice('module_staff_note', 2) }}</a></li>
                @endcanany

                @canany(['staff-leave-manage-edit', 'staff-leave-manage-view'])
                <li class="{{ Request::is('admin/staff/leave-manage*') ? 'active' : '' }}"><a href="{{ route('admin.leave-manage.index') }}" class="">{{ trans_choice('module_leave_manage', 2) }}</a></li>
                @endcanany

                @canany(['staff-leave-create', 'staff-leave-view'])
                <li class="{{ Request::is('admin/staff/staff-leave*') ? 'active' : '' }}"><a href="{{ route('admin.staff-leave.index') }}" class="">{{ trans_choice('module_apply_leave', 2) }}</a></li>
                @endcanany

                @canany(['leave-type-create', 'leave-type-view'])
                <li class="{{ Request::is('admin/staff/leave-type*') ? 'active' : '' }}"><a href="{{ route('admin.leave-type.index') }}" class="">{{ trans_choice('module_leave_type', 2) }}</a></li>
                @endcanany

                @canany(['work-shift-type-create', 'work-shift-type-view'])
                <li class="{{ Request::is('admin/staff/work-shift-type*') ? 'active' : '' }}"><a href="{{ route('admin.work-shift-type.index') }}" class="">{{ trans_choice('module_work_shift_type', 2) }}</a></li>
                @endcanany

                @canany(['designation-create', 'designation-view'])
                <li class="{{ Request::is('admin/staff/designation*') ? 'active' : '' }}"><a href="{{ route('admin.designation.index') }}" class="">{{ trans_choice('module_designation', 2) }}</a></li>
                @endcanany
                
                @canany(['department-create', 'department-view'])
                <li class="{{ Request::is('admin/staff/department*') ? 'active' : '' }}"><a href="{{ route('admin.department.index') }}" class="">{{ trans_choice('module_department', 2) }}</a></li>
                @endcanany

                @canany(['tax-setting-create', 'tax-setting-view', 'pay-slip-setting-view'])
                <li class="nav-item pcoded-hasmenu {{ Request::is('admin/staff/tax-setting*') ? 'pcoded-trigger active' : '' }} {{ Request::is('admin/staff/pay-slip-setting*') ? 'pcoded-trigger active' : '' }}">
                    <a href="#!" class="nav-link">
                        <span class="pcoded-mtext">{{ trans_choice('module_setting', 2) }}</span>
                    </a>

                    <ul class="pcoded-submenu">
                        @canany(['tax-setting-create', 'tax-setting-view'])
                        <li class="{{ Request::is('admin/staff/tax-setting*') ? 'active' : '' }}"><a href="{{ route('admin.tax-setting.index') }}" class="">{{ trans_choice('module_tax_setting', 2) }}</a></li>
                        @endcanany

                        @can('pay-slip-setting-view')
                        <li class="{{ Request::is('admin/staff/pay-slip-setting*') ? 'active' : '' }}"><a href="{{ route('admin.pay-slip-setting.index') }}" class="">{{ trans_choice('module_pay_slip_setting', 1) }}</a></li>
                        @endcan
                    </ul>
                </li>
                @endcanany
            </ul>
        </li>
        @endcanany

     
        @canany(['email-notify-create', 'email-notify-view', 'sms-notify-create', 'sms-notify-view', 'event-create', 'event-view', 'event-calendar', 'notice-create', 'notice-view', 'notice-category-create', 'notice-category-view'])
        <li class="nav-item pcoded-hasmenu {{ Request::is('admin/communicate*') ? 'pcoded-trigger active' : '' }}">
            <a href="#!" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-bullhorn"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_communicate', 2) }}</span>
            </a>
            <ul class="pcoded-submenu">
                @canany(['email-notify-create', 'email-notify-view'])
                <li class="{{ Request::is('admin/communicate/email-notify*') ? 'active' : '' }}"><a href="{{ route('admin.email-notify.index') }}" class="">{{ trans_choice('module_email_notify', 2) }}</a></li>
                @endcanany

                @canany(['sms-notify-create', 'sms-notify-view'])
                <li class="{{ Request::is('admin/communicate/sms-notify*') ? 'active' : '' }}"><a href="{{ route('admin.sms-notify.index') }}" class="">{{ trans_choice('module_sms_notify', 2) }}</a></li>
                @endcanany

                @canany(['event-create', 'event-view'])
                <li class="{{ Request::is('admin/communicate/event') ? 'active' : '' }}"><a href="{{ route('admin.event.index') }}" class="">{{ trans_choice('module_event', 2) }} {{ __('list') }}</a></li>
                @endcanany
                
                @can('event-calendar')
                <li class="{{ Request::is('admin/communicate/event-calendar') ? 'active' : '' }}"><a href="{{ route('admin.event.calendar') }}" class="">{{ trans_choice('module_calendar', 2) }}</a></li>
                @endcan
                
                @canany(['notice-create', 'notice-view'])
                <li class="{{ Request::is('admin/communicate/notice*') ? 'active' : '' }}"><a href="{{ route('admin.notice.index') }}" class="">{{ trans_choice('module_notice', 1) }} {{ __('list') }}</a></li>
                @endcanany
                
                @canany('notice-category-create', 'notice-category-view')
                <li class="{{ Request::is('admin/communicate/notice-category*') ? 'active' : '' }}"><a href="{{ route('admin.notice-category.index') }}" class="">{{ trans_choice('module_notice_category', 2) }}</a></li>
                @endcanany
            </ul>
        </li>
        @endcanany




        @canany(['marksheet-view', 'marksheet-print', 'marksheet-download', 'marksheet-setting-view', 'certificate-view', 'certificate-create', 'certificate-print', 'certificate-download', 'certificate-template-view', 'certificate-template-create'])
        <li class="nav-item pcoded-hasmenu {{ Request::is('admin/transcript*') ? 'pcoded-trigger active' : '' }}">
            <a href="#!" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-address-card"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_transcript', 2) }}</span>
            </a>
            <ul class="pcoded-submenu">
                @canany(['marksheet-view', 'marksheet-print', 'marksheet-download'])
                <li class="{{ Request::is('admin/transcript/marksheet-semester*') ? 'active' : '' }}"><a href="{{ route('admin.marksheet.semester') }}" class="">{{ trans_choice('module_marksheet_semester', 2) }}</a></li>
                @endcanany
                
                @canany(['marksheet-view', 'marksheet-print', 'marksheet-download'])
                <li class="{{ Request::is('admin/transcript/marksheet') ? 'active' : '' }}"><a href="{{ route('admin.marksheet.index') }}" class="">{{ trans_choice('module_marksheet_total', 2) }}</a></li>
                @endcanany

                @canany(['marksheet-setting-view'])
                <li class="{{ Request::is('admin/transcript/marksheet-setting*') ? 'active' : '' }}"><a href="{{ route('admin.marksheet-setting.index') }}" class="">{{ trans_choice('module_marksheet_setting', 1) }}</a></li>
                @endcanany

                @canany(['certificate-view', 'certificate-create', 'certificate-print', 'certificate-download'])
                <li class="{{ Request::is('admin/transcript/certificate*') ? 'active' : '' }}"><a href="{{ route('admin.certificate.index') }}" class="">{{ trans_choice('module_certificate', 2) }}</a></li>
                @endcanany

                @canany(['certificate-template-view', 'certificate-template-create'])
                <li class="{{ Request::is('admin/transcript/certificate-template*') ? 'active' : '' }}"><a href="{{ route('admin.certificate-template.index') }}" class="">{{ trans_choice('module_certificate_template', 2) }}</a></li>
                @endcanany
            </ul>
        </li>
        @endcanany

        @canany(['report-student', 'report-subject', 'report-fees', 'report-payroll', 'report-leave', 'report-income', 'report-expense', 'report-library', 'report-hostel', 'report-transport'])
        <li class="nav-item pcoded-hasmenu {{ Request::is('admin/report*') ? 'pcoded-trigger active' : '' }}">
            <a href="#!" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-chart-line"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_report', 2) }}</span>
            </a>
            <ul class="pcoded-submenu">
                @can('report-student')
                <li class="{{ Request::is('admin/report/student') ? 'active' : '' }}"><a href="{{ route('admin.report.student') }}" class="">{{ trans_choice('module_student_progress', 1) }}</a></li>
                @endcan

                @can('report-subject')
                <li class="{{ Request::is('admin/report/subject') ? 'active' : '' }}"><a href="{{ route('admin.report.subject') }}" class="">{{ trans_choice('module_course_students', 1) }}</a></li>
                @endcan

                @can('report-fees')
                <li class="{{ Request::is('admin/report/fees') ? 'active' : '' }}"><a href="{{ route('admin.report.fees') }}" class="">{{ trans_choice('module_collected_fees', 1) }}</a></li>
                @endcan

                @can('report-payroll')
                <li class="{{ Request::is('admin/report/payroll') ? 'active' : '' }}"><a href="{{ route('admin.report.payroll') }}" class="">{{ trans_choice('module_salary_paid', 1) }}</a></li>
                @endcan

                @can('report-leave')
                <li class="{{ Request::is('admin/report/leave') ? 'active' : '' }}"><a href="{{ route('admin.report.leave') }}" class="">{{ trans_choice('module_staff_leaves', 1) }}</a></li>
                @endcan

                @can('report-income')
                <li class="{{ Request::is('admin/report/income') ? 'active' : '' }}"><a href="{{ route('admin.report.income') }}" class="">{{ trans_choice('module_total_income', 1) }}</a></li>
                @endcan

                @can('report-expense')
                <li class="{{ Request::is('admin/report/expense') ? 'active' : '' }}"><a href="{{ route('admin.report.expense') }}" class="">{{ trans_choice('module_total_expense', 1) }}</a></li>
                @endcan

                @can('report-library')
                <li class="{{ Request::is('admin/report/library') ? 'active' : '' }}"><a href="{{ route('admin.report.library') }}" class="">{{ trans_choice('module_library_history', 1) }}</a></li>
                @endcan

                @can('report-hostel')
                <li class="{{ Request::is('admin/report/hostel') ? 'active' : '' }}"><a href="{{ route('admin.report.hostel') }}" class="">{{ trans_choice('module_hostel_members', 1) }}</a></li>
                @endcan

                @can('report-transport')
                <li class="{{ Request::is('admin/report/transport') ? 'active' : '' }}"><a href="{{ route('admin.report.transport') }}" class="">{{ trans_choice('module_transport_members', 1) }}</a></li>
                @endcan
            </ul>
        </li>
        @endcanany

        @canany(['setting-view', 'province-view', 'province-create', 'district-view', 'district-create', 'language-view', 'language-create', 'translations-view', 'translations-create', 'mail-setting-view', 'sms-setting-view', 'application-setting-view', 'schedule-setting-view', 'bulk-import-export-view', 'role-view', 'role-edit', 'field-staff', 'field-student', 'field-application', 'student-panel-view'])
        <li class="nav-item pcoded-hasmenu {{ Request::is('admin/setting*') ? 'pcoded-trigger active' : '' }} {{ Request::is('admin/translations*') ? 'pcoded-trigger active' : '' }}">
            <a href="#!" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-cog"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_setting', 2) }}</span>
            </a>
            <ul class="pcoded-submenu">
                @can('setting-view')
                <li class="{{ Request::is('admin/setting') ? 'active' : '' }}"><a href="{{ route('admin.setting.index') }}" class="">{{ trans_choice('module_general_setting', 1) }}</a></li>
                @endcan

                @canany(['province-view', 'province-create'])
                <li class="{{ Request::is('admin/setting/province*') ? 'active' : '' }}"><a href="{{ route('admin.province.index') }}" class="">{{ trans_choice('module_province', 2) }}</a></li>
                @endcanany

                @canany(['district-view', 'district-create'])
                <li class="{{ Request::is('admin/setting/district*') ? 'active' : '' }}"><a href="{{ route('admin.district.index') }}" class="">{{ trans_choice('module_district', 2) }}</a></li>
                @endcanany
                
                @canany(['language-view', 'language-create'])
                <li class="{{ Request::is('admin/setting/language*') ? 'active' : '' }}"><a href="{{ route('admin.language.index') }}" class="">{{ trans_choice('module_language', 2) }}</a></li>
                @endcanany
                
                @canany(['translations-view', 'translations-create'])
                <li class="{{ Request::is('admin/translations*') ? 'active' : '' }}"><a href="{{ route('admin.translations.index') }}" class="">{{ trans_choice('module_translate', 2) }}</a></li>
                @endcanany

                @can('mail-setting-view')
                <li class="{{ Request::is('admin/setting/mail-setting*') ? 'active' : '' }}"><a href="{{ route('admin.mail-setting.index') }}" class="">{{ trans_choice('module_mail_setting', 1) }}</a></li>
                @endcan

                @can('sms-setting-view')
                <li class="{{ Request::is('admin/setting/sms-setting*') ? 'active' : '' }}"><a href="{{ route('admin.sms-setting.index') }}" class="">{{ trans_choice('module_sms_setting', 1) }}</a></li>
                @endcan

                @can('application-setting-view')
                <li class="{{ Request::is('admin/setting/application-setting*') ? 'active' : '' }}"><a href="{{ route('admin.application-setting.index') }}" class="">{{ trans_choice('module_application_setting', 1) }}</a></li>
                @endcan

                {{-- @can('schedule-setting-view')
                <li class="{{ Request::is('admin/setting/schedule-setting*') ? 'active' : '' }}"><a href="{{ route('admin.schedule-setting.index') }}" class="">{{ trans_choice('module_schedule_setting', 1) }}</a></li>
                @endcan --}}

                {{-- @can('bulk-import-export-view')
                <li class="{{ Request::is('admin/setting/bulk-import-export*') ? 'active' : '' }}"><a href="{{ route('admin.bulk.import-export') }}" class="">{{ trans_choice('module_bulk_import_export', 1) }}</a></li>
                @endcan --}}

                @canany(['role-view', 'role-edit'])
                <li class="{{ Request::is('admin/setting/role*') ? 'active' : '' }}"><a href="{{ route('admin.role.index') }}" class="">{{ trans_choice('module_role', 2) }}</a></li>
                @endcanany

                @canany(['field-staff', 'field-student', 'field-application'])
                <li class="nav-item pcoded-hasmenu {{ Request::is('admin/setting/field*') ? 'pcoded-trigger active' : '' }}">
                    <a href="#!" class="nav-link">
                        <span class="pcoded-mtext">{{ trans_choice('module_field_setting', 2) }}</span>
                    </a>

                    <ul class="pcoded-submenu">
                        @canany(['field-staff'])
                        <li class="{{ Request::is('admin/setting/field-user*') ? 'active' : '' }}"><a href="{{ route('admin.field.user') }}" class="">{{ trans_choice('module_staff', 2) }}</a></li>
                        @endcan

                        @canany(['field-student'])
                        <li class="{{ Request::is('admin/setting/field-student*') ? 'active' : '' }}"><a href="{{ route('admin.field.student') }}" class="">{{ trans_choice('module_student', 2) }}</a></li>
                        @endcan

                        @canany(['field-application'])
                        <li class="{{ Request::is('admin/setting/field-application*') ? 'active' : '' }}"><a href="{{ route('admin.field.application') }}" class="">{{ trans_choice('module_application', 2) }}</a></li>
                        @endcan
                    </ul>
                </li>
                @endcanany

                @canany(['student-panel-view'])
                <li class="{{ Request::is('admin/setting/student-panel*') ? 'active' : '' }}"><a href="{{ route('admin.student.panel') }}" class="">{{ trans_choice('module_student_panel', 2) }}</a></li>
                @endcanany
            </ul>
        </li>
        @endcanany

        @canany(['profile-view', 'profile-edit'])
        <li class="nav-item {{ Request::is('admin/profile*') ? 'active' : '' }}">
            <a href="{{ route('admin.profile.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-user-edit"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_profile', 2) }}</span>
            </a>
        </li>
        @endcanany

    </ul>
</div>
<!-- End Sidebar -->