@foreach ($issues as $issue)
    <article class="bg-surface rounded-2xl overflow-hidden shadow-card p-5 border border-line">
        <p class="text-xs uppercase tracking-[.2em] text-brand mb-2">Nº {{ $issue['num'] }} · {{ $issue['season'] }}</p>
        <h3 class="font-display text-2xl font-medium mb-4 text-dark">{{ $issue['title'] }}</h3>
        <div class="flex gap-2">
            <a href="{{ route('issue.detail') }}" class="bg-brand text-white px-4 py-2 rounded-2xl text-[10px] uppercase tracking-[.14em] font-semibold hover:bg-brandHover transition-colors">Chi tiết</a>
            <a href="{{ route('issue.read') }}" class="border border-line px-4 py-2 rounded-2xl text-[10px] uppercase tracking-[.14em] font-semibold text-dark hover:border-brand transition-colors">Đọc</a>
        </div>
    </article>
@endforeach
