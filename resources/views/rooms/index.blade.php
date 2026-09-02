@extends('layouts.app')

@section('content')
    <section class="hero">
        <div>
            <p class="eyebrow">ハウスキーピング • 空調設備</p>
            <h1>エアコン清掃状況</h1>
            <p class="subhead">客室を選択して、エアコン清掃完了を記録してください。</p>
        </div>
        <div class="progress-card">
            <strong>{{ $totalCleaned }} <span>/ {{ $totalRooms }}</span></strong>
            <span>室 清掃完了</span>
            <div class="progress"><i style="width: {{ $totalRooms ? round(($totalCleaned / $totalRooms) * 100) : 0 }}%"></i></div>
        </div>
    </section>

    @if(session('success')) <div class="alert success">{{ session('success') }}</div> @endif
    @if(session('notice')) <div class="alert notice">{{ session('notice') }}</div> @endif

    <nav class="floors" aria-label="階数の選択">
        @foreach(range(18, 31) as $level)
            <a href="{{ route('rooms.index', ['floor' => $level]) }}" class="{{ $floor === $level ? 'active' : '' }}">{{ $level }}<small>階</small></a>
        @endforeach
    </nav>

    <section class="floor-heading">
        <div><p class="eyebrow">{{ $floor }}階</p><h2>客室の状況</h2></div>
        <div class="legend"><span><i class="status-dot done"></i> 清掃済み</span><span><i class="status-dot pending"></i> 未清掃</span></div>
    </section>

    <section class="room-grid">
        @forelse($rooms as $room)
            @if($room->status === 'cleaned')
                <article class="room-card cleaned">
                    <div><span class="room-number">{{ $room->number }}</span><span class="badge done">清掃済み</span></div>
                    <p>{{ $room->cleaned_at?->format('Y年m月d日 H:i') }}</p>
                    <small>担当者：{{ $room->cleaned_by }}</small>
                </article>
            @else
                <a class="room-card pending" href="{{ route('rooms.clean.create', $room) }}">
                    <div><span class="room-number">{{ $room->number }}</span><span class="badge pending">未清掃</span></div>
                    <p>タップして清掃を記録</p>
                    <small>エアコン清掃が必要です</small>
                </a>
            @endif
        @empty
            <p>客室が見つかりません。<code>php artisan migrate --seed</code> を実行して客室を登録してください。</p>
        @endforelse
    </section>
@endsection
