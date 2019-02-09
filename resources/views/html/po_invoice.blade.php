@extends('header_footer.master')


@section('meta')
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('title','Po Invoices')

@section('css')
{{-- Extra CSS LINKS --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
@endsection
        @section('body')

        {{-- HTML --}}

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">PO Invoices</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        @endsection


        @section('js')

        {{-- JAVASCRIPT --}}

        @endsection