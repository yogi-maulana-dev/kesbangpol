@extends('layouts.main_login_admin')

@section('admin_dashboard')

<style>
    .modal {
        overflow-y: auto;
    }

</style>

<div class="col-lg-3 col-md-6">
    <div class="card bg-c-blue total-card">
        <div class="card-block">
            <div class="text-left">
                <h4>4000</h4>
                <p class="m-0">Total Sales</p>
            </div>
            <span class="label bg-c-blue value-badges">12%</span>
        </div>
        <div id="total-value-graph-1" style="height: 100px; padding: 0px; position: relative;"><canvas class="flot-base" width="247" height="100" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 247.203px; height: 100px;"></canvas>
            <div class="flot-text" style="position: absolute; inset: 0px; font-size: smaller; color: rgb(84, 84, 84);">
                <div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; inset: 0px;">
                    <div style="position: absolute; max-width: 41px; top: 100px; font: 400 0px / 0px &quot;Open Sans&quot;, sans-serif; color: transparent; left: 0px; text-align: center;">0</div>
                    <div style="position: absolute; max-width: 41px; top: 100px; font: 400 0px / 0px &quot;Open Sans&quot;, sans-serif; color: transparent; left: 55px; text-align: center;">20</div>
                    <div style="position: absolute; max-width: 41px; top: 100px; font: 400 0px / 0px &quot;Open Sans&quot;, sans-serif; color: transparent; left: 110px; text-align: center;">40</div>
                    <div style="position: absolute; max-width: 41px; top: 100px; font: 400 0px / 0px &quot;Open Sans&quot;, sans-serif; color: transparent; left: 165px; text-align: center;">60</div>
                    <div style="position: absolute; max-width: 41px; top: 100px; font: 400 0px / 0px &quot;Open Sans&quot;, sans-serif; color: transparent; left: 220px; text-align: center;">80</div>
                </div>
                <div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; inset: 0px;">
                    <div style="position: absolute; top: 100px; font: 400 0px / 0px &quot;Open Sans&quot;, sans-serif; color: transparent; left: 0px; text-align: right;">0</div>
                    <div style="position: absolute; top: 67px; font: 400 0px / 0px &quot;Open Sans&quot;, sans-serif; color: transparent; left: 0px; text-align: right;">10</div>
                    <div style="position: absolute; top: 33px; font: 400 0px / 0px &quot;Open Sans&quot;, sans-serif; color: transparent; left: 0px; text-align: right;">20</div>
                    <div style="position: absolute; top: 0px; font: 400 0px / 0px &quot;Open Sans&quot;, sans-serif; color: transparent; left: 0px; text-align: right;">30</div>
                </div>
            </div><canvas class="flot-overlay" width="247" height="100" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 247.203px; height: 100px;"></canvas>
        </div>
    </div>
</div>

@endsection
