@extends('layouts.app')

@section('content')
    <div class="back"><a href="{{ route('rooms.index', ['floor' => $room->floor]) }}">← {{ $room->floor }}階に戻る</a></div>
    <section class="clean-form">
        <p class="eyebrow">清掃完了確認</p>
        <h1>{{ $room->number }}号室</h1>
        <p class="subhead">エアコン清掃が完了したことを確認し、作業を行った担当者名を入力してください。</p>

        <form method="POST" action="{{ route('rooms.clean.store', $room) }}">
            @csrf
            <label for="cleaned_by">作業担当者</label>
            <input id="cleaned_by" name="cleaned_by" value="{{ old('cleaned_by') }}" placeholder="担当者名を入力" required autofocus>
            @error('cleaned_by') <p class="error">{{ $message }}</p> @enderror
            <p class="time-note">確認時に日付と時刻が自動で記録されます。</p>
            <button type="submit">エアコン清掃完了を登録</button>
        </form>
    </section>
@endsection
