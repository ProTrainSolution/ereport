<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item active">
        <a class="nav-link collapsed" href="../home">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">MANAGE</li>
      <li class="nav-item">
        <a class="nav-link {{ !(request()->is('kpis*', 'users/team', 'users/pizza/*', 'users/kpidetail/*')) ? 'collapsed' : ''}}" data-bs-target="#managekpi-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-graph-up"></i><span>KPI</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="managekpi-nav" class="nav-content collapse {{ (request()->is('kpis*', 'users/team', 'users/pizza/*', 'users/kpidetail/*')) ? 'show' : ''}} " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/kpis/individual" class="">
              <i class="bi bi-circle"></i><span>Individual</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link  {{ !(request()->is('taskactivities*', 'kpiactivities*', 'otheractivities', 'overallactivities*')) ? 'collapsed' : ''}}" data-bs-target="#managereport-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="managereport-nav" class="nav-content collapse {{ (request()->is('taskactivities*', 'kpiactivities*', 'otheractivities*', 'overallactivities*')) ? 'show' : ''}}" data-bs-parent="#sidebar-nav">
          <!--
          <li>
            <a href="/overallactivities" class="{{ (request()->is('overallactivities*'))  ? 'active' : ''}}">
                <i class="bi bi-circle"></i><span>Overall</span>
            </a>
          </li>
          -->
          <li>
            <a href="/kpiactivities" class="{{ (request()->is('kpiactivities*'))  ? 'active' : ''}}">
                <i class="bi bi-circle"></i><span>KPI</span>
            </a>
          </li>
          <li>
            <a href="/taskactivities" class="{{ (request()->is('taskactivities*'))  ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Non KPI</span>
            </a>
          </li>
          <li>
            <a href="/otheractivities" class="{{ (request()->is('otheractivities*'))  ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Other Activities</span>
            </a>
          </li>
        </ul>
      </li><!-- End Report Nav -->

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
