@foreach($messages as $message)
    <h1>
        {{strip_tags($message->title)}}
    </h1>
    <p>
        {{strip_tags($message->message)}}
    </p>
    <h2>
        {{strip_tags($message->author)}}
    </h2>
    <h3>
        {{strip_tags($message->position)}}
    </h3>
    @endforeach
