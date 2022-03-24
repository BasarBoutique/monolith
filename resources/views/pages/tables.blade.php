
@extends('home')

@push('css')
  <link rel="stylesheet" href="{{ asset("/css/checkbox.css") }}">
@endpush

@section('content')

  <div id="app">
    <layout-navbars-siderbar></layout-navbars-siderbar>
    <div class="main-content" id="panel">
      <layout-navbars-navs-auth></layout-navbars-navs-auth>

      <category-table></category-table>

    </div>
  </div>

@endsection


@push('js')
<script src="{{ asset("/js/uploads.js") }}"></script>
@endpush