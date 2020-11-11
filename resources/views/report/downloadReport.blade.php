<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        .table {
            display: table;
            width: 100%;
            border-collapse: collapse;
        }

        .table-row {
            display: table-row;
        }

        .table-cell {
            display: table-cell;
            border: 1px solid black;
            padding: 1em;
        }
    </style>
</head>

<body>
    <div class="table">
        <div class="table-row">
            <div class="table-cell"><b>COLLECTOR</b></div>
            <div class="table-cell"><b>COLLECTED AMOUNT:</b></div>
            <div class="table-cell"><b>WITHDRAWN AMOUNT:</b></div>
            <div class="table-cell"><b>CLIENT NAME</b></div>
            <div class="table-cell"><b>COLLECTED DATE</b></div>
        </div>
        @foreach($data as $datum)
        <div class="table-row">
            <div class="table-cell">{{$datum['collected_by']}}</div>
            <div class="table-cell">{{$datum['deposited_amount']}}</div>
            <div class="table-cell">{{$datum['withdrawn_amount']}}</div>
            <div class="table-cell">{{$datum['client_name']}}</div>
            <div class="table-cell">{{$datum['collected_date']}}</div>
        </div>
        @endforeach
    </div>
</body>

</html>