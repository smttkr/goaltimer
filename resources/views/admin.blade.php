@extends('layouts.default')

@section('title')
GoalTimer Admin
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('page-title')
ADMIN
@endsection

@section('content')
<table class="goal-table">
    <tr>
        <thead>
            <th>目標</th>
            <th>設定時間</th>
            <th>作成日</th>
            <th>編集</th>
            <th>削除</th>
        </thead>
    </tr>
    <tbody>
        <tr id="usually" class=''>
            <td>{{ $goal ->goal_name }}
                @error('goal_name')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </td>
            <td>{{ $goal ->getGoalTime() }}
                @error('goal_time')
                <p class="error-message">{{ $message }}</p>
                @enderror
            </td>
            <td>{{ $goal ->created_at ->format('Y-m-d') }}
            </td>
            <td><button id="update" class="button-outline">update</button></td>
            <td>
                <form action="{{ url('GoalController/delete',$goal ->id) }}" method="post" onSubmit="return checkSubmit()">
                    @method("delete")
                    @csrf
                    <button id="delete" class="button-outline" type="submit">delete</button>
                </form>
            </td>
        </tr>
        <tr id="on-edit" class='hidden'>
            <form action="{{ url('GoalController/update/goal_name',$goal ->id) }}" method="post">
                @method('PUT')
                @csrf
                <td>
                    <input type="text" name="goal_name" value="{{ $goal ->goal_name }}">
                    <button type="submit">変更</button>
                </td>
            </form>
            <form action="{{ url('GoalController/update/goal_time',$goal ->id) }}" method="post">
                @method('PUT')
                @csrf
                <td>
                    <input type="text" name="goal_time" value="{{ $goal ->getGoalTime() }}">
                    <button type="submit">変更</button>
                </td>
            </form>
            </form>
            <td>
                {{ $goal ->created_at ->format('Y-m-d') }}
            </td>
            <td>
                <button id='back' class='button-outline'>戻る</button>
            </td>
            <td></td>
        </tr>
    </tbody>
</table>

    <table class="record-table">
        <thead>
            <tr>
                <th class="day-th">日付(今月)</th>
                <th class="time-th">時間</th>
            </tr>
        </thead>
        <tbody class="record-tbody">
            @foreach($records as $record)
            @php
            $i+=1;
            @endphp
            <tr id="record-raw-{{ $i }}" class="record-raw {{ hideSome($i) }}">
                <td>{{ $record ->created_at ->format('Y-m-d')}}</td>
                <td>{{ convertTime($record ->time_record) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tr class="btn">
            <td>
                <button class='button-outline' id="more">more</button>
                <button class='button-outline hidden' id='close'>close</button>
            </td>
            <td>
                <button class='button-outline' id='detail'>
                    <a href="{{ url('/TimeRecordController/show',$goal ->id) }}">詳細</a>
                </button>
            </td>
        </tr>
    </table>
<script src="{{ asset('js/admin.js') }}"></script>
@endsection
