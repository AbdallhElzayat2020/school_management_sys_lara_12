<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('dashboard.index') }}" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text">{{ __('dashboard.dashboard') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components</li>
                    <!-- menu item Grades-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#grades">
                            <div class="pull-left"><i class="ti-palette"></i>
                                <span class="right-nav-text">{{ __('grades.grades') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="grades" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('grades.index') }}">{{ __('grades.grades_menu') }}</a></li>
                        </ul>
                    </li>
                    <!-- menu item classrooms-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left">
                                <i class="ti-calendar"></i>
                                <span class="right-nav-text">{{ __('classrooms.page_title') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('classrooms.index') }}">{{ __('classrooms.classrooms') }} </a></li>
                        </ul>
                    </li>
                    <!-- menu item classrooms-->

                    <!-- menu item Sections-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections">
                            <div class="pull-left">
                                <i class="ti-calendar"></i>
                                <span class="right-nav-text">{{ __('sections.title_page') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('sections.index') }}">{{ __('sections.list_section') }} </a></li>
                        </ul>
                    </li>
                    <!-- menu item Sections-->

                    <!-- menu item parents-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#parents">
                            <div class="pull-left">
                                <i class="ti-calendar"></i>
                                <span class="right-nav-text">{{ __('parents.parents') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="parents" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('parents.index') }}">{{ __('parents.list_parents') }} </a></li>
                            <li><a href="{{ route('parents.create') }}">{{ __('parents.add_parent') }} </a></li>
                        </ul>
                    </li>
                    <!-- menu item parents-->

                    <!-- menu item teachers-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#teachers">
                            <div class="pull-left">
                                <i class="ti-calendar"></i>
                                <span class="right-nav-text">{{ __('teachers.teachers') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="teachers" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('teachers.index') }}">{{ __('teachers.teacher_list') }} </a></li>
                            <li><a href="{{ route('teachers.create') }}">{{ __('teachers.add_teacher') }} </a></li>
                        </ul>
                    </li>

                    <!-- menu item students-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students">
                            <div class="pull-left">
                                <i class="ti-calendar"></i>
                                <span class="right-nav-text">{{ __('students.students_management') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="students" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('students.index') }}">{{ __('students.student_list') }} </a></li>
                            <li><a href="{{ route('students.create') }}">{{ __('students.add_student') }} </a></li>
                            <li><a href="{{ route('student-promotion.index') }}">{{ __('dashboard.student_promotion') }} </a></li>
                            <li><a href="{{ route('student-promotion.create') }}">قائمة الترقيات للطلاب</a></li>
                        </ul>
                    </li>


                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Widgets, Forms & Tables</li>
                    <!-- menu item Widgets-->
                    <li>
                        <a href="widgets.html"><i class="ti-blackboard"></i><span class="right-nav-text">Widgets</span>
                            <span class="badge badge-pill badge-danger float-right mt-1">59</span> </a>
                    </li>
                    <!-- menu item Form-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                            <div class="pull-left"><i class="ti-files"></i><span class="right-nav-text">Form &
                                    Editor</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Form" class="collapse" data-parent="#sidebarnav">
                            <li><a href="editor.html">Editor</a></li>
                            <li><a href="editor-markdown.html">Editor Markdown</a></li>
                            <li><a href="form-input.html">Form input</a></li>
                            <li><a href="form-validation-jquery.html">form validation jquery</a></li>
                            <li><a href="form-wizard.html">form wizard</a></li>
                            <li><a href="form-repeater.html">form repeater</a></li>
                            <li><a href="input-group.html">input group</a></li>
                            <li><a href="toastr.html">toastr</a></li>
                        </ul>
                    </li>
                    <!-- menu item table -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
                            <div class="pull-left"><i class="ti-layout-tab-window"></i><span
                                    class="right-nav-text">data
                                    table</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="table" class="collapse" data-parent="#sidebarnav">
                            <li><a href="data-html-table.html">Data html table</a></li>
                            <li><a href="data-local.html">Data local</a></li>
                            <li><a href="data-table.html">Data table</a></li>
                        </ul>
                    </li>
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">More Pages</li>
                    <!-- menu item Custom pages-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom-page">
                            <div class="pull-left"><i class="ti-file"></i><span class="right-nav-text">Custom
                                    pages</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="custom-page" class="collapse" data-parent="#sidebarnav">
                            <li><a href="projects.html">projects</a></li>
                            <li><a href="project-summary.html">Projects summary</a></li>
                            <li><a href="profile.html">profile</a></li>
                            <li><a href="app-contacts.html">App contacts</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="file-manager.html">file manager</a></li>
                            <li><a href="invoice.html">Invoice</a></li>
                            <li><a href="blank.html">Blank page</a></li>
                            <li><a href="layout-container.html">layout container</a></li>
                            <li><a href="error.html">Error</a></li>
                            <li><a href="faqs.html">faqs</a></li>
                        </ul>
                    </li>

                    <!-- menu item maps-->
                    <li>
                        <a href="maps.html"><i class="ti-location-pin"></i><span class="right-nav-text">maps</span>
                            <span class="badge badge-pill badge-success float-right mt-1">06</span></a>
                    </li>
                    <!-- menu item timeline-->
                    <li>
                        <a href="timeline.html"><i class="ti-panel"></i><span class="right-nav-text">timeline</span>
                        </a>
                    </li>
                    <!-- menu item Multi level-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#multi-level">
                            <div class="pull-left"><i class="ti-layers"></i><span class="right-nav-text">Multi
                                    level Menu</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="multi-level" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#auth">Level
                                    item 1
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="auth" class="collapse">
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="collapse"
                                           data-target="#login">Level
                                            item 1.1
                                            <div class="pull-right"><i class="ti-plus"></i></div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <ul id="login" class="collapse">
                                            <li>
                                                <a href="javascript:void(0);" data-toggle="collapse"
                                                   data-target="#invoice">level item 1.1.1
                                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                                    <div class="clearfix"></div>
                                                </a>
                                                <ul id="invoice" class="collapse">
                                                    <li><a href="#">level item 1.1.1.1</a></li>
                                                    <li><a href="#">level item 1.1.1.2</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">level item 1.2</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#error">level
                                    item 2
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="error" class="collapse">
                                    <li><a href="#">level item 2.1</a></li>
                                    <li><a href="#">level item 2.2</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
