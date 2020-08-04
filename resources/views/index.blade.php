@extends('layouts.default')

@section('title')
GoalTimer
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('page-title')
HOME
@endsection

@section('content')
<div class="container">
  @foreach ($goalList as $goal)
  <div class="goal-box">
    <h2 class="title">
      <a href="{{ url('GoalController/show',$goal ->id) }}">{{ $goal ->goal_name }}</a>
    </h2>
    <p class="goal-time">目標:{{ $goal->goal_time }}時間</p>
    <p class="now-time">現在:{{ $goal->getTimeRecord() }}</p>
    @if ($goal->status === '1')
    <p class="additional-time">残り:{{ $goal->getAddTime() }}</p>
    @else
    <p class='achieve'>達成済み</p>
    @endif
    <form action="{{ url('TimeRecordController/create',$goal->id) }}" method="POST">
      @csrf
      <input type="text" name="record" placeholder='00:00'>
      @error('record')
      <p class="error-message">{{ $message }}</p>
      @enderror
      <button type="submit" class="record-btn">記録</button>
    </form>
  </div>
  @endforeach
</div>
<div class="new-goal">
  <h2>New Goal</h2>
  <form action="{{ route('create') }}" method="post">
    @csrf
    <input class="goal-name" type="text" name='goal_name' placeholder='タイトル'>
    @error('goal_name')
    <p class="error-message">{{ $message }}</p>
    @enderror
    <input class="goal-time" type="text" name="goal_time" value='1000'> 時間
    @error('goal_time')
    <p class="error-message">{{ $message }}</p>
    @enderror
    <button type="submit" class="submit-btn">登録</button>
  </form>
</div>
@endsection
