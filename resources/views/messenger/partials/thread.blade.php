<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

<div class="media alert {{ $class }}">  
    <div class="media-body">
        <h4 class="media-heading">
            <a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
            ({{ $thread->userUnreadMessagesCount(Auth::id()) }} unread)
        </h4>
        <p>
            {{ $thread->latestMessage->body }}
        </p>
        <p>
            <small><strong>Creator:</strong> {{ $thread->creator()->name }}</small> <br />
            <small><strong>Participants:</strong> {{ $thread->participantsString(Auth::id()) }}</small>
        </p>
        <p>

        </p>
    </div>
</div>
