<ul class="list-unstyled">
    @foreach ($tweets as $tweet)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($tweet->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $tweet->user->name, ['id' => $tweet->user->id]) !!} <span class="text-muted">posted at {{ $tweet->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0"><span>ワインの種類</span>{!! nl2br(e($tweet->type)) !!}</p>
                    <p class="mb-0"><span>ワインの味</span>{!! nl2br(e($tweet->taste)) !!}</p>
                    <p class="mb-0">{!! nl2br(e($tweet->content)) !!}</p>
                </div>
                <div>
                    @if (Auth::id() == $tweet->user_id)
                        {!! Form::open(['route' => ['tweets.destroy', $tweet->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $tweets->links('pagination::bootstrap-4') }}