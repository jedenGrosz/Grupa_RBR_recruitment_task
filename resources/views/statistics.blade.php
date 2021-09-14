@extends('layouts.main')

@section('title', 'Statistics')

@section('content')

    <div class="bg-light p-5 rounded-lg m-3">
        <h1 class="display-4">The most active users</h1>
        <hr class="my-4">
        <div id="chart" style="height: 300px;"></div>
    </div>
    <!-- Chart's container -->
    <!-- Charting library -->
    <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
    <!-- Your application script -->
    <script>
      const chart = new Chartisan({
        el: '#chart',
        url: "@chart('sample_chart')",
      });
    </script>
    </div>
    
@endsection