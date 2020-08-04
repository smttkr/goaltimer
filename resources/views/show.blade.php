@extends('layouts.default')

@section('title')
GoalTimer show
@endsection

@section('style')

<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('page-title')
RECORD DETAILS
@endsection

@section('content')
<table>
  <thead>
    <tr>
      <th>
        <h2>
          <a href="{{ url('GoalController/show',$goal->id) }}">{{ $goal->goal_name }}</a>
        </h2>
      </th>
    </tr>
    <tr>
      <th class="day">日付</th>
      <th class="time">時間</th>
      <th class="delete"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($timeRecords as $timeRecord)
    @php
    $i +=1
    @endphp
    <tr>
      <td>
        <a href="#" id="{{ 'day'.$i }}" onclick="event.preventDefault();
        document.getElementById('form-'+event.target.id).classList.toggle('hidden');">
          {{ $timeRecord -> created_at->format('Y-m-d')}}
        </a>
        <form action="{{ url('TimeRecordController/update/created_at',$timeRecord->id) }}" method="POST" id="{{ 'form-day'.$i }}" class="hidden">
          @method('PUT')
          @csrf
          <input class='input' name='created_at' type="text">
          <button type="submit" class="edit-btn">変更</button>
        </form>
        @error('created_at')
        <p class="error-message">{{ $message }}</p>
        @enderror
      </td>
      <td>
        <a href="#" id="{{ 'time'.$i }}" onclick="event.preventDefault();
        document.getElementById('form-'+event.target.id).classList.toggle('hidden');">
          {{ convertTime($timeRecord->time_record) }}
        </a>
        <form action="{{ url('TimeRecordController/update/time_record',$timeRecord->id) }}" method="POST" id="{{ 'form-time'.$i }}" class="hidden">
          @method('PUT')
          @csrf
          <input class='input' name='time_record' type="text">
          <button type="submit" class="edit-btn">変更</button>
        </form>
        @error('time_record')
        <p class="error-message">{{ $message }}</p>
        @enderror
      </td>
      <td>
        <form action="{{ url('TimeRecordController/delete',$timeRecord->id) }}" method="POST" onSubmit="return checkSubmit()">
          @method("delete")
          @csrf
          <button class="delete-btn button-outline" type="submit">delete
          </button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $timeRecords->links() }}
<script src="{{ asset('js/show.js') }}"></script>
@endsection
