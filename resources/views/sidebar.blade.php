<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{$identity_data[1]->firstname}} {{$identity_data[2]->lastname}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Overview</span></a></li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Reply Slips</span></a></li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>View Attendance</span></a></li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Class Chat</span></a></li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Subjects</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"> Math</a></li>
            <li><a href="pages/charts/morris.html"> Science</a></li>
            <li><a href="pages/charts/flot.html"> PE</a></li>
            <li><a href="pages/charts/inline.html"> Music</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Directory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"> Students</a></li>
            <li><a href="pages/charts/morris.html"> Teachers</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Grading</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"> Math</a></li>
            <li><a href="pages/charts/morris.html"> Science</a></li>
            <li><a href="pages/charts/flot.html"> PE</a></li>
            <li><a href="pages/charts/inline.html"> Music</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Final Grades</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"> Pick Grade/Section</a></li>
            <li><a href="pages/charts/morris.html"> Pick Student</a></li>
            <li><a href="pages/charts/flot.html"> Get Graded Tasks</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>