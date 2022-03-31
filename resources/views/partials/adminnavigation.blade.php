<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item active">
        <a class="nav-link collapsed" href="/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Manage</li>

      <li class="nav-item">
        <a class="nav-link {{ !(request()->is('roles*','departments*', 'units*', 'scorecards*', 'kpitypes*')) ? 'collapsed' : ''}}" data-bs-target="#setup-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-wrench"></i><span>Setup</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="setup-nav" class="nav-content collapse {{ (request()->is('roles*','departments*', 'units*', 'scorecards*', 'kpitypes*')) ? 'show' : ''}}" data-bs-parent="#sidebar-nav">
          <li>
              <a href="/roles" class="{{ (request()->is('role*'))  ? 'active' : ''}}">
                  <i class="bi bi-circle"></i><span>Role</span>
                </a>
              </li>
          <li>
            <a href="/departments" class="{{ (request()->is('department*'))  ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Department</span>
            </a>
          </li>
          <li>
            <a href="/units" class="{{ (request()->is('unit*'))  ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Unit</span>
            </a>
          </li>
          <li>
            <a href="/scorecards" class="{{ (request()->is('scorecard*'))  ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Balance Scorecard</span>
            </a>
          </li>
          <li>
            <a href="/kpitypes" class="{{ (request()->is('kpitype*'))  ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Type of KPI</span>
            </a>
          </li>
        </ul>
      </li><!-- End Setup Nav -->

      <li class="nav-item">
        <a class="nav-link  {{ !(request()->is('tasks*','kpidepartments*')) ? 'collapsed' : ''}}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Component</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse {{ (request()->is('tasks*','kpidepartment*')) ? 'show' : ''}}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="/tasks" class="{{ (request()->is('task*'))  ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Task</span>
            </a>
          </li>
          <li>
            <a href="/kpidepartments" class="{{ (request()->is('kpidepartment*'))  ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Department KPI</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link {{ !(request()->is('users*')) ? 'collapsed' : ''}}" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="users-nav" class="nav-content collapse {{ (request()->is('users*')) ? 'show' : ''}}" data-bs-parent="#sidebar-nav">
          <li>
            <a href="/users" class="{{ (request()->is('users*'))  ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>All User</span>
            </a>
          </li>
          <li>
            <a href="/units">
              <i class="bi bi-circle"></i><span>Line Manager</span>
            </a>
          </li>
        </ul>
      </li><!-- End User Nav -->

      <li class="nav-heading">MANAGE KPI</li>
      <li class="nav-item">
        <a class="nav-link {{ !(request()->is('kpis*')) ? 'collapsed' : ''}}" data-bs-target="#managekpi-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-graph-up"></i><span>KPI</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="managekpi-nav" class="nav-content collapse {{ (request()->is('kpis*')) ? 'show' : ''}} " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/kpis/individual" class="">
              <i class="bi bi-circle"></i><span>Individual</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Department</span>
            </a>
          </li>
        </ul>
      </li>

      <!--
      <li class="nav-heading">MANAGE KPI</li>
      <li class="nav-item">
        <a class="nav-link " data-bs-target="#managekpi-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-graph-up"></i><span>KPI</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="managekpi-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/users" class="{{ (request()->is('users*'))  ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Individual</span>
            </a>
          </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Department</span>
            </a>
          </li>
        </ul>
      </li>
      -->
      <!-- End User Nav -->

      <li class="nav-heading">Report</li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>Daily</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Weekly</span>
            </a>
          </li>
        </ul>
      </li><!-- End Report Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Statistic</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Chart.js</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>ApexCharts</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->


    </ul>

  </aside><!-- End Sidebar-->
