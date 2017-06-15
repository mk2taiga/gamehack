<table class="table table-striped">
    <tbody>
        @foreach ($tweets as $tweet)
        <?php $user = $tweet->user; ?>
            <tr>
                <td class="avatar_table"><a href="{{ route('users.show', ['id' => $user->id]) }}"><img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 30) . '&d=mm' }}" alt=""></a></td>
                <td><a href="{{ route('tweets.show', ['id' => $tweet->id]) }}"><p class="tweet_title">{{ $tweet->title }}</p></a></td>
            </tr>
        @endforeach
    </tbody>
</table>
{!! $tweets->render() !!}