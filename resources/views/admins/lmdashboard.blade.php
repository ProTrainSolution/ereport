@extends('layouts.main')

@section('container')

{{-- main title area --}}
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
</div>

{{-- main section area --}}
<section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Sales <span>| Today</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                    <h6>145</h6>
                    <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Revenue <span>| This Month</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-dollar"></i>
                  </div>
                  <div class="ps-3">
                    <h6>$3,264</h6>
                    <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Customers <span>| This Year</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>1244</h6>
                    <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->

          <!-- Reports -->
          <div class="col-12">
            <div class="card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Reports <span>/Today</span></h5>

                <!-- Line Chart -->
                <div id="reportsChart" style="min-height: 365px;"><div id="apexchartsh8d7auqi" class="apexcharts-canvas apexchartsh8d7auqi apexcharts-theme-light" style="width: 981px; height: 350px;"><svg id="SvgjsSvg1001" width="981" height="350" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable hovering-zoom" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><foreignObject x="0" y="0" width="981" height="350"><div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom" xmlns="http://www.w3.org/1999/xhtml" style="inset: auto 0px 1px; position: absolute; max-height: 175px;"><div class="apexcharts-legend-series" rel="1" seriesname="Sales" data:collapsed="false" style="margin: 2px 5px;"><span class="apexcharts-legend-marker" rel="1" data:collapsed="false" style="background: rgb(65, 84, 241) !important; color: rgb(65, 84, 241); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="1" i="0" data:default-text="Sales" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Sales</span></div><div class="apexcharts-legend-series" rel="2" seriesname="Revenue" data:collapsed="false" style="margin: 2px 5px;"><span class="apexcharts-legend-marker" rel="2" data:collapsed="false" style="background: rgb(46, 202, 106) !important; color: rgb(46, 202, 106); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="2" i="1" data:default-text="Revenue" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Revenue</span></div><div class="apexcharts-legend-series" rel="3" seriesname="Customers" data:collapsed="false" style="margin: 2px 5px;"><span class="apexcharts-legend-marker" rel="3" data:collapsed="false" style="background: rgb(255, 119, 29) !important; color: rgb(255, 119, 29); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="3" i="2" data:default-text="Customers" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Customers</span></div></div><style type="text/css">

    .apexcharts-legend {
      display: flex;
      overflow: auto;
      padding: 0 10px;
    }
    .apexcharts-legend.apx-legend-position-bottom, .apexcharts-legend.apx-legend-position-top {
      flex-wrap: wrap
    }
    .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
      flex-direction: column;
      bottom: 0;
    }
    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left, .apexcharts-legend.apx-legend-position-top.apexcharts-align-left, .apexcharts-legend.apx-legend-position-right, .apexcharts-legend.apx-legend-position-left {
      justify-content: flex-start;
    }
    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center, .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
      justify-content: center;
    }
    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right, .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
      justify-content: flex-end;
    }
    .apexcharts-legend-series {
      cursor: pointer;
      line-height: normal;
    }
    .apexcharts-legend.apx-legend-position-bottom .apexcharts-legend-series, .apexcharts-legend.apx-legend-position-top .apexcharts-legend-series{
      display: flex;
      align-items: center;
    }
    .apexcharts-legend-text {
      position: relative;
      font-size: 14px;
    }
    .apexcharts-legend-text *, .apexcharts-legend-marker * {
      pointer-events: none;
    }
    .apexcharts-legend-marker {
      position: relative;
      display: inline-block;
      cursor: pointer;
      margin-right: 3px;
      border-style: solid;
    }

    .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series, .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series{
      display: inline-block;
    }
    .apexcharts-legend-series.apexcharts-no-click {
      cursor: auto;
    }
    .apexcharts-legend .apexcharts-hidden-zero-series, .apexcharts-legend .apexcharts-hidden-null-series {
      display: none !important;
    }
    .apexcharts-inactive-legend {
      opacity: 0.45;
    }</style></foreignObject><g id="SvgjsG1003" class="apexcharts-inner apexcharts-graphical" transform="translate(45.359375, 30)"><defs id="SvgjsDefs1002"><clipPath id="gridRectMaskh8d7auqi"><rect id="SvgjsRect1013" width="931.640625" height="272.2" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskh8d7auqi"></clipPath><clipPath id="nonForecastMaskh8d7auqi"></clipPath><clipPath id="gridRectMarkerMaskh8d7auqi"><rect id="SvgjsRect1014" width="945.640625" height="290.2" x="-10" y="-10" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1032" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1033" stop-opacity="0.3" stop-color="rgba(65,84,241,0.3)" offset="0"></stop><stop id="SvgjsStop1034" stop-opacity="0.4" stop-color="rgba(255,255,255,0.4)" offset="0.9"></stop><stop id="SvgjsStop1035" stop-opacity="0.4" stop-color="rgba(255,255,255,0.4)" offset="1"></stop></linearGradient><linearGradient id="SvgjsLinearGradient1054" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1055" stop-opacity="0.3" stop-color="rgba(46,202,106,0.3)" offset="0"></stop><stop id="SvgjsStop1056" stop-opacity="0.4" stop-color="rgba(255,255,255,0.4)" offset="0.9"></stop><stop id="SvgjsStop1057" stop-opacity="0.4" stop-color="rgba(255,255,255,0.4)" offset="1"></stop></linearGradient><linearGradient id="SvgjsLinearGradient1076" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1077" stop-opacity="0.3" stop-color="rgba(255,119,29,0.3)" offset="0"></stop><stop id="SvgjsStop1078" stop-opacity="0.4" stop-color="rgba(255,255,255,0.4)" offset="0.9"></stop><stop id="SvgjsStop1079" stop-opacity="0.4" stop-color="rgba(255,255,255,0.4)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1009" x1="-0.5" y1="0" x2="-0.5" y2="270.2" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs apexcharts-active" x="-0.5" y="0" width="1" height="270.2" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1082" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1083" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText1085" font-family="Helvetica, Arial, sans-serif" x="0" y="299.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1086">00:00</tspan><title>00:00</title></text><text id="SvgjsText1088" font-family="Helvetica, Arial, sans-serif" x="142.40625000000003" y="299.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1089">01:00</tspan><title>01:00</title></text><text id="SvgjsText1091" font-family="Helvetica, Arial, sans-serif" x="284.81250000000006" y="299.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1092">02:00</tspan><title>02:00</title></text><text id="SvgjsText1094" font-family="Helvetica, Arial, sans-serif" x="427.2187500000001" y="299.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1095">03:00</tspan><title>03:00</title></text><text id="SvgjsText1097" font-family="Helvetica, Arial, sans-serif" x="569.6250000000001" y="299.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1098">04:00</tspan><title>04:00</title></text><text id="SvgjsText1100" font-family="Helvetica, Arial, sans-serif" x="712.0312500000001" y="299.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1101">05:00</tspan><title>05:00</title></text><text id="SvgjsText1103" font-family="Helvetica, Arial, sans-serif" x="854.4375000000001" y="299.2" text-anchor="middle" dominant-baseline="auto" font-size="12px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1104">06:00</tspan><title>06:00</title></text></g><line id="SvgjsLine1105" x1="0" y1="271.2" x2="925.640625" y2="271.2" stroke="#e0e0e0" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"></line></g><g id="SvgjsG1120" class="apexcharts-grid"><g id="SvgjsG1121" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine1130" x1="0" y1="0" x2="925.640625" y2="0" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1131" x1="0" y1="54.04" x2="925.640625" y2="54.04" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1132" x1="0" y1="108.08" x2="925.640625" y2="108.08" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1133" x1="0" y1="162.12" x2="925.640625" y2="162.12" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1134" x1="0" y1="216.16" x2="925.640625" y2="216.16" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1135" x1="0" y1="270.2" x2="925.640625" y2="270.2" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1122" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine1123" x1="0" y1="271.2" x2="0" y2="277.2" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1124" x1="142.40625000000003" y1="271.2" x2="142.40625000000003" y2="277.2" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1125" x1="284.81250000000006" y1="271.2" x2="284.81250000000006" y2="277.2" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1126" x1="427.2187500000001" y1="271.2" x2="427.2187500000001" y2="277.2" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1127" x1="569.6250000000001" y1="271.2" x2="569.6250000000001" y2="277.2" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1128" x1="712.0312500000001" y1="271.2" x2="712.0312500000001" y2="277.2" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1129" x1="854.4375000000001" y1="271.2" x2="854.4375000000001" y2="277.2" stroke="#e0e0e0" stroke-dasharray="0" stroke-linecap="butt" class="apexcharts-xaxis-tick"></line><line id="SvgjsLine1137" x1="0" y1="270.2" x2="925.640625" y2="270.2" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1136" x1="0" y1="1" x2="0" y2="270.2" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1015" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1016" class="apexcharts-series" seriesName="Sales" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1036" d="M0 270.2L0 186.438C74.76328124999999 186.438 138.84609375000002 162.12 213.609375 162.12C263.4515625 162.12 306.1734375 194.54399999999998 356.015625 194.54399999999998C405.8578125 194.54399999999998 448.5796875 132.398 498.421875 132.398C548.2640625 132.398 590.9859375 156.716 640.828125 156.716C690.6703125 156.716 733.3921875 48.635999999999996 783.234375 48.635999999999996C833.0765625 48.635999999999996 875.7984375 118.88799999999998 925.640625 118.88799999999998C925.640625 118.88799999999998 925.640625 118.88799999999998 925.640625 270.2M925.640625 118.88799999999998C925.640625 118.88799999999998 925.640625 118.88799999999998 925.640625 118.88799999999998 " fill="url(#SvgjsLinearGradient1032)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskh8d7auqi)" pathTo="M 0 270.2L 0 186.438C 74.76328124999999 186.438 138.84609375000002 162.12 213.609375 162.12C 263.4515625 162.12 306.1734375 194.54399999999998 356.015625 194.54399999999998C 405.8578125 194.54399999999998 448.5796875 132.398 498.421875 132.398C 548.2640625 132.398 590.9859375 156.716 640.828125 156.716C 690.6703125 156.716 733.3921875 48.635999999999996 783.234375 48.635999999999996C 833.0765625 48.635999999999996 875.7984375 118.88799999999998 925.640625 118.88799999999998C 925.640625 118.88799999999998 925.640625 118.88799999999998 925.640625 270.2M 925.640625 118.88799999999998z" pathFrom="M -1 270.2L -1 270.2L 213.609375 270.2L 356.015625 270.2L 498.421875 270.2L 640.828125 270.2L 783.234375 270.2L 925.640625 270.2"></path><path id="SvgjsPath1037" d="M0 186.438C74.76328124999999 186.438 138.84609375000002 162.12 213.609375 162.12C263.4515625 162.12 306.1734375 194.54399999999998 356.015625 194.54399999999998C405.8578125 194.54399999999998 448.5796875 132.398 498.421875 132.398C548.2640625 132.398 590.9859375 156.716 640.828125 156.716C690.6703125 156.716 733.3921875 48.635999999999996 783.234375 48.635999999999996C833.0765625 48.635999999999996 875.7984375 118.88799999999998 925.640625 118.88799999999998C925.640625 118.88799999999998 925.640625 118.88799999999998 925.640625 118.88799999999998 " fill="none" fill-opacity="1" stroke="#4154f1" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskh8d7auqi)" pathTo="M 0 186.438C 74.76328124999999 186.438 138.84609375000002 162.12 213.609375 162.12C 263.4515625 162.12 306.1734375 194.54399999999998 356.015625 194.54399999999998C 405.8578125 194.54399999999998 448.5796875 132.398 498.421875 132.398C 548.2640625 132.398 590.9859375 156.716 640.828125 156.716C 690.6703125 156.716 733.3921875 48.635999999999996 783.234375 48.635999999999996C 833.0765625 48.635999999999996 875.7984375 118.88799999999998 925.640625 118.88799999999998" pathFrom="M -1 270.2L -1 270.2L 213.609375 270.2L 356.015625 270.2L 498.421875 270.2L 640.828125 270.2L 783.234375 270.2L 925.640625 270.2"></path><g id="SvgjsG1017" class="apexcharts-series-markers-wrap" data:realIndex="0"><g id="SvgjsG1019" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh8d7auqi)"><circle id="SvgjsCircle1020" r="10" cx="0" cy="186.438" class="apexcharts-marker no-pointer-events wqnivnegt" stroke="#ffffff" fill="#4154f1" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="0" j="0" index="0" default-marker-size="4"></circle><circle id="SvgjsCircle1021" r="4" cx="213.609375" cy="162.12" class="apexcharts-marker no-pointer-events websvjkq4" stroke="#ffffff" fill="#4154f1" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="1" j="1" index="0" default-marker-size="4"></circle></g><g id="SvgjsG1022" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh8d7auqi)"><circle id="SvgjsCircle1023" r="4" cx="356.015625" cy="194.54399999999998" class="apexcharts-marker no-pointer-events w7lcza8np" stroke="#ffffff" fill="#4154f1" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="2" j="2" index="0" default-marker-size="4"></circle></g><g id="SvgjsG1024" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh8d7auqi)"><circle id="SvgjsCircle1025" r="4" cx="498.421875" cy="132.398" class="apexcharts-marker no-pointer-events wueg8l3h9" stroke="#ffffff" fill="#4154f1" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="3" j="3" index="0" default-marker-size="4"></circle></g><g id="SvgjsG1026" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh8d7auqi)"><circle id="SvgjsCircle1027" r="4" cx="640.828125" cy="156.716" class="apexcharts-marker no-pointer-events wn7jy6xjp" stroke="#ffffff" fill="#4154f1" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="4" j="4" index="0" default-marker-size="4"></circle></g><g id="SvgjsG1028" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh8d7auqi)"><circle id="SvgjsCircle1029" r="4" cx="783.234375" cy="48.635999999999996" class="apexcharts-marker no-pointer-events wckkxo9l4" stroke="#ffffff" fill="#4154f1" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="5" j="5" index="0" default-marker-size="4"></circle></g><g id="SvgjsG1030" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh8d7auqi)"><circle id="SvgjsCircle1031" r="4" cx="925.640625" cy="118.88799999999998" class="apexcharts-marker no-pointer-events wgpckvtvu" stroke="#ffffff" fill="#4154f1" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="6" j="6" index="0" default-marker-size="4"></circle></g></g></g><g id="SvgjsG1038" class="apexcharts-series" seriesName="Revenue" data:longestSeries="true" rel="2" data:realIndex="1"><path id="SvgjsPath1058" d="M0 270.2L0 240.47799999999998C74.76328124999999 240.47799999999998 138.84609375000002 183.736 213.609375 183.736C263.4515625 183.736 306.1734375 148.60999999999999 356.015625 148.60999999999999C405.8578125 148.60999999999999 448.5796875 183.736 498.421875 183.736C548.2640625 183.736 590.9859375 178.332 640.828125 178.332C690.6703125 178.332 733.3921875 129.696 783.234375 129.696C833.0765625 129.696 875.7984375 159.418 925.640625 159.418C925.640625 159.418 925.640625 159.418 925.640625 270.2M925.640625 159.418C925.640625 159.418 925.640625 159.418 925.640625 159.418 " fill="url(#SvgjsLinearGradient1054)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="1" clip-path="url(#gridRectMaskh8d7auqi)" pathTo="M 0 270.2L 0 240.47799999999998C 74.76328124999999 240.47799999999998 138.84609375000002 183.736 213.609375 183.736C 263.4515625 183.736 306.1734375 148.60999999999999 356.015625 148.60999999999999C 405.8578125 148.60999999999999 448.5796875 183.736 498.421875 183.736C 548.2640625 183.736 590.9859375 178.332 640.828125 178.332C 690.6703125 178.332 733.3921875 129.696 783.234375 129.696C 833.0765625 129.696 875.7984375 159.418 925.640625 159.418C 925.640625 159.418 925.640625 159.418 925.640625 270.2M 925.640625 159.418z" pathFrom="M -1 270.2L -1 270.2L 213.609375 270.2L 356.015625 270.2L 498.421875 270.2L 640.828125 270.2L 783.234375 270.2L 925.640625 270.2"></path><path id="SvgjsPath1059" d="M0 240.47799999999998C74.76328124999999 240.47799999999998 138.84609375000002 183.736 213.609375 183.736C263.4515625 183.736 306.1734375 148.60999999999999 356.015625 148.60999999999999C405.8578125 148.60999999999999 448.5796875 183.736 498.421875 183.736C548.2640625 183.736 590.9859375 178.332 640.828125 178.332C690.6703125 178.332 733.3921875 129.696 783.234375 129.696C833.0765625 129.696 875.7984375 159.418 925.640625 159.418C925.640625 159.418 925.640625 159.418 925.640625 159.418 " fill="none" fill-opacity="1" stroke="#2eca6a" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="1" clip-path="url(#gridRectMaskh8d7auqi)" pathTo="M 0 240.47799999999998C 74.76328124999999 240.47799999999998 138.84609375000002 183.736 213.609375 183.736C 263.4515625 183.736 306.1734375 148.60999999999999 356.015625 148.60999999999999C 405.8578125 148.60999999999999 448.5796875 183.736 498.421875 183.736C 548.2640625 183.736 590.9859375 178.332 640.828125 178.332C 690.6703125 178.332 733.3921875 129.696 783.234375 129.696C 833.0765625 129.696 875.7984375 159.418 925.640625 159.418" pathFrom="M -1 270.2L -1 270.2L 213.609375 270.2L 356.015625 270.2L 498.421875 270.2L 640.828125 270.2L 783.234375 270.2L 925.640625 270.2"></path><g id="SvgjsG1039" class="apexcharts-series-markers-wrap" data:realIndex="1"><g id="SvgjsG1041" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh8d7auqi)"><circle id="SvgjsCircle1042" r="10" cx="0" cy="240.47799999999998" class="apexcharts-marker no-pointer-events w4jj33yfq" stroke="#ffffff" fill="#2eca6a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="0" j="0" index="1" default-marker-size="4"></circle><circle id="SvgjsCircle1043" r="4" cx="213.609375" cy="183.736" class="apexcharts-marker no-pointer-events wa0wul258g" stroke="#ffffff" fill="#2eca6a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="1" j="1" index="1" default-marker-size="4"></circle></g><g id="SvgjsG1044" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh8d7auqi)"><circle id="SvgjsCircle1045" r="4" cx="356.015625" cy="148.60999999999999" class="apexcharts-marker no-pointer-events w1j8hh63rf" stroke="#ffffff" fill="#2eca6a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="2" j="2" index="1" default-marker-size="4"></circle></g><g id="SvgjsG1046" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh8d7auqi)"><circle id="SvgjsCircle1047" r="4" cx="498.421875" cy="183.736" class="apexcharts-marker no-pointer-events w52y4g8u5" stroke="#ffffff" fill="#2eca6a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="3" j="3" index="1" default-marker-size="4"></circle></g><g id="SvgjsG1048" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh8d7auqi)"><circle id="SvgjsCircle1049" r="4" cx="640.828125" cy="178.332" class="apexcharts-marker no-pointer-events wbm9g4aib" stroke="#ffffff" fill="#2eca6a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="4" j="4" index="1" default-marker-size="4"></circle></g><g id="SvgjsG1050" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh8d7auqi)"><circle id="SvgjsCircle1051" r="4" cx="783.234375" cy="129.696" class="apexcharts-marker no-pointer-events w4698vjbj" stroke="#ffffff" fill="#2eca6a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="5" j="5" index="1" default-marker-size="4"></circle></g><g id="SvgjsG1052" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh8d7auqi)"><circle id="SvgjsCircle1053" r="4" cx="925.640625" cy="159.418" class="apexcharts-marker no-pointer-events wujuazjnn" stroke="#ffffff" fill="#2eca6a" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="6" j="6" index="1" default-marker-size="4"></circle></g></g></g><g id="SvgjsG1060" class="apexcharts-series" seriesName="Customers" data:longestSeries="true" rel="3" data:realIndex="2"><path id="SvgjsPath1080" d="M0 270.2L0 229.67C74.76328124999999 229.67 138.84609375000002 240.47799999999998 213.609375 240.47799999999998C263.4515625 240.47799999999998 306.1734375 183.736 356.015625 183.736C405.8578125 183.736 448.5796875 221.564 498.421875 221.564C548.2640625 221.564 590.9859375 245.88199999999998 640.828125 245.88199999999998C690.6703125 245.88199999999998 733.3921875 205.35199999999998 783.234375 205.35199999999998C833.0765625 205.35199999999998 875.7984375 240.47799999999998 925.640625 240.47799999999998C925.640625 240.47799999999998 925.640625 240.47799999999998 925.640625 270.2M925.640625 240.47799999999998C925.640625 240.47799999999998 925.640625 240.47799999999998 925.640625 240.47799999999998 " fill="url(#SvgjsLinearGradient1076)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="2" clip-path="url(#gridRectMaskh8d7auqi)" pathTo="M 0 270.2L 0 229.67C 74.76328124999999 229.67 138.84609375000002 240.47799999999998 213.609375 240.47799999999998C 263.4515625 240.47799999999998 306.1734375 183.736 356.015625 183.736C 405.8578125 183.736 448.5796875 221.564 498.421875 221.564C 548.2640625 221.564 590.9859375 245.88199999999998 640.828125 245.88199999999998C 690.6703125 245.88199999999998 733.3921875 205.35199999999998 783.234375 205.35199999999998C 833.0765625 205.35199999999998 875.7984375 240.47799999999998 925.640625 240.47799999999998C 925.640625 240.47799999999998 925.640625 240.47799999999998 925.640625 270.2M 925.640625 240.47799999999998z" pathFrom="M -1 270.2L -1 270.2L 213.609375 270.2L 356.015625 270.2L 498.421875 270.2L 640.828125 270.2L 783.234375 270.2L 925.640625 270.2"></path><path id="SvgjsPath1081" d="M0 229.67C74.76328124999999 229.67 138.84609375000002 240.47799999999998 213.609375 240.47799999999998C263.4515625 240.47799999999998 306.1734375 183.736 356.015625 183.736C405.8578125 183.736 448.5796875 221.564 498.421875 221.564C548.2640625 221.564 590.9859375 245.88199999999998 640.828125 245.88199999999998C690.6703125 245.88199999999998 733.3921875 205.35199999999998 783.234375 205.35199999999998C833.0765625 205.35199999999998 875.7984375 240.47799999999998 925.640625 240.47799999999998C925.640625 240.47799999999998 925.640625 240.47799999999998 925.640625 240.47799999999998 " fill="none" fill-opacity="1" stroke="#ff771d" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="2" clip-path="url(#gridRectMaskh8d7auqi)" pathTo="M 0 229.67C 74.76328124999999 229.67 138.84609375000002 240.47799999999998 213.609375 240.47799999999998C 263.4515625 240.47799999999998 306.1734375 183.736 356.015625 183.736C 405.8578125 183.736 448.5796875 221.564 498.421875 221.564C 548.2640625 221.564 590.9859375 245.88199999999998 640.828125 245.88199999999998C 690.6703125 245.88199999999998 733.3921875 205.35199999999998 783.234375 205.35199999999998C 833.0765625 205.35199999999998 875.7984375 240.47799999999998 925.640625 240.47799999999998" pathFrom="M -1 270.2L -1 270.2L 213.609375 270.2L 356.015625 270.2L 498.421875 270.2L 640.828125 270.2L 783.234375 270.2L 925.640625 270.2"></path><g id="SvgjsG1061" class="apexcharts-series-markers-wrap" data:realIndex="2"><g id="SvgjsG1063" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh8d7auqi)"><circle id="SvgjsCircle1064" r="10" cx="0" cy="229.67" class="apexcharts-marker no-pointer-events w61w12p28" stroke="#ffffff" fill="#ff771d" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="0" j="0" index="2" default-marker-size="4"></circle><circle id="SvgjsCircle1065" r="4" cx="213.609375" cy="240.47799999999998" class="apexcharts-marker no-pointer-events w8tmpq7ma" stroke="#ffffff" fill="#ff771d" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="1" j="1" index="2" default-marker-size="4"></circle></g><g id="SvgjsG1066" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh8d7auqi)"><circle id="SvgjsCircle1067" r="4" cx="356.015625" cy="183.736" class="apexcharts-marker no-pointer-events wdbsqmnqnf" stroke="#ffffff" fill="#ff771d" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="2" j="2" index="2" default-marker-size="4"></circle></g><g id="SvgjsG1068" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh8d7auqi)"><circle id="SvgjsCircle1069" r="4" cx="498.421875" cy="221.564" class="apexcharts-marker no-pointer-events w1706e6li" stroke="#ffffff" fill="#ff771d" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="3" j="3" index="2" default-marker-size="4"></circle></g><g id="SvgjsG1070" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh8d7auqi)"><circle id="SvgjsCircle1071" r="4" cx="640.828125" cy="245.88199999999998" class="apexcharts-marker no-pointer-events w7cfeefvp" stroke="#ffffff" fill="#ff771d" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="4" j="4" index="2" default-marker-size="4"></circle></g><g id="SvgjsG1072" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh8d7auqi)"><circle id="SvgjsCircle1073" r="4" cx="783.234375" cy="205.35199999999998" class="apexcharts-marker no-pointer-events whi4l2kurk" stroke="#ffffff" fill="#ff771d" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="5" j="5" index="2" default-marker-size="4"></circle></g><g id="SvgjsG1074" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskh8d7auqi)"><circle id="SvgjsCircle1075" r="4" cx="925.640625" cy="240.47799999999998" class="apexcharts-marker no-pointer-events wusjspqgvk" stroke="#ffffff" fill="#ff771d" fill-opacity="1" stroke-width="2" stroke-opacity="0.9" rel="6" j="6" index="2" default-marker-size="4"></circle></g></g></g><g id="SvgjsG1018" class="apexcharts-datalabels" data:realIndex="0"></g><g id="SvgjsG1040" class="apexcharts-datalabels" data:realIndex="1"></g><g id="SvgjsG1062" class="apexcharts-datalabels" data:realIndex="2"></g></g><line id="SvgjsLine1138" x1="0" y1="0" x2="925.640625" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1139" x1="0" y1="0" x2="925.640625" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1140" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1141" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1142" class="apexcharts-point-annotations"></g><rect id="SvgjsRect1143" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect><rect id="SvgjsRect1144" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect></g><rect id="SvgjsRect1008" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1106" class="apexcharts-yaxis" rel="0" transform="translate(15.359375, 0)"><g id="SvgjsG1107" class="apexcharts-yaxis-texts-g"><text id="SvgjsText1108" font-family="Helvetica, Arial, sans-serif" x="20" y="31.5" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1109">100</tspan><title>100</title></text><text id="SvgjsText1110" font-family="Helvetica, Arial, sans-serif" x="20" y="85.53999999999999" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1111">80</tspan><title>80</title></text><text id="SvgjsText1112" font-family="Helvetica, Arial, sans-serif" x="20" y="139.57999999999998" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1113">60</tspan><title>60</title></text><text id="SvgjsText1114" font-family="Helvetica, Arial, sans-serif" x="20" y="193.61999999999998" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1115">40</tspan><title>40</title></text><text id="SvgjsText1116" font-family="Helvetica, Arial, sans-serif" x="20" y="247.65999999999997" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1117">20</tspan><title>20</title></text><text id="SvgjsText1118" font-family="Helvetica, Arial, sans-serif" x="20" y="301.7" text-anchor="end" dominant-baseline="auto" font-size="11px" font-weight="400" fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1119">0</tspan><title>0</title></text></g></g><g id="SvgjsG1004" class="apexcharts-annotations"></g></svg><div class="apexcharts-tooltip apexcharts-theme-light apexcharts-active" style="left: 60.3594px; top: 164.2px;"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">19/09/18 00:00</div><div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(65, 84, 241);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Sales: </span><span class="apexcharts-tooltip-text-y-value">31</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 2; display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(46, 202, 106);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Revenue: </span><span class="apexcharts-tooltip-text-y-value">11</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 3; display: flex;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(255, 119, 29);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Customers: </span><span class="apexcharts-tooltip-text-y-value">15</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light apexcharts-active" style="left: -19.0703px; top: 302.2px;"><div class="apexcharts-xaxistooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px; min-width: 106.867px;">19/09/18 00:00</div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>

                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    new ApexCharts(document.querySelector("#reportsChart"), {
                      series: [{
                        name: 'Sales',
                        data: [31, 40, 28, 51, 42, 82, 56],
                      }, {
                        name: 'Revenue',
                        data: [11, 32, 45, 32, 34, 52, 41]
                      }, {
                        name: 'Customers',
                        data: [15, 11, 32, 18, 9, 24, 11]
                      }],
                      chart: {
                        height: 350,
                        type: 'area',
                        toolbar: {
                          show: false
                        },
                      },
                      markers: {
                        size: 4
                      },
                      colors: ['#4154f1', '#2eca6a', '#ff771d'],
                      fill: {
                        type: "gradient",
                        gradient: {
                          shadeIntensity: 1,
                          opacityFrom: 0.3,
                          opacityTo: 0.4,
                          stops: [0, 90, 100]
                        }
                      },
                      dataLabels: {
                        enabled: false
                      },
                      stroke: {
                        curve: 'smooth',
                        width: 2
                      },
                      xaxis: {
                        type: 'datetime',
                        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                      },
                      tooltip: {
                        x: {
                          format: 'dd/MM/yy HH:mm'
                        },
                      }
                    }).render();
                  });
                </script>
                <!-- End Line Chart -->

              </div>

            </div>
          </div><!-- End Reports -->

          <!-- Recent Sales -->
          <div class="col-12">
            <div class="card recent-sales overflow-auto">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns"><div class="dataTable-top"><div class="dataTable-dropdown"><label><select class="dataTable-selector"><option value="5">5</option><option value="10" selected="">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option></select> entries per page</label></div><div class="dataTable-search"><input class="dataTable-input" placeholder="Search..." type="text"></div></div><div class="dataTable-container"><table class="table table-borderless datatable dataTable-table">
                  <thead>
                    <tr><th scope="col" data-sortable="" style="width: 10.9111%;"><a href="#" class="dataTable-sorter">#</a></th><th scope="col" data-sortable="" style="width: 23.9635%;"><a href="#" class="dataTable-sorter">Customer</a></th><th scope="col" data-sortable="" style="width: 40.1772%;"><a href="#" class="dataTable-sorter">Product</a></th><th scope="col" data-sortable="" style="width: 9.89134%;"><a href="#" class="dataTable-sorter">Price</a></th><th scope="col" data-sortable="" style="width: 15.0919%;"><a href="#" class="dataTable-sorter">Status</a></th></tr>
                  </thead>
                  <tbody><tr><th scope="row"><a href="#">#2457</a></th><td>Brandon Jacob</td><td><a href="#" class="text-primary">At praesentium minu</a></td><td>$64</td><td><span class="badge bg-success">Approved</span></td></tr><tr><th scope="row"><a href="#">#2147</a></th><td>Bridie Kessler</td><td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td><td>$47</td><td><span class="badge bg-warning">Pending</span></td></tr><tr><th scope="row"><a href="#">#2049</a></th><td>Ashleigh Langosh</td><td><a href="#" class="text-primary">At recusandae consectetur</a></td><td>$147</td><td><span class="badge bg-success">Approved</span></td></tr><tr><th scope="row"><a href="#">#2644</a></th><td>Angus Grady</td><td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td><td>$67</td><td><span class="badge bg-danger">Rejected</span></td></tr><tr><th scope="row"><a href="#">#2644</a></th><td>Raheem Lehner</td><td><a href="#" class="text-primary">Sunt similique distinctio</a></td><td>$165</td><td><span class="badge bg-success">Approved</span></td></tr></tbody>
                </table></div><div class="dataTable-bottom"><div class="dataTable-info">Showing 1 to 5 of 5 entries</div><nav class="dataTable-pagination"><ul class="dataTable-pagination-list"></ul></nav></div></div>

              </div>

            </div>
          </div><!-- End Recent Sales -->

          <!-- Top Selling -->
          <div class="col-12">
            <div class="card top-selling overflow-auto">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body pb-0">
                <h5 class="card-title">Top Selling <span>| Today</span></h5>

                <table class="table table-borderless">
                  <thead>
                    <tr>
                      <th scope="col">Preview</th>
                      <th scope="col">Product</th>
                      <th scope="col">Price</th>
                      <th scope="col">Sold</th>
                      <th scope="col">Revenue</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row"><a href="#"><img src="assets/img/product-1.jpg" alt=""></a></th>
                      <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</a></td>
                      <td>$64</td>
                      <td class="fw-bold">124</td>
                      <td>$5,828</td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#"><img src="assets/img/product-2.jpg" alt=""></a></th>
                      <td><a href="#" class="text-primary fw-bold">Exercitationem similique doloremque</a></td>
                      <td>$46</td>
                      <td class="fw-bold">98</td>
                      <td>$4,508</td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>
                      <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>
                      <td>$59</td>
                      <td class="fw-bold">74</td>
                      <td>$4,366</td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#"><img src="assets/img/product-4.jpg" alt=""></a></th>
                      <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>
                      <td>$32</td>
                      <td class="fw-bold">63</td>
                      <td>$2,016</td>
                    </tr>
                    <tr>
                      <th scope="row"><a href="#"><img src="assets/img/product-5.jpg" alt=""></a></th>
                      <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>
                      <td>$79</td>
                      <td class="fw-bold">41</td>
                      <td>$3,239</td>
                    </tr>
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Top Selling -->

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">

        <!-- Recent Activity -->
        <div class="card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body">
            <h5 class="card-title">Recent Activity <span>| Today</span></h5>

            <div class="activity">

              <div class="activity-item d-flex">
                <div class="activite-label">32 min</div>
                <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
                <div class="activity-content">
                  Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label">56 min</div>
                <i class="bi bi-circle-fill activity-badge text-danger align-self-start"></i>
                <div class="activity-content">
                  Voluptatem blanditiis blanditiis eveniet
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label">2 hrs</div>
                <i class="bi bi-circle-fill activity-badge text-primary align-self-start"></i>
                <div class="activity-content">
                  Voluptates corrupti molestias voluptatem
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label">1 day</div>
                <i class="bi bi-circle-fill activity-badge text-info align-self-start"></i>
                <div class="activity-content">
                  Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label">2 days</div>
                <i class="bi bi-circle-fill activity-badge text-warning align-self-start"></i>
                <div class="activity-content">
                  Est sit eum reiciendis exercitationem
                </div>
              </div><!-- End activity item-->

              <div class="activity-item d-flex">
                <div class="activite-label">4 weeks</div>
                <i class="bi bi-circle-fill activity-badge text-muted align-self-start"></i>
                <div class="activity-content">
                  Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                </div>
              </div><!-- End activity item-->

            </div>

          </div>
        </div><!-- End Recent Activity -->

        <!-- Budget Report -->
        <div class="card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body pb-0">
            <h5 class="card-title">Budget Report <span>| This Month</span></h5>

            <div id="budgetChart" style="min-height: 400px; -webkit-tap-highlight-color: transparent; user-select: none;" class="echart" _echarts_instance_="ec_1647247689529"><div style="position: relative; width: 458px; height: 400px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="458" height="400" style="position: absolute; left: 0px; top: 0px; width: 458px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                  legend: {
                    data: ['Allocated Budget', 'Actual Spending']
                  },
                  radar: {
                    // shape: 'circle',
                    indicator: [{
                        name: 'Sales',
                        max: 6500
                      },
                      {
                        name: 'Administration',
                        max: 16000
                      },
                      {
                        name: 'Information Technology',
                        max: 30000
                      },
                      {
                        name: 'Customer Support',
                        max: 38000
                      },
                      {
                        name: 'Development',
                        max: 52000
                      },
                      {
                        name: 'Marketing',
                        max: 25000
                      }
                    ]
                  },
                  series: [{
                    name: 'Budget vs spending',
                    type: 'radar',
                    data: [{
                        value: [4200, 3000, 20000, 35000, 50000, 18000],
                        name: 'Allocated Budget'
                      },
                      {
                        value: [5000, 14000, 28000, 26000, 42000, 21000],
                        name: 'Actual Spending'
                      }
                    ]
                  }]
                });
              });
            </script>

          </div>
        </div><!-- End Budget Report -->

        <!-- Website Traffic -->
        <div class="card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body pb-0">
            <h5 class="card-title">Website Traffic <span>| Today</span></h5>

            <div id="trafficChart" style="min-height: 400px; -webkit-tap-highlight-color: transparent; user-select: none; position: relative;" class="echart" _echarts_instance_="ec_1647247689530"><div style="position: relative; width: 458px; height: 400px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="458" height="400" style="position: absolute; left: 0px; top: 0px; width: 458px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div><div class=""></div></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                echarts.init(document.querySelector("#trafficChart")).setOption({
                  tooltip: {
                    trigger: 'item'
                  },
                  legend: {
                    top: '5%',
                    left: 'center'
                  },
                  series: [{
                    name: 'Access From',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                      show: false,
                      position: 'center'
                    },
                    emphasis: {
                      label: {
                        show: true,
                        fontSize: '18',
                        fontWeight: 'bold'
                      }
                    },
                    labelLine: {
                      show: false
                    },
                    data: [{
                        value: 1048,
                        name: 'Search Engine'
                      },
                      {
                        value: 735,
                        name: 'Direct'
                      },
                      {
                        value: 580,
                        name: 'Email'
                      },
                      {
                        value: 484,
                        name: 'Union Ads'
                      },
                      {
                        value: 300,
                        name: 'Video Ads'
                      }
                    ]
                  }]
                });
              });
            </script>

          </div>
        </div><!-- End Website Traffic -->

        <!-- News & Updates Traffic -->
        <div class="card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body pb-0">
            <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

            <div class="news">
              <div class="post-item clearfix">
                <img src="assets/img/news-1.jpg" alt="">
                <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
              </div>

              <div class="post-item clearfix">
                <img src="assets/img/news-2.jpg" alt="">
                <h4><a href="#">Quidem autem et impedit</a></h4>
                <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...</p>
              </div>

              <div class="post-item clearfix">
                <img src="assets/img/news-3.jpg" alt="">
                <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
                <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...</p>
              </div>

              <div class="post-item clearfix">
                <img src="assets/img/news-4.jpg" alt="">
                <h4><a href="#">Laborum corporis quo dara net para</a></h4>
                <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...</p>
              </div>

              <div class="post-item clearfix">
                <img src="assets/img/news-5.jpg" alt="">
                <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
                <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos eius...</p>
              </div>

            </div><!-- End sidebar recent posts-->

          </div>
        </div><!-- End News & Updates -->

      </div><!-- End Right side columns -->

    </div>
  </section>

@endsection
